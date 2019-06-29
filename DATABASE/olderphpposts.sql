-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2019 at 02:18 PM
-- Server version: 5.5.62
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olderphpposts`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `second_title` varchar(255) NOT NULL,
  `pubdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(100) NOT NULL DEFAULT 'Anonim',
  `image_article` char(255) NOT NULL DEFAULT '/images/default_img.jpeg',
  `id_image` int(11) DEFAULT NULL,
  `text` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `comments` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `second_title`, `pubdate`, `author`, `image_article`, `id_image`, `text`, `likes`, `comments`) VALUES
(1, 'Первый заголовок', 'Что сюда писать?', '2018-04-12 11:02:56', 'admin', '/images/pic01.jpeg', 1, 'Ваш шедевр готов!\r\nЗначимость этих проблем настолько очевидна, что консультация с широким активом требуют от нас анализа новых предложений. Таким образом рамки и место обучения кадров позволяет выполнять важные задания по разработке новых предложений. С другой стороны постоянный количественный рост и сфера нашей активности представляет собой интересный эксперимент проверки форм развития.\r\n\r\nТоварищи! реализация намеченных плановых заданий способствует подготовки и реализации существенных финансовых и административных условий. Товарищи! постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации. Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации направлений прогрессивного развития. Задача организации, в особенности же реализация намеченных плановых заданий в значительной степени обуславливает создание соответствующий условий активизации.', 3, 3),
(2, 'Как начать рисовать', '...или мотивация из пустоты', '2018-04-12 11:04:41', 'holyv', '/images/pic02.jpeg', 4, 'Ваш шедевр готов!\r\nЗначимость этих проблем настолько очевидна, что консультация с широким активом требуют от нас анализа новых предложений. Таким образом рамки и место обучения кадров позволяет выполнять важные задания по разработке новых предложений. С другой стороны постоянный количественный рост и сфера нашей активности представляет собой интересный эксперимент проверки форм развития.\r\n\r\nТоварищи! реализация намеченных плановых заданий способствует подготовки и реализации существенных финансовых и административных условий. Товарищи! постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации. Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации направлений прогрессивного развития. Задача организации, в особенности же реализация намеченных плановых заданий в значительной степени обуславливает создание соответствующий условий активизации.', 2, 3),
(3, 'Challenger for 3 days', 'Как потратить время впустую', '2018-04-12 11:10:11', 'stalkerboy74', '/images/pic03.jpeg', 3, 'Ваш шедевр готов!\r\nЗначимость этих проблем настолько очевидна, что консультация с широким активом требуют от нас анализа новых предложений. Таким образом рамки и место обучения кадров позволяет выполнять важные задания по разработке новых предложений. С другой стороны постоянный количественный рост и сфера нашей активности представляет собой интересный эксперимент проверки форм развития.\r\n\r\nТоварищи! реализация намеченных плановых заданий способствует подготовки и реализации существенных финансовых и административных условий. Товарищи! постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации. Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации направлений прогрессивного развития. Задача организации, в особенности же реализация намеченных плановых заданий в значительной степени обуславливает создание соответствующий условий активизации.', 4, 5),
(4, 'Просто красивая картинка', 'Канада', '2018-04-12 11:11:40', 'testReg', '/images/pic04.jpeg', 2, 'Тут и слов не нужно', 2, 3),
(5, 'Обвал акций Сбербанка', 'Немножко политоты вам в ленту', '2018-04-12 11:13:21', 'stalkerboy74', '/images/pic05.jpeg', 3, 'Ваш шедевр готов!\r\nЗначимость этих проблем настолько очевидна, что консультация с широким активом требуют от нас анализа новых предложений. Таким образом рамки и место обучения кадров позволяет выполнять важные задания по разработке новых предложений. С другой стороны постоянный количественный рост и сфера нашей активности представляет собой интересный эксперимент проверки форм развития.\r\n\r\nТоварищи! реализация намеченных плановых заданий способствует подготовки и реализации существенных финансовых и административных условий. Товарищи! постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании соответствующий условий активизации. Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации направлений прогрессивного развития. Задача организации, в особенности же реализация намеченных плановых заданий в значительной степени обуславливает создание соответствующий условий активизации.', 3, 5),
(12, 'Проверка возможности редактирования 29.6.2019', 'Проверка возможности редактирования 29.6.2019', '2018-04-22 10:04:34', 'admin', '/images/default_img.jpeg', NULL, 'Проверка возможности редактирования 29.6.2019', 4, 2),
(13, 'Проверка добавления поста 29.06.2019', 'Проверка добавления поста 29.06.2019', '2018-04-22 10:04:34', 'admin', '/images/default_img.jpeg', NULL, 'Проверка добавления поста 29.06.2019', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_avatar` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `articles_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `image_avatar`, `author`, `articles_id`, `text`) VALUES
(1, 1, '', 'admin', 1, 'Тут текст админа'),
(2, 2, '', 'stalkerboy74', 1, 'Тут текст сталкера'),
(3, 3, '', 'holyv', 1, 'Крякаю'),
(4, 1, '', 'admin', 2, 'Сообщение админа'),
(5, 4, '', 'testban', 2, 'Ха, пост неудачника'),
(6, 1, '', 'admin', 2, 'так бывает'),
(7, 3, '', 'holyv', 3, 'Ору'),
(8, 5, '', 'Konobeev', 3, 'Лучше бы на пары ходил. Хотя бы на мои.'),
(9, 2, '', 'stalkerboy74', 4, 'Упф, там так красиво'),
(10, 1, '', 'admin', 4, 'Мне тоже нрав'),
(11, 3, '', 'holyv', 4, 'Могу нарисовать. Принимаю заказы на пейзажи)0))0'),
(12, 2, '', 'stalkerboy74', 3, 'лоооооол'),
(13, 2, '', 'stalkerboy74', 5, 'Всё как обычно. Что думаете?'),
(14, 3, '', 'holyv', 5, 'Лучше пойду про гараж почитаю...'),
(15, 1, '', 'admin', 5, 'Всё как обычно. Россия не способна нормально отвечать на санкции. С каждым годом хуже и хуже. Если есть желающие закупать EURO сейчас, после скачка - одумайтесь, сидите спокойно. Нужно было закупаться, пока оно было по 65-68 рублей.'),
(19, 2, '', 'stalkerboy74', 5, 'Админ прав. А вообще, я давно хотел аккаунт лижки продать. Сейчас самое время :D'),
(21, 11, '', 'misha', 3, '555555555'),
(22, 11, '', 'misha', 3, '777532532532253235'),
(23, 3, '', 'holyv', 12, '????'),
(24, 8, '', 'Juenta', 5, 'admin, моей бабушке это расскажи'),
(25, 1, '', 'admin', 12, 'Проверка добавления комментария 29.06.2019');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(1, '/images/user_avatar/admin_avatar1.jpeg'),
(2, '/images/user_avatar/undefined_avatar.jpeg'),
(3, '/images/user_avatar/avatar1.jpeg'),
(4, '/images/user_avatar/avatar2.jpeg'),
(5, '/images/user_avatar/avatar3.jpeg'),
(6, '/images/user_avatar/nadya.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `id_article`, `author`) VALUES
(3, 6, 'admin'),
(6, 5, 'stalkerboy74'),
(10, 3, 'Juenta'),
(12, 5, 'misha'),
(13, 3, 'misha'),
(14, 6, 'misha'),
(16, 3, 'holyv'),
(17, 6, 'holyv'),
(35, 6, 'stalkerboy74'),
(37, 1, 'stalkerboy74'),
(44, 5, 'admin'),
(57, 12, 'testreg'),
(58, 4, 'testreg'),
(60, 1, 'testreg'),
(61, 2, 'testreg'),
(62, 12, 'holyv'),
(63, 4, 'holyv'),
(64, 1, 'holyv'),
(65, 2, 'holyv'),
(67, 3, 'Konobeev'),
(71, 12, 'Juenta'),
(72, 12, 'LastUser');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `access` int(1) NOT NULL DEFAULT '1',
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `image_avatar` varchar(255) NOT NULL DEFAULT '/images/user_avatar/undefined_avatar.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `access`, `login`, `pass`, `image_avatar`) VALUES
(1, 1, 'admin', 'admin', '/images/user_avatar/admin_avatar1.jpeg'),
(2, 1, 'stalkerboy74', '585912', '/images/user_avatar/avatar1.jpeg'),
(3, 1, 'holyv', 'duck', '/images/user_avatar/avatar2.jpeg'),
(4, 1, 'testban', 'test', '/images/user_avatar/undefined_avatar.jpeg'),
(5, 1, 'Konobeev', 'kvazars', '/images/user_avatar/avatar3.jpeg'),
(6, 1, 'testReg', '123', '/images/user_avatar/undefined_avatar.jpeg'),
(7, 1, 'LastUser', '1111', '/images/user_avatar/undefined_avatar.jpeg'),
(8, 1, 'Juenta', '123', ' /images/user_avatar/nadya.jpeg'),
(9, 1, 'NewUser', '123', '/images/user_avatar/undefined_avatar.jpeg'),
(10, 1, 'TestUser2', '12345', '/images/user_avatar/undefined_avatar.jpeg'),
(11, 1, 'misha', '1234', '/images/user_avatar/undefined_avatar.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_likes_count`
--

CREATE TABLE `user_likes_count` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `likes_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_likes_count`
--

INSERT INTO `user_likes_count` (`id`, `author`, `likes_count`) VALUES
(11, 'stalkerboy74', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_image` (`id_image`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_likes_count`
--
ALTER TABLE `user_likes_count`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_likes_count`
--
ALTER TABLE `user_likes_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
