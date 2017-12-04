-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 04 2017 г., 23:31
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
-- Структура таблицы `base_user_info`
--

CREATE TABLE `base_user_info` (
  `id_user` int(11) NOT NULL,
  `firstName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `secondName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thirdName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phoneNumber` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `passport` int(10) UNSIGNED NOT NULL,
  `card` int(11) NOT NULL,
  `birthDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `base_user_info`
--
ALTER TABLE `base_user_info`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `base_user_info`
--
ALTER TABLE `base_user_info`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `base_user_info`
--
ALTER TABLE `base_user_info`
  ADD CONSTRAINT `auth_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `auth_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
