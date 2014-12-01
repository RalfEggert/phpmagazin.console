<?php
/**
 * Zend Framework 2 - PHP-Magazin Konsole und ZF2
 *
 * Beispiele für ZF2 Konsolenanwendungen
 *
 * @package    PizzaConsole
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaConsole\Controller;

use PizzaData\Service\PizzaServiceInterface;
use Zend\Console\ColorInterface as Color;
use Zend\Mvc\Controller\AbstractConsoleController;
use Zend\Text\Table\Table;
use Zend\View\Model\ConsoleModel;

/**
 * Index controller
 *
 * Handles the homepage and other pages
 *
 * @package    PizzaConsole
 */
class IndexController extends AbstractConsoleController
{
    /**
     * @var PizzaServiceInterface
     */
    protected $pizzaService;

    /**
     * @return PizzaServiceInterface
     */
    public function getPizzaService()
    {
        return $this->pizzaService;
    }

    /**
     * @param PizzaServiceInterface $pizzaService
     */
    public function setPizzaService($pizzaService)
    {
        $this->pizzaService = $pizzaService;
    }

    /**
     *
     * Handle homepage
     */
    public function indexAction()
    {
        $this->console->writeLine('Unsere Pizzaliste');
        $this->console->writeLine('-----------------');
        $this->console->writeLine();

        $columnWidths = array(
            'id'          => 1,
            'title'       => 1,
            'description' => 1,
            'price'       => 1,
        );

        $pizzaList = $this->getPizzaService()->fetchAllPizzas();

        foreach ($pizzaList as $pizzaRow) {
            foreach ($columnWidths as $columnKey => $columnWidth) {
                if (strlen($pizzaRow[$columnKey]) > $columnWidth) {
                    $columnWidths[$columnKey] = strlen($pizzaRow[$columnKey]);
                }
            }
        }

        $columnWidths['price'] = $columnWidths['price'] + 2;

        $table = new Table(
            array('columnWidths' => array_values($columnWidths))
        );
        $table->setDecorator('unicode');

        foreach ($pizzaList as $pizzaRow) {
            $pizzaPrice = number_format($pizzaRow['price'] / 100, 2) . '€';

            $table->appendRow(
                array(
                    'id'          => $pizzaRow['id'],
                    'title'       => $pizzaRow['title'],
                    'description' => $pizzaRow['description'],
                    'price'       => $pizzaPrice,
                )
            );
        }

        $consoleModel = new ConsoleModel();
        $consoleModel->setResult($table);

        return $consoleModel;
    }
}
