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
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class PizzaTable
 *
 * @package PizzaData\Table
 */
class PizzaTable extends TableGateway implements PizzaTableInterface
{
    /**
     * @param AdapterInterface   $adapter
     * @param ResultSetInterface $resultSetPrototype
     */
    public function __construct(
        AdapterInterface $adapter,
        ResultSetInterface $resultSetPrototype = null
    ) {
        parent::__construct(
            'pizzas', $adapter, null, $resultSetPrototype
        );
    }

    /**
     * @return null|ResultSetInterface
     */
    public function fetchList()
    {
        $select = $this->getSql()->select();
        $select->order('title');

        return $this->selectWith($select);
    }
} 