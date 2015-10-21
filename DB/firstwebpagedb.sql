-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 21 2015 г., 23:22
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
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(10) NOT NULL AUTO_INCREMENT,
  `path_image` varchar(255) NOT NULL,
  `id_topic` int(10) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_topic` (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id_image`, `path_image`, `id_topic`) VALUES
(1, 'img/img1.jpg', 1),
(2, 'img/img2.jpg', 2),
(3, 'img/img3.jpg', 3),
(4, 'img/img4.jpg', 4),
(5, 'img/img5.jpg', 5),
(6, 'img/img6.jpg', 6),
(7, 'img/img7.jpg', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id_topic` int(10) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id_topic`, `topic_name`) VALUES
(1, 'Заголовок изображения 1'),
(2, 'Заголовок изображения 2'),
(3, 'Заголовок изображения 3'),
(4, 'Заголовок изображения 4'),
(5, 'Заголовок изображения 5'),
(6, 'Заголовок изображения 6'),
(7, 'Заголовок изображения 7');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id_topic`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
