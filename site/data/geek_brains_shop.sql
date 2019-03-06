-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 01 2019 г., 18:19
-- Версия сервера: 5.7.25-0ubuntu0.18.04.2
-- Версия PHP: 7.1.24-1+ubuntu16.04.1+deb.sury.org+1

CREATE USER IF NOT EXISTS 'geek_brains'@'localhost' IDENTIFIED WITH mysql_native_password BY '123123';
GRANT USAGE ON *.* TO 'geek_brains'@'localhost';
ALTER USER 'geek_brains'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

GRANT ALL PRIVILEGES ON `geek_brains_shop`.* TO 'geek_brains'@'localhost';

CREATE DATABASE IF NOT EXISTS `geek_brains_shop`;
USE `geek_brains_shop`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geek_brains_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images`
(
  `id`    int(11)      NOT NULL,
  `url`   varchar(255) NOT NULL,
  `views` int(11)      NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `size`  int(11)      NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `url`, `views`, `title`, `size`)
VALUES (1, 'img/1.jpg', 26, 'Картинка 1', 0),
       (2, 'img/2.jpg', 2, 'Картинка 2', 0),
       (3, 'img/3.jpg', 0, 'Картинка 3', 0),
       (4, 'img/4.jpg', 0, 'Картинка 4', 0),
       (5, 'img/5.jpg', 0, 'Картинка 5', 0),
       (6, 'img/6.jpg', 1, 'Картинка 6', 0),
       (7, 'img/7.jpg', 0, 'Картинка 7', 0),
       (8, 'img/8.jpg', 5, 'Картинка 8', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news`
(
  `id`          int(11)      NOT NULL,
  `title`       varchar(255) NOT NULL,
  `content`     text         NOT NULL,
  `date_create` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image`       varchar(255)          DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date_create`, `image`)
VALUES (1, 'Я создал магазин', 'В нашем магазине много полезных продуктов. Приходи и покупай', '2019-02-25 18:45:33',
        NULL),
       (2, 'Теперь у нас есть картинки', 'Почти все новости теперь будут сопровождаться картинками',
        '2019-02-25 18:47:04', '/img/1.jpg'),
       (4, 'Заголовок', 'Контент', '2019-02-28 18:27:06', NULL),
       (5, 'Заголовок', 'Контент новой статьи', '2019-02-28 18:27:25', NULL),
       (6, 'Hello', '<h1>Hello</h1>', '2019-02-28 18:29:52', NULL),
       (7, 'Hello',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolor explicabo ipsum nam quibusdam repellat reprehenderit repudiandae sint ut voluptate? A aut consequuntur dolore excepturi modi odit quia rem vero.',
        '2019-02-28 18:42:25', NULL),
       (8, 'Hello',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolor explicabo ipsum nam quibusdam repellat reprehenderit repudiandae sint ut voluptate? A aut consequuntur dolore excepturi modi odit quia rem vero.',
        '2019-02-28 18:43:24', NULL),
       (9, 'Hello',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolor explicabo ipsum nam quibusdam repellat reprehenderit repudiandae sint ut voluptate? A aut consequuntur dolore excepturi modi odit quia rem vero.',
        '2019-02-28 18:45:37', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products`
(
  `id`          int(11)      NOT NULL,
  `name`        varchar(255) NOT NULL,
  `description` text,
  `price`       int(11)      NOT NULL,
  `image`       varchar(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews`
(
  `id`      int(11)      NOT NULL,
  `author`  varchar(255) NOT NULL,
  `comment` text         NOT NULL,
  `date`    timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `comment`, `date`)
VALUES (1, 'Заголовок', 'Контент', '2019-02-28 18:56:50'),
       (2, 'Заголовок', 'Контент', '2019-02-28 18:57:00'),
       (3, 'Новый отзыв', 'Привет', '2019-02-28 18:57:11'),
       (4, 'Хороший сайт', 'Мне все понравилось', '2019-02-28 18:57:26'),
       (5, 'Курсы огонь', 'Но препод так себе', '2019-02-28 18:57:35');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
COMMIT;

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

# DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
  `id`    int(11)      NOT NULL,
  `login`   varchar(255) NOT NULL,
  `password` varchar(255)  NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `session_id` varchar(255),
  `create_date` datetime NOT NULL DEFAULT NOW(),
  `change_date` datetime NOT NULL DEFAULT NOW()
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `users`
  ADD UNIQUE INDEX `login` (`login`);

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
