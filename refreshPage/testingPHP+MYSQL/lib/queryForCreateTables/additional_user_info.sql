-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 04 2017 г., 23:30
-- Версия сервера: 5.7.20-0ubuntu0.17.10.1
-- Версия PHP: 7.1.8-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dota_live`
--

-- --------------------------------------------------------

--
-- Структура таблицы `additional_user_info`
--

CREATE TABLE `additional_user_info` (
  `id_user` int(11) NOT NULL,
  `growth_of_user` int(10) UNSIGNED NOT NULL,
  `os` enum('gentoo','xp','ubuntu','mint','lubuntu','arch','win10','debian') CHARACTER SET utf8 NOT NULL,
  `browser` enum('chrome','opera','firefox') CHARACTER SET utf8 NOT NULL,
  `lang_programming` enum('fsharp','csharp','js','cpp','ts','python','haskell') CHARACTER SET utf8 NOT NULL,
  `love_paradigm` enum('fp','oop','proc','logic','define') CHARACTER SET utf8 NOT NULL,
  `language` enum('ru','en','jp') CHARACTER SET utf8 NOT NULL,
  `site` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `additional_user_info`
--
ALTER TABLE `additional_user_info`
  ADD KEY `id_user` (`id_user`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `additional_user_info`
--
ALTER TABLE `additional_user_info`
  ADD CONSTRAINT `additional_user_info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `base_user_info` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
