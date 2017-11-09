-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 09 2017 г., 13:14
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `osblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_it` int(11) NOT NULL,
  `comment` text NOT NULL,
  `author` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `post_it`, `comment`, `author`) VALUES
(1, 40, 'tyert', '1'),
(2, 40, '123', '1'),
(3, 40, '4', '1'),
(4, 40, 'trololo', '1'),
(5, 38, 'rew', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `like` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `caption`, `text`, `author_id`, `category`, `img`, `like`) VALUES
(3, '', '<h1>Hello world!</h1><p>I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>.</p>', 0, 0, '', 0),
(4, 'qewrqwer23', '<h1>Hello world!</h1><p>I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>.</p>', 0, 0, '', 0),
(5, 'caption', '<h1>Hello world!</h1><p>I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>.</p>', 0, 0, '11.png', 0),
(6, 'caption', '<h1>Hello world!</h1><p>I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>.</p>', 0, 0, '', 0),
(7, 'caption', '<h3 style="color:#aaaaaa;font-style:italic;">I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>. no non o!!!</h3>', 0, 0, '11.png', 0),
(8, 'caption', '<h3 style="color:#aaaaaa;font-style:italic;">I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>. no non o!!!</h3>', 0, 0, '', 0),
(9, 'caption', '<h3 style="color:#aaaaaa;font-style:italic;">I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>. no non o!!!</h3>', 0, 1, '', 0),
(10, 'caption 1', '<h3 style="color:#aaaaaa;font-style:italic;">I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>. no non o!!!</h3>', 0, 1, '', 0),
(11, 'some title', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..</h3>', 0, 1, 'Screenshot_2.png', 0),
(13, 'some title 1', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..1</h3>', 0, 2, 'Screenshot_2.png', 0),
(15, 'some title 2', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..2</h3>', 0, 0, 'Screenshot_2.png', 0),
(17, 'some title 3', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..3</h3>', 0, 2, 'Screenshot_2.png', 0),
(19, 'some title 4', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..4</h3>', 0, 2, 'Screenshot_2.png', 0),
(21, 'some title 5', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..5</h3>', 0, 2, 'Screenshot_2.png', 0),
(23, 'some title 6', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..6</h3>', 0, 1, 'Screenshot_2.png', 0),
(25, 'some title 7', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..7</h3>', 0, 2, 'Screenshot_2.png', 0),
(27, 'some title 8', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..8</h3>', 0, 0, 'Screenshot_2.png', 0),
(29, 'some title 9', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..9</h3>', 0, 0, 'Screenshot_2.png', 0),
(31, 'some title 10', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..10</h3>', 0, 0, 'Screenshot_2.png', 0),
(33, 'some title 11', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..11</h3>', 0, 1, 'Screenshot_2.png', 0),
(35, 'some title 12', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..12</h3>', 0, 1, 'Screenshot_2.png', 0),
(37, 'some title 12', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..12</h3>', 0, 1, 'Screenshot_2.png', 0),
(39, 'some title 13', '<h3 style="color:#aaaaaa;font-style:italic;">This is some decription..13</h3>', 0, 1, 'Screenshot_2.png', 0),
(41, 'caption', '<h1>Hello world!</h1><p>I''m an instance of <a data-cke-saved-href="http://ckeditor.com" href="http://ckeditor.com">CKEditor</a>.</p>', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`) VALUES
(12, 'admin', 'admin', ''),
(13, 'test', 'test', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
