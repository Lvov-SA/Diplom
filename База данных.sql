-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 07 2021 г., 00:26
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0160072_messages`
--

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `mail`, `name`, `lastName`, `patronymic`, `gender`, `birthday`, `state`) VALUES
(1, 'yarikkryuk@mail.ru', 'Ярослав', 'Крюков', 'Владимирович', 0, '2021-05-08', 1),
(2, 'mr.naumov-2001@yandex.ru', 'Сергей', 'Наумов', 'Валерович', 0, '2021-04-01', 1),
(3, 'Qwjghvg@gmail.com', 'Илья', 'Ланутерко', 'Валерьевич', 0, '2021-04-13', 0),
(11, 'lvov.sergey.2001@gmail.com', 'Сергей', 'Иванов', 'Александрович', 0, '2021-05-08', 1),
(18, 'd.a.pankin@mpt.ru', 'Дмитрий', 'Панкин', 'Батькович', 0, '2021-05-01', 1),
(19, 'p_s.a.lvov@mpt.ru', 'Игорь', 'Латвинков', 'Олегович', 0, '2020-09-04', 0),
(528, 'ivan@mail.ru', 'Иван', 'Иванко', 'Иванович', 0, '2021-02-02', 0),
(877, 'mit@mail.com', 'Валерий', 'Мытищев', 'Валерьевич', 0, '2021-06-02', 1),
(878, 'ivan@mail.ru17', 'Иван17', 'Иванко17', 'Иванович17', 0, '2005-02-01', 0),
(879, 'ivan@mail.ru21', 'Иван21', 'Иванко21', 'Иванович21', 0, '2003-02-01', 0),
(880, 'ivan@mail.ru23', 'Иван23', 'Иванко23', 'Иванович23', 0, '2005-02-01', 0),
(881, 'ivan@mail.ru24', 'Иван24', 'Иванко24', 'Иванович24', 0, '2006-02-01', 0),
(882, 'ivan@mail.ru26', 'Иван26', 'Иванко26', 'Иванович26', 0, '2008-02-01', 0),
(883, 'ivan@mail.ru27', 'Иван27', 'Иванко27', 'Иванович27', 0, '2009-02-01', 0),
(884, 'ivan@mail.ru29', 'Иван29', 'Иванко29', 'Иванович29', 0, '2011-02-01', 0),
(885, 'ivan@mail.ru19', 'Иван19', 'Иванко19', 'Иванович19', 0, '2001-02-01', 0),
(886, 'ivan@mail.ru25', 'Иван25', 'Иванко25', 'Иванович25', 0, '2007-02-01', 0),
(887, 'ivan@mail.ru28', 'Иван28', 'Иванко28', 'Иванович28', 0, '2010-02-01', 0),
(888, 'ivan@mail.ru22', 'Иван22', 'Иванко22', 'Иванович22', 0, '2004-02-01', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=889;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
