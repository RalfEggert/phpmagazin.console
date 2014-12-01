<?php
/**
 * Zend Framework 2 - PHP-Magazin Konsole und ZF2
 *
 * Beispiele für ZF2 Konsolenanwendungen
 *
 * @package    PizzaGenerator
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaGenerator\Controller;

use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\FileGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\ParameterGenerator;
use Zend\Code\Generator\PropertyGenerator;
use Zend\Console\ColorInterface as Color;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Metadata\Metadata;
use Zend\Db\Metadata\Object\ColumnObject;
use Zend\Filter\StaticFilter;
use Zend\Mvc\Controller\AbstractConsoleController;

/**
 * Index controller
 *
 * Handles the homepage and other pages
 *
 * @package    PizzaGenerator
 */
class IndexController extends AbstractConsoleController
{
    /**
     * @var AdapterInterface
     */
    protected $dbAdapter;

    /**
     * @return AdapterInterface
     */
    public function getDbAdapter()
    {
        return $this->dbAdapter;
    }

    /**
     * @param AdapterInterface $dbAdapter
     */
    public function setDbAdapter(AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * @return array
     */
    protected function fetchTableColumns()
    {
        $metaData = new Metadata($this->getDbAdapter());

        $columns = array();

        foreach ($metaData->getTable('pizzas')->getColumns() as $pizzaColumn) {
            /** @var $pizzaColumn ColumnObject */
            switch ($pizzaColumn->getDataType()) {
                case 'varchar':
                case 'text':
                case 'timestamp':
                    $type = 'string';
                    break;

                default:
                    $type = 'integer';
            }

            $columns[$pizzaColumn->getName()] = $type;
        }

        return $columns;
    }

    /**
     * @param $columnName
     * @param $columnType
     *
     * @return PropertyGenerator
     */
    protected function generateProperty($columnName, $columnType)
    {
        $property = new PropertyGenerator($columnName);
        $property->addFlag(PropertyGenerator::FLAG_PROTECTED);
        $property->setDocBlock(
            new DocBlockGenerator(
                $columnName . ' property',
                null,
                array(
                    array(
                        'name'        => 'var',
                        'description' => $columnType,
                    )
                )
            )
        );

        return $property;
    }

    /**
     * @param $columnName
     * @param $columnType
     *
     * @return MethodGenerator
     */
    protected function generateGetMethod($columnName, $columnType)
    {
        $getMethodName = 'get' . StaticFilter::execute(
                $columnName, 'Word\UnderscoreToCamelCase'
            );

        $getMethod = new MethodGenerator($getMethodName);
        $getMethod->addFlag(MethodGenerator::FLAG_PUBLIC);
        $getMethod->setDocBlock(
            new DocBlockGenerator(
                'Get ' . $columnName,
                null,
                array(
                    array(
                        'name'        => 'return',
                        'description' => $columnType,
                    )
                )
            )
        );
        $getMethod->setBody('return $this->' . $columnName . ';');

        return $getMethod;
    }

    /**
     * @param $columnName
     * @param $columnType
     *
     * @return MethodGenerator
     */
    protected function generateSetMethod($columnName, $columnType)
    {
        $setMethodName = 'set' . StaticFilter::execute(
                $columnName, 'Word\UnderscoreToCamelCase'
            );

        $setMethod = new MethodGenerator($setMethodName);
        $setMethod->addFlag(MethodGenerator::FLAG_PUBLIC);
        $setMethod->setParameter(
            new ParameterGenerator($columnName)
        );
        $setMethod->setDocBlock(
            new DocBlockGenerator(
                'Set ' . $columnName,
                null,
                array(
                    array(
                        'name'        => 'param',
                        'description' => $columnType . ' $' . $columnName,
                    )
                )
            )
        );
        $setMethod->setBody(
            '$this->' . $columnName . ' = $' . $columnName . ';'
        );

        return $setMethod;
    }

    /**
     * @param array $columns
     *
     * @return ClassGenerator
     */
    protected function generateEntityClass(array $columns = array())
    {
        $class = new ClassGenerator('PizzaEntity', 'PizzaData\Entity');
        $class->setDocBlock(
            new DocBlockGenerator(
                'Class PizzaData\Entity',
                null,
                array(
                    array(
                        'name'        => 'author',
                        'description' => 'Ralf Eggert',
                    )
                )
            )
        );

        foreach ($columns as $columnName => $columnType) {
            $property  = $this->generateProperty($columnName, $columnType);
            $getMethod = $this->generateGetMethod($columnName, $columnType);
            $setMethod = $this->generateSetMethod($columnName, $columnType);

            $class->addPropertyFromGenerator($property);
            $class->addMethodFromGenerator($getMethod);
            $class->addMethodFromGenerator($setMethod);
        }

        return $class;
    }

    /**
     * @param ClassGenerator $class
     *
     * @return FileGenerator
     */
    protected function generateEntityFile(ClassGenerator $class)
    {
        $file = new FileGenerator();
        $file->setClass($class);
        $file->setDocBlock(
            new DocBlockGenerator(
                'Automatically generated file',
                null,
                array(
                    array(
                        'name'        => 'package',
                        'description' => $class->getNamespaceName(),
                    )
                )
            )
        );

        return $file;
    }

    /**
     *
     * Handle homepage
     */
    public function indexAction()
    {
        $this->console->writeLine('Pizza backen');
        $this->console->writeLine('------------');
        $this->console->writeLine();

        $pizzaColumns = $this->fetchTableColumns();
        $pizzaClass   = $this->generateEntityClass($pizzaColumns);
        $pizzaFile    = $this->generateEntityFile($pizzaClass);

        $entityDirectory = APPLICATION_ROOT . '/module/PizzaData';
        $entityDirectory .= '/src/PizzaData/Entity';
        $entityFileName = 'PizzaEntity.php';

        if (!is_dir($entityDirectory)) {
            mkdir($entityDirectory, 0777, true);
        }

        file_put_contents(
            $entityDirectory . '/' . $entityFileName, $pizzaFile->generate()
        );

        $this->console->writeLine(
            $this->console->colorize(
                'PizzaData\Entity', Color::GREEN
            ) . ' wurde in Datei ' . $this->console->colorize(
                $entityDirectory . '/' . $entityFileName, Color::GREEN
            ) . ' geschrieben.'
        );
        $this->console->writeLine();

    }
}
