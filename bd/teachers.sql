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
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`) VALUES
(1, 'Ронжин Сергей Анатольевич2'),
(3, 'Давыденко Егор Владимирович'),
(4, 'Антропов Александр Степанович'),
(5, 'Вашурина Ирина Игоревна'),
(6, 'Виноградова Елена Александровна'),
(7, 'Давыденко Егор Владимирович'),
(8, 'Жилова Любовь Александровна'),
(9, 'Зиганшина Альфия Хазиповна'),
(10, 'Иршина Вера Аркадьевна'),
(11, 'Исаева Екатерина Константиновна'),
(12, 'Киреева Альфира Альбертовна'),
(13, 'Кондратьева Марина Семеновна'),
(14, 'Куварина Наталья Ивановна'),
(15, 'Куликова Наталья Леонидовна'),
(16, 'Лебедева Светлана Юрьевна'),
(17, 'Малафеева Юлия Евгеньевна'),
(18, 'Мулюков Ильдар Зарифович'),
(19, 'Напалков Андрей Александрович'),
(20, 'Парфёнов Виктор Константинович'),
(21, 'Попова Татьяна Владимировна'),
(22, 'Ронжин Сергей Анатольевич'),
(23, 'Рыбин Владимир Владимирович'),
(24, 'Семашкова Анастасия Викторовна'),
(25, 'Терентьева Светлана Борисовна'),
(26, 'Тихонова Маргарита Филипповна'),
(27, 'Федосова Татьяна Викторовна'),
(28, 'Холина Татьяна Владимировна'),
(29, 'Черезова Алена Александровна');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
