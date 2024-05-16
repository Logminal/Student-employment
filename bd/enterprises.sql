-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 04 2023 г., 11:02
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `enterprises`
--

CREATE TABLE `enterprises` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `enterprises`
--

INSERT INTO `enterprises` (`id`, `name`) VALUES
(1, 'ООО Мегалюль2'),
(3, 'ООО Мегалюль'),
(4, 'ОАО Шанс'),
(5, 'Саратовский нефтеперерабатывающий завод'),
(6, 'Литрес'),
(7, 'Уральский турбинный завод'),
(8, 'Ижорский завод'),
(9, 'Театр имени Моссовета'),
(10, 'Нижнетагильский металлургический комбинат'),
(11, 'Московский государственный театр Ленком Марка'),
(12, 'Петмол'),
(13, 'Красный Октябрь'),
(14, 'Московский электроламповый завод'),
(15, 'Невьянский завод'),
(16, 'Wildberries'),
(17, 'Ozon'),
(18, 'Яндекс'),
(19, 'DNS'),
(20, 'Российские железные дороги'),
(21, 'HeadHunter'),
(22, '2ГИС'),
(23, 'Сбербанк России'),
(24, 'М.Видео'),
(25, 'Ситилинк'),
(26, 'Lamoda'),
(27, 'Комус'),
(28, 'СДЭК'),
(29, 'РБК'),
(30, 'Спортмастер'),
(31, 'Банк ВТБ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `enterprises`
--
ALTER TABLE `enterprises`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `enterprises`
--
ALTER TABLE `enterprises`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
