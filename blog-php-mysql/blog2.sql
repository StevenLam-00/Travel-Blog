-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 19, 2021 at 09:46 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `commented_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `msg`, `commented_on`, `created_at`) VALUES
(5, 23, '123', '2021-06-06 19:13:16', '2021-06-06 19:13:16'),
(6, 23, 'ok comment', '2021-06-07 05:16:55', '2021-06-07 05:16:55'),
(7, 28, 'jj', '2021-06-07 05:59:58', '2021-06-07 05:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply_msg` longtext COLLATE utf8_unicode_ci NOT NULL,
  `commented_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `user_id`, `comment_id`, `reply_msg`, `commented_on`, `created_at`) VALUES
(2, 28, 5, 'Why ?', '2021-06-07 05:17:33', '2021-06-07 05:17:33'),
(3, 28, 6, 'sfads', '2021-06-07 05:34:47', '2021-06-07 05:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(18, 23, 2, 'INTERNATIONAL UNIVERSITY', '1622952472_HCMIU.jpeg', '&lt;p&gt;Trường Đại học Quốc Tế - Đại học Quốc gia Th&agrave;nh phố Hồ Ch&iacute; Minh l&agrave; một trong bảy trường đại học th&agrave;nh vi&ecirc;n trực thuộc Đại học Quốc gia Th&agrave;nh phố Hồ Ch&iacute; Minh, được th&agrave;nh lập v&agrave;o th&aacute;ng 12 năm 2003. Đ&acirc;y l&agrave; trường đại học c&ocirc;ng lập đa ng&agrave;nh đầu ti&ecirc;n v&agrave; duy nhất hiện nay tại Việt Nam giảng dạy ho&agrave;n to&agrave;n tiếng Anh.&lt;/p&gt;', 1, '2021-06-06 11:07:52'),
(19, 23, 4, 'DAI HOC BACH KHOA', '1622988277_images.jpeg', '&lt;p&gt;Trường Đại học B&aacute;ch khoa l&agrave; trường đại học chuy&ecirc;n ng&agrave;nh kỹ thuật đầu ng&agrave;nh tại Việt Nam, th&agrave;nh vi&ecirc;n của hệ thống Đại học Quốc gia, được xếp v&agrave;o nh&oacute;m đại học trọng điểm quốc gia Việt Nam.&lt;/p&gt;', 1, '2021-06-06 21:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'Can Tho'),
(2, 'Sai Gon');

-- --------------------------------------------------------

--
-- Table structure for table `resetPassword`
--

CREATE TABLE `resetPassword` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resetPassword`
--

INSERT INTO `resetPassword` (`id`, `code`, `email`) VALUES
(1, '160cc16840873c', 'khuukhonlam@gmail.com'),
(2, '160cc16c335566', 'khuukhonlam@gmail.com'),
(3, '160cc17518e0b3', 'khuukhonlam@gmail.com'),
(5, '160cc8f357822d', 'khuukhonlam@gmail.com'),
(6, '160cc907c46164', 'khuukhonlam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Texas');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(2, 'Life', '<p>test change</p>'),
(3, 'Quotes', ''),
(4, 'Fiction', ''),
(5, 'Biography', ''),
(6, ' Motivation', ''),
(7, 'Inspiration', ''),
(8, 'Test', '<p>test</p>');

-- --------------------------------------------------------

--
-- Table structure for table `usacomms`
--

CREATE TABLE `usacomms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(23, 1, 'Lam', 'khuukhonlam@gmail.com', '$2y$10$DnAhZXJg6jf3Hf/jYnJA/.EQ1FSJ0WacnYioLrALYdWUQcvYpQw7u', '2021-06-04 02:52:06'),
(28, 0, 'steven', 'chickengaac@gmail.com', '$2y$10$E0TO1Sfjq3zEQx1vSCTKpODcAov30VdPtZMSA1ITREvKE5JbTd3HC', '2021-06-05 17:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `vnaccomms`
--

CREATE TABLE `vnaccomms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vnaccomms`
--

INSERT INTO `vnaccomms` (`id`, `user_id`, `province_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(1, 23, 1, 'CAN THO RIGHT ', '1624092457_Screen Shot 2021-06-18 at 10.48.20 AM.png', '&lt;p&gt;Cần Thơ l&agrave; một th&agrave;nh phố thuộc tỉnh Cần Thơ cũ v&agrave; l&agrave; tỉnh lỵ của tỉnh Cần Thơ trước khi th&agrave;nh lập th&agrave;nh phố Cần Thơ trực thuộc trung ương. Th&agrave;nh phố Cần Thơ l&uacute;c bấy giờ c&oacute; địa giới h&agrave;nh ch&iacute;nh tương ứng với c&aacute;c quận Ninh Kiều, B&igrave;nh Thủy, một phần quận C&aacute;i Răng v&agrave; một phần huyện Phong Điền ng&agrave;y nay&lt;/p&gt;', 1, '2021-06-19 15:47:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetPassword`
--
ALTER TABLE `resetPassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `usacomms`
--
ALTER TABLE `usacomms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vnaccomms`
--
ALTER TABLE `vnaccomms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resetPassword`
--
ALTER TABLE `resetPassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usacomms`
--
ALTER TABLE `usacomms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vnaccomms`
--
ALTER TABLE `vnaccomms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
