<?php
/**
 * phpmagazin.console
 */
namespace PizzaData\Service;

use PizzaData\Table\PizzaTableInterface;


/**
 * Class PizzaService
 *
 * @package PizzaData\Service
 */
interface PizzaServiceInterface
{
    /**
     * @return PizzaTableInterface
     */
    public function getPizzaTable();

    /**
     * @param PizzaTableInterface $pizzaTable
     */
    public function setPizzaTable(PizzaTableInterface $pizzaTable);

    /**
     * @return array
     */
    public function fetchAllPizzas();
}