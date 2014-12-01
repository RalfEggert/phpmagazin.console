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
namespace PizzaData\Service;

use PizzaData\Table\PizzaTableInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PizzaServiceFactory
 *
 * @package PizzaData\Service
 */
class PizzaServiceFactory implements FactoryInterface
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
        /** @var PizzaTableInterface $table */
        $table = $serviceLocator->get('PizzaData\Table\Pizza');

        $service = new PizzaService();
        $service->setPizzaTable($table);

        return $service;
    }

} 