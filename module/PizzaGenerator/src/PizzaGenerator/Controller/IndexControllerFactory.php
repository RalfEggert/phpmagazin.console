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

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class IndexControllerFactory
 *
 * @package PizzaGenerator\Controller
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $serviceLocator = $controllerManager->getServiceLocator();

        $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');

        $controller = new IndexController();
        $controller->setDbAdapter($dbAdapter);

        return $controller;
    }

} 