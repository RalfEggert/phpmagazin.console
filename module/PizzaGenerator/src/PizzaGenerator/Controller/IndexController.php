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

use Zend\Db\Adapter\AdapterInterface;
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
     *
     * Handle homepage
     */
    public function indexAction()
    {
        $this->console->writeLine('Pizza backen');
        $this->console->writeLine('------------');
        $this->console->writeLine();

    }
}
