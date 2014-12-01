SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `pizzas`;

CREATE TABLE IF NOT EXISTS `pizzas` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `pizzas` (`id`, `timestamp`, `title`, `description`, `price`) VALUES
(1, '2014-08-10 13:13:57', 'Pizza Salami', 'Der Klassiker! Belegt mit leckerer Salami direkt aus Mailand.', 650),
(2, '2014-08-10 13:15:35', 'Pizza Deftig', 'Für Hungrige! Belegt mit allem, was bei Drei nicht auf den Bäumen ist.', 900),
(3, '2014-08-10 13:16:34', 'Pizza Vier Jahreszeiten', 'Für jeden was dabei! Belegt mit vier leckeren Belägen.', 800);

SET FOREIGN_KEY_CHECKS=1;
