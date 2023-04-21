-- phpMyAdmin SQL Dump

-- version 4.4.15.10

-- https://www.phpmyadmin.net

--

-- Хост: localhost

-- Время создания: Дек 22 2019 г., 15:13

-- Версия сервера: 5.5.64-MariaDB-cll-lve

-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- База данных: `infosimba`

--

-- --------------------------------------------------------

--

-- Структура таблицы `links`

--

CREATE TABLE
    IF NOT EXISTS `links` (
        `link_id` int(11) NOT NULL,
        `url_name` varchar(255) NOT NULL,
        `link_url` varchar(255) NOT NULL,
        `link_visit` int(11) NOT NULL DEFAULT '0',
        `project_id` int(11) NOT NULL,
        `comments` varchar(255) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--

-- Структура таблицы `project`

--

CREATE TABLE
    IF NOT EXISTS `project` (
        `project_id` int(11) NOT NULL,
        `project_name` varchar(255) NOT NULL,
        `link_number` int(11) NULL
    ) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;

--

-- Дамп данных таблицы `project`

--

INSERT INTO
    `project` (
        `project_id`,
        `project_name`,
        `link_number`
    )
VALUES (1, 'Без категорії', 0);

-- --------------------------------------------------------

--

-- Структура таблицы `settings`

--

CREATE TABLE
    IF NOT EXISTS `settings` (
        `id` int(11) NOT NULL,
        `domain_redirect` varchar(255) NOT NULL,
        `head_footer_color` varchar(255) NOT NULL,
        `sidebar_color` varchar(255) NOT NULL
    ) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;

--

-- Дамп данных таблицы `settings`

--

INSERT INTO
    `settings` (
        `id`,
        `domain_redirect`,
        `head_footer_color`,
        `sidebar_color`
    )
VALUES (
        1,
        'https://mysite.com/',
        '#40495f',
        '#40495f'
    );

-- --------------------------------------------------------

--

-- Структура таблицы `users`

--

CREATE TABLE
    IF NOT EXISTS `users` (
        `user_id` int(11) NOT NULL,
        `user_email` varchar(255) NOT NULL,
        `user_password` varchar(255) NOT NULL,
        `user_login` varchar(255) NOT NULL,
        `first_name` varchar(255) NOT NULL,
        `last_name` varchar(255) NOT NULL
    ) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8;

--

-- Дамп данных таблицы `users`

--

INSERT INTO
    `users` (
        `user_id`,
        `user_email`,
        `user_password`,
        `user_login`,
        `first_name`,
        `last_name`
    )
VALUES (
        1,
        'admin@mysite.com',
        '644b487c6850a29f67e20d936a613024',
        'Admin',
        'Admin',
        ''
    );

-- --------------------------------------------------------

--

-- Структура таблицы `visits`

--

CREATE TABLE
    IF NOT EXISTS `visits` (
        `visit_id` int(11) NOT NULL,
        `link_id` int(11) NOT NULL,
        `visit_ip` varchar(255) NOT NULL,
        `http_user_agent` varchar(255) NOT NULL,
        `http_referer` varchar(255) NOT NULL,
        `visit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--

-- Индексы сохранённых таблиц

--

--

-- Индексы таблицы `links`

--

ALTER TABLE `links` ADD PRIMARY KEY (`link_id`);

--

-- Индексы таблицы `project`

--

ALTER TABLE `project` ADD PRIMARY KEY (`project_id`);

--

-- Индексы таблицы `settings`

--

ALTER TABLE `settings` ADD PRIMARY KEY (`id`);

--

-- Индексы таблицы `users`

--

ALTER TABLE `users` ADD PRIMARY KEY (`user_id`);

--

-- Индексы таблицы `visits`

--

ALTER TABLE `visits` ADD PRIMARY KEY (`visit_id`);

--

-- AUTO_INCREMENT для сохранённых таблиц

--

--

-- AUTO_INCREMENT для таблицы `links`

--

ALTER TABLE
    `links` MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT для таблицы `project`

--

ALTER TABLE
    `project` MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--

-- AUTO_INCREMENT для таблицы `settings`

--

ALTER TABLE
    `settings` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--

-- AUTO_INCREMENT для таблицы `users`

--

ALTER TABLE
    `users` MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--

-- AUTO_INCREMENT для таблицы `visits`

--

ALTER TABLE
    `visits` MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;