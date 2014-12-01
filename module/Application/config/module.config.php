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
 * Application module configuration
 *
 * @package    Application
 */
return array(
    'router'          => array(
        'routes' => array(
            'home' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'console' => array(
        'router' => array(
            'routes' => array(
                'hello-you' => array(
                    'options' => array(
                        'route'    => 'hello <you> [--random|-r]:random',
                        'defaults' => array(
                            'controller' => 'hello',
                            'action'     => 'you',
                        ),
                    ),
                ),
                'hello-world' => array(
                    'options' => array(
                        'route'    => 'hello world',
                        'defaults' => array(
                            'controller' => 'hello',
                            'action'     => 'world',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers'     => array(
        'invokables' => array(
            'hello' => 'Application\Controller\HelloController',
        ),
        'factories' => array(
            'index' => 'Application\Controller\IndexControllerFactory',
        ),
    ),

    'view_manager'    => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'strategies'               => array('ViewJsonStrategy'),
        'template_map'             => include __DIR__ . '/../template_map.php',
        'template_path_stack'      => array(__DIR__ . '/../view'),
    ),

    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
    ),
);
