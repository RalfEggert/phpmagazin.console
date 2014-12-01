<?php
/**
 * Zend Framework 2 - PHP-Magazin Konsole und ZF2
 *
 * Beispiele für ZF2 Konsolenanwendungen
 *
 * @package    PizzaData
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace PizzaData\Table;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PizzaTableFactory
 *
 * @package PizzaData\Table
 */
class PizzaTableFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var AdapterInterface $dbAdapter */
        $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSet = new ResultSet(ResultSet::TYPE_ARRAY);

        $table = new PizzaTable($dbAdapter, $resultSet);

        return $table;
    }
}