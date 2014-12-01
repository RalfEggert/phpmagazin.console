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
 * PizzaGenerator module configuration
 *
 * @package    PizzaGenerator
 */
return array(
    'console'     => array(
        'router' => array(
            'routes' => array(
                'pizza-list' => array(
                    'options' => array(
                        'route'    => 'pizza create',
                        'defaults' => array(
                            'controller' => 'pizza-generator',
                            'action'     => 'index',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'pizza-generator' => 'PizzaGenerator\Controller\IndexControllerFactory',
        ),
    ),


);
