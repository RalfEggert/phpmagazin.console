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
 * Local configuration
 *
 * @package     Application
 */
return array(
    'db' => array(
        'driver'  => 'Pdo',
        'dsn'     => 'mysql:dbname=phpmagazin-console;host=localhost;charset=utf8',
        'user'    => 'console',
        'pass'    => 'console',
    ),
);
