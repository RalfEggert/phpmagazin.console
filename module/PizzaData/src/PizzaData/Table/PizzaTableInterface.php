<?php
/**
 * phpmagazin.console
 */
namespace PizzaData\Table;

use Zend\Db\ResultSet\ResultSetInterface;


/**
 * Class PizzaTable
 *
 * @package PizzaData\Table
 */
interface PizzaTableInterface
{
    /**
     * @return null|ResultSetInterface
     */
    public function fetchList();
}