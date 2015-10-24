-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 24 2015 г., 17:55
-- Версия сервера: 5.1.51-community
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `firstwebpagedb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id_photo` int(10) NOT NULL AUTO_INCREMENT,
  `id_text` int(10) NOT NULL,
  `path_photo` varchar(255) NOT NULL,
  `photo_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `id_text` (`id_text`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id_photo`, `id_text`, `path_photo`, `photo_title`) VALUES
(1, 3, 'img/img1.jpg', NULL),
(2, 3, 'img/img2.jpg', NULL),
(3, 3, 'img/img3.jpg', NULL),
(4, 3, 'img/img4.jpg', NULL),
(5, 3, 'img/img5.jpg', NULL),
(6, 3, 'img/img6.jpg', NULL),
(7, 3, 'img/img7.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `texts`
--

CREATE TABLE IF NOT EXISTS `texts` (
  `id_text` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id_text`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `texts`
--

INSERT INTO `texts` (`id_text`, `title`, `content`) VALUES
(1, 'Главная', 'Содержимое главной страницы'),
(2, 'Обо мне', 'Содержимое страницы Обо мне'),
(3, 'Фотогалерея', 'Содержимое страницы Фотогалерея'),
(4, 'Контакты', '+ 79254466612');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`id_text`) REFERENCES `texts` (`id_text`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
