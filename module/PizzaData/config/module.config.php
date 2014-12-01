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
 * PizzaData module configuration
 *
 * @package    PizzaData
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'PizzaData\Table\Pizza'   => 'PizzaData\Table\PizzaTableFactory',
            'PizzaData\Service\Pizza' => 'PizzaData\Service\PizzaServiceFactory',
        ),
    ),
);
