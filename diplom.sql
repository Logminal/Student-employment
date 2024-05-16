-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 08 2023 г., 16:48
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
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `type_of_documents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scanned_documents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `students_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `employers`
--

CREATE TABLE `employers` (
  `id` bigint UNSIGNED NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_organizations` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `enterprises`
--

CREATE TABLE `enterprises` (
  `id` bigint UNSIGNED NOT NULL,
  `employer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `enterprises`
--

INSERT INTO `enterprises` (`id`, `employer`, `name`, `phone`, `user_id`) VALUES
(5, 'Андреев Антон Владимирови', 'dfgfdg', NULL, 12),
(7, 'Сухарева Мария Елисеевна', 'ООО Мегалюль2', NULL, 16),
(8, 'Гордеев Иван Максимович', 'ООО Клавиша', '65156', 20),
(9, 'Пугачев Ярослав Ильич', 'ООО Ярик', NULL, 21),
(10, 'Соколов Дмитрий Андреевич', 'Дмитрий', NULL, 22),
(11, 'Быкова Алиса Андреевна', 'ООО Мегалюльfhdfgh', NULL, 23),
(12, 'Кольцова Александра Макаровна', 'Александра', NULL, 24),
(13, 'Безруков Сергей Егорович', 'ООО Серёга 2', '79128010580', 34);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_04_01_1282250_create_users_table', 1),
(3, '2023_05_24_180755_create_enterprises_table', 1),
(4, '2023_06_01_115114_create_specializations_table', 1),
(5, '2023_06_01_117202_create_teachers_table', 1),
(6, '2023_06_01_280907_create_students_table', 1),
(7, '2023_06_01_280908_create_documents_table', 1),
(8, '2023_06_07_082932_create_news_table', 1),
(9, '2023_06_08_134455_create_employers_table', 1),
(10, '2023_06_08_134552_create_organizations_in_waitings_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `desk`, `date`, `user_id`) VALUES
(1, 'Областной КОНКУРС ПРОФЕССИОНАЛЬНОГО МАСТЕРСТВА', 'Студент нашего техникума - Чернов Александр принял участие в этом мероприятие.\r\n\r\nВ ходе испытаний обучающиеся РЕШАЛИ задачи по настройке предприятия в защищенном исполнении, а также по настройке системы контроля информационных потоков и предотвращения неправомерных действий с информацией.\r\n\r\nТакже, в этот день состоялся областной КОНКУРС профессионального мастерства мастеров производственного обучения по специальности \"Информатика и вычислительная техника\". Среди конкурсантов были и НАШИ ПРЕПОДАВАТЕЛИ - Ронжин С. А.', '2023-06-20', 1),
(2, 'Областной КОНКУРС ПРОФЕССИОНАЛЬНОГО МАСТЕРСТВА', '3 и 4 мая на базе ГБПОУ \"ЧЭнК\" проходила ОЛИМПИАДА профессионального мастерства студентов и руководителей практик. Мероприятие прошло по НАПРАВЛЕНИЮ \"Электро и теплоэнергетика\".\r\n\r\nНаш техникум ПРЕДСТАВИЛ Мурзаханов Даниил (ЭМ-45), а также преподаватель специальных дисциплин и руководитель практики - Рыбин В. В.\r\n\r\nВ ходе выполнения олимпиадных заданий обучающийся показал высокий УРОВЕНЬ ПОДГОТОВКИ. От призёра, занявшего третье место, Даниила отделили лишь два балла.\r\n\r\n \r\n\r\nПОЗДРАВЛЯЕМ Рыбина В. В. с прекрасным результатом, а Даниила с 4 местом! Выражаем БЛАГОДАРНОСТЬ всем, кто передал весь опыт и знания нашему студенту.', '2023-06-20', 1),
(3, 'Областной КОНКУРС ПРОФЕССИОНАЛЬНОГО МАСТЕРСТВА', 'Третьего мая на базе ГБПОУ \"ЧАТТ\" состоялась Областная ОЛИМПИАДА профессионального мастерства по направлению \"Техника и технологии наземного транспорта\".\r\n\r\nГималетдинов Леонид - студент нашего техникума принял участие в этом мероприятие. На протяжении двух дней участники олимпиады выполняли комплексные ЗАДАНИЯ, состоящие из двух уровней. Леонид отлично справился с испытаниями и занял 5 МЕСТО!\r\n\r\n \r\n\r\nПоздравляем юношу и желаем всегда достигать новых вершин в профессиональной сфере.', '2023-06-20', 1),
(4, 'КАМЕРА, МОТОР, ФИЛЬМ', 'ЛЮБОВЬ к Родине - важнейшее чувство для каждого человека. У взрослого это чувство подобно большой реке.\r\n\r\nЕсть ИСТОК - маленький ключик, с которого всё начинается и вырастает огромная любовь ко всему, что умещается в одном слове - РОДИНА. К родному дому, любимой музыке в наушниках и прогулками с друзьями по знакомым улицам.\r\n\r\nВместе со студентами групп 2 и 3 курсов специальности \"Дошкольное образование\" ПОГРУЗИЛИСЬ В ИСТОРИЮ великой и удивительной страны. Для обучающихся прошёл КИНОПОКАЗ от проекта https://vk.com/znanie_kino.\r\n\r\nРебята совершили увлекательное ПУТЕШЕСТВИЕ СКВОЗЬ ВЕКА - от Крещения Руси до наших дней. А также УЗНАЛИ, как наша страна вбирала в себя ТРАДИЦИИ разных культур и вписывала новые ИМЕНА в мировое наследие.', '2023-06-24', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `organizations_in_waitings`
--

CREATE TABLE `organizations_in_waitings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enterprises_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint UNSIGNED NOT NULL,
  `kodSpec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_cut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `specializations`
--

INSERT INTO `specializations` (`id`, `kodSpec`, `name`, `name_cut`) VALUES
(1, '44.02.01', 'Информационные системы и программирование', 'ИС'),
(2, '44.02.02', 'Дошкольное образование', 'ДО');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `fio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enterprises_id` bigint UNSIGNED DEFAULT NULL,
  `specializations_id` bigint UNSIGNED DEFAULT NULL,
  `teachers_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type_of_activity` text COLLATE utf8mb4_unicode_ci,
  `dont_activity` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `fio`, `phone`, `enterprises_id`, `specializations_id`, `teachers_id`, `user_id`, `type_of_activity`, `dont_activity`) VALUES
(5, 'Смирнова София Артёмовна', NULL, 7, 1, 10, 10, 'Продолжили обучение', NULL),
(6, 'Куприянов Тимофей Тимофеевич', '79128010580', 13, 1, 11, 11, 'Продолжили обучение', NULL),
(7, 'Митина Виктория', NULL, 7, 1, 7, 17, 'Продолжили обучение', NULL),
(8, 'Смирнова Амира Максимовна', NULL, NULL, 1, 11, 18, NULL, 'Проходят службу в армии по призыву'),
(9, 'Михеев Владислав Иванович', NULL, NULL, NULL, NULL, 19, NULL, NULL),
(10, 'Иванова Мирослава Германовна', NULL, 9, 1, 6, 25, 'Продолжили обучение', NULL),
(11, 'Никифорова Кира Марковна', NULL, 9, 1, 11, 26, 'Продолжили обучение', NULL),
(12, 'Назарова Нина Кирилловна', NULL, 7, 1, 11, 27, 'Продолжили обучение', NULL),
(13, 'Бородина Ева Константиновна', NULL, 5, 1, 12, 28, 'Продолжили обучение', NULL),
(14, 'Орлова Арина Даниэльевна', NULL, 7, 1, 13, 29, 'Продолжили обучение', NULL),
(15, 'Андреева Дарья Алексеевна', NULL, NULL, 1, 14, 30, NULL, 'Проходят службу в армии по призыву'),
(16, 'Лебедева Василиса Макаровна', NULL, NULL, 1, 12, 31, NULL, 'Проходят службу в армии по призыву'),
(17, 'Ковалева Александра Дмитриевна', NULL, NULL, 1, 13, 32, NULL, 'Проходят службу в армии по призыву'),
(18, 'Дурникин Данила Сергеевич', NULL, NULL, NULL, NULL, 33, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `password`, `status`) VALUES
(1, 'admin admin admin', 'admin', '$2y$10$kY/syvplVpDm/CHWlt2nhO9JTreyF4dBq0E0Ggd9SqjspGMf5AHuK', 'admin'),
(10, 'Смирнова София Артёмовна', 'София2', '$2y$10$qriKdPyWaPYSGTRqq3YAG.tIJG/aQGYLXJcR1VGdZwZhNAhiqT9s.', 'student'),
(11, 'Куприянов Тимофей Тимофеевич', 'Тимофей', '$2y$10$MUmRUvJZ8qdZTIePSIb4k.B58FyuQdwrZi6W1STYxg7KbEYuROMhK', 'student'),
(12, 'Андреев Антон Владимирови', 'Антон2', '$2y$10$Wiek6zU1tk9RlifWHfxvLeotwInMaTMv8w7RiHQ2ytFRLRPogyoOG', 'employer'),
(16, 'Сухарева Мария Елисеевна', 'Мария2', '$2y$10$qE.Jv7D6d1XIQ2QIv80SeOy82boULvpL6VaFhERvvLcu/k1uwmfuy', 'employer'),
(17, 'Митина Виктория', 'Виктория', '$2y$10$f.GDAHtCQpdTeTCovmxmLOtIwXvAc9AoqVizPyx8/vu/ZlJecjV.G', 'student'),
(18, 'Смирнова Амира Максимовна', 'Амира', '$2y$10$ECnR2NrxRCwRDUqxU1p0Be3EVxyiyXaa1LudgZ8PmxpIRoW53V37.', 'student'),
(19, 'Михеев Владислав Иванович', 'Владислав', '$2y$10$E8uea3PWVsJxZuZiWgshueYJ4tPOSFuSTlix5CreNNTcCdIMpDtiy', 'student'),
(20, 'Гордеев Иван Максимович', 'Иван', '$2y$10$DcTEJNhAKrQ0GWo9iFNDK.vWOwv1xesFaInWncOogEuCWl0RueP.2', 'employer'),
(21, 'Пугачев Ярослав Ильич', 'Ярослав', '$2y$10$AfhDUlWcQY4gRq8TxHtnR.PSZSTv8Y8R3MS7sFgaX7Z6v8OdAG4VO', 'employer'),
(22, 'Соколов Дмитрий Андреевич', 'Дмитрий', '$2y$10$5SNzyR0MLLySi.WSzpRRU.CRcFVQIIBB85GGzdzi3KtrgcPyq/6DS', 'employer'),
(23, 'Алисаdd', 'Алиса', '$2y$10$4v8hykTWGwSNhLSt/cjN2eXCSeIeL1WTk8ba/fcKC8Rjxos3bFQZ6', 'employer'),
(24, 'Кольцова Александра Макаровна', 'Александра', '$2y$10$hr4y4LjXXhO1rSKaMGuCTeJlZLtylDrc.M.3AGzCP0ux.5t3kMMnq', 'employer'),
(25, 'Иванова Мирослава Германовна', 'Мирослава', '$2y$10$12ftwf/Bhb9QlYpd.DhBY.FVTKOE1VSAlQ6ui7prJypepcfIgj1C.', 'student'),
(26, 'Никифорова Кира Марковна', 'Кира', '$2y$10$RY5RVYP5dgvzBT/iVtm4nuzSPooeyJEs52kFO7f8UJemnfhEHi0pG', 'student'),
(27, 'Назарова Нина Кирилловна', 'Нина', '$2y$10$2JTMwS/MjVxGGrBWgkopsew/eSWDTjvAWmaLeNatTgGY80p5/yL.K', 'student'),
(28, 'Бородина Ева Константиновна', 'Ева', '$2y$10$PR4irIUoDGf6khyCH2k9u.aO.yDlsb0YKg.cJrvhgFi2/R6YOwDge', 'student'),
(29, 'Орлова Арина Даниэльевна', 'Арина2', '$2y$10$D7n06GUAT2NObqNdQakHRO43H5efneQXbDaAz0rg7f4aD1Nvij1zO', 'student'),
(30, 'Андреева Дарья Алексеевна', 'Дарья', '$2y$10$08XFTYORoKcY45hEy3mHeONrTUzLf.76DCIkHbW/eUhIdgqu0.1sC', 'student'),
(31, 'Лебедева Василиса Макаровна', 'Василиса', '$2y$10$EDfa3KTp64.7d369Pz7tX.Qfh6IBBH.662JZqjFRCGNHnCJ8Gxw1m', 'student'),
(32, 'Ковалева Александра Дмитриевна', 'Александра2', '$2y$10$QGUJQaEFhHxOp62Ju6iIUOjSYvKz9uEVge8gNfdwuH0VIOpyDIlym', 'student'),
(33, 'Дурникин Данила Сергеевич', 'Данила', '$2y$10$TkdtSexaKgjhmvynHcYCwu7dgCp04JH0w9Elaap.9dFmG.kiJDBfq', 'student'),
(34, 'Безруков Сергей Егорович', 'Сергей', '$2y$10$0SmpUpsWPN9Igw9BWZqBu.sWA9ygRZXvjOkiDPHbrnmjgTwMKObAW', 'employer');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_students_id_foreign` (`students_id`);

--
-- Индексы таблицы `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `enterprises`
--
ALTER TABLE `enterprises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enterprises_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `organizations_in_waitings`
--
ALTER TABLE `organizations_in_waitings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizations_in_waitings_enterprises_id_foreign` (`enterprises_id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_enterprises_id_foreign` (`enterprises_id`),
  ADD KEY `students_specializations_id_foreign` (`specializations_id`),
  ADD KEY `students_teachers_id_foreign` (`teachers_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `enterprises`
--
ALTER TABLE `enterprises`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `organizations_in_waitings`
--
ALTER TABLE `organizations_in_waitings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_students_id_foreign` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `enterprises`
--
ALTER TABLE `enterprises`
  ADD CONSTRAINT `enterprises_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `organizations_in_waitings`
--
ALTER TABLE `organizations_in_waitings`
  ADD CONSTRAINT `organizations_in_waitings_enterprises_id_foreign` FOREIGN KEY (`enterprises_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_enterprises_id_foreign` FOREIGN KEY (`enterprises_id`) REFERENCES `enterprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_specializations_id_foreign` FOREIGN KEY (`specializations_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_teachers_id_foreign` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
