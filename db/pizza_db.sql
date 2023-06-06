-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2023 г., 13:58
-- Версия сервера: 10.1.48-MariaDB
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pizzas`
--

INSERT INTO `pizzas` (`id`, `type`, `price`) VALUES
(1, 'Пепперони', '10.00'),
(2, 'Деревенская', '12.50'),
(3, 'Гавайская', '11.00'),
(4, 'Грибная', '9.50');

-- --------------------------------------------------------

--
-- Структура таблицы `sauces`
--

CREATE TABLE `sauces` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sauces`
--

INSERT INTO `sauces` (`id`, `type`, `price`) VALUES
(1, 'сырный', '1.50'),
(2, 'кисло-сладкий', '1.00'),
(3, 'чесночный', '2.00'),
(4, 'барбекю', '1.50');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sauces`
--
ALTER TABLE `sauces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sauces`
--
ALTER TABLE `sauces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
