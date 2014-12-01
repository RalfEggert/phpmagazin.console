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
 * namespace definition and usage
 */
namespace Application\Controller;

use Zend\Console\ColorInterface as Color;
use Zend\Mvc\Controller\AbstractConsoleController;

/**
 * Hello controller
 *
 * Handles the hello messages for console output
 *
 * @package    Application
 */
class HelloController extends AbstractConsoleController
{
    protected $greetings
        = array(
            'Moin', 'Guten Tag', 'Nabend', 'Hi', 'Hossa', 'Mahlzeit',
        );

    /**
     * Output hello world
     */
    public function worldAction()
    {
        $this->console->writeLine('Hallo Welt!');
    }

    /**
     * Output hello you
     */
    public function youAction()
    {
        $you = $this->params()->fromRoute('you');

        if ($this->params()->fromRoute('random')) {
            $greeting = $this->greetings[array_rand($this->greetings)];
        } else {
            $greeting = 'Hallo';
        }

        $this->console->writeLine(
            $this->console->colorize($greeting, Color::NORMAL, Color::LIGHT_RED)
            . ' '
            . $this->console->colorize($you, Color::GREEN)
            . '!'
        );
    }
}
