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

/**
 * Class PizzaService
 *
 * @package PizzaData\Service
 */
class PizzaService implements PizzaServiceInterface
{
    /**
     * @var PizzaTableInterface
     */
    protected $pizzaTable;

    /**
     * @return PizzaTableInterface
     */
    public function getPizzaTable()
    {
        return $this->pizzaTable;
    }

    /**
     * @param PizzaTableInterface $pizzaTable
     */
    public function setPizzaTable(PizzaTableInterface $pizzaTable)
    {
        $this->pizzaTable = $pizzaTable;
    }

    /**
     * @return array
     */
    public function fetchAllPizzas()
    {
        $pizzaList = array();

        // make sure that no ResultSet object is returned to caller
        foreach ($this->getPizzaTable()->fetchList() as $pizzaRow) {
            $pizzaList[$pizzaRow['id']] = $pizzaRow;
        }

        return $pizzaList;
    }
} 