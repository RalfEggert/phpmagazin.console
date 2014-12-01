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
use Zend\Mvc\Controller\AbstractConsoleController;

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


    }
}
