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
 * PizzaConsole module configuration
 *
 * @package    PizzaConsole
 */
return array(
    'console'     => array(
        'router' => array(
            'routes' => array(
                'pizza-list' => array(
                    'options' => array(
                        'route'    => 'pizza list',
                        'defaults' => array(
                            'controller' => 'pizza-console',
                            'action'     => 'index',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'pizza-console' => 'PizzaConsole\Controller\IndexControllerFactory',
        ),
    ),


);
