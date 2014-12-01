<?php
/**
 * Zend Framework 2 - PHP-Magazin Konsole und ZF2
 *
 * Beispiele für ZF2 Konsolenanwendungen
 *
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @link       http://www.ralfeggert.de/
 */

/**
 * namespace definition and usage
 */
namespace Application\Controller;

use PizzaData\Service\PizzaServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Index controller
 *
 * Handles the homepage and other pages
 *
 * @package    Application
 */
class IndexController extends AbstractActionController
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
        return new ViewModel(
            array(
                'pizzaList' => $this->getPizzaService()->fetchAllPizzas(),
            )
        );
    }
}
