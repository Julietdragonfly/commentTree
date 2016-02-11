-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2016 г., 14:43
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lightIT`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `message`, `date_create`, `date_update`, `parent_id`, `author`) VALUES
(1, 'Первое сообщение', '2016-02-11 11:45:27', '2016-02-11 12:06:35', 0, 'Juls Puls'),
(2, 'Второй комментарий', '2016-02-11 11:45:48', '2016-02-11 11:45:48', 1, 'Juls Puls'),
(3, 'Третий комментарий', '2016-02-11 11:45:58', '2016-02-11 11:45:58', 1, 'Juls Puls'),
(4, 'Первый комментарий1', '2016-02-11 11:57:31', '2016-02-11 12:41:23', 1, 'Juls Puls'),
(9, 'hello', '2016-02-11 13:24:15', '2016-02-11 13:24:40', 2, 'Сергей Захарченко'),
(10, 'bye!', '2016-02-11 13:24:30', '2016-02-11 13:28:00', 2, 'Сергей Захарченко'),
(11, 'bye2', '2016-02-11 13:24:54', '2016-02-11 13:24:54', 10, 'Сергей Захарченко');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `social_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `pass`, `social_id`, `phone`) VALUES
(1, 'Juls Puls', '', '307465361', ''),
(2, 'Сергей Захарченко', '', '18759788', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
