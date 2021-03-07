-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 04:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(50) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `long_description` text NOT NULL,
  `short_des` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` text NOT NULL,
  `category` bigint(50) NOT NULL,
  `status` int(11) NOT NULL,
  `writer_type` int(11) NOT NULL,
  `reason` text NOT NULL,
  `alloted_to` bigint(50) NOT NULL,
  `written_by` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `image`, `title`, `long_description`, `short_des`, `timestamp`, `tags`, `category`, `status`, `writer_type`, `reason`, `alloted_to`, `written_by`) VALUES
(15, 'AYUSH', 'http://localhost/DuBuddy/staff/content/uploads/1607745829.jpeg', 'DU ADMISSION 2020: STEP BY STEP ONLINE ADMISSION PROCEDURE AFTER CHECKING CUTOFFS', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img src=\"http://localhost/DuBuddy/admin/uploads/1611286404.jpg\" style=\"margin:10px auto 20px; width:auto\" /></p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.<img src=\"http://localhost/DuBuddy/staff/intern/uploads/1611286690.jpg\" style=\"width:85%\" /></p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p><img src=\"http://localhost/DuBuddy/staff/content/uploads/1607745829.jpeg\" style=\"width:85%\" /></p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 'raaaaaaaaaa', '2021-02-21 10:47:30', 'tags', 3, 1, 0, '', 0, 3),
(16, 'hfs', 'http://localhost/DuBuddy/staff/intern/uploads/1608012994.png', 'blog', '&lt;img src=&quot;http://localhost/DuBuddy/staff/intern/uploads/1608012994.png&quot; style=&quot;width:85%&quot; /&gt;', '', '2020-12-25 08:03:07', 'dubuddy', 0, 4, 0, '', 0, 4),
(17, 'DuBuddy', 'http://localhost/DuBuddy/staff/content/uploads/1607745829.jpeg', 'DU ADMISSION 2020: STEP BY STEP ONLINE ADMISSION PROCEDURE AFTER CHECKING CUTOFFS', '&lt;p&gt;test blog which contains a photo&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img src=&quot;http://localhost/DuBuddy/staff/content/uploads/1607745829.jpeg&quot; style=&quot;width:85%&quot; /&gt;&lt;/p&gt;', '', '2020-12-22 14:00:37', 'test,dubuddy', 0, 1, 2, '', 0, 2),
(18, 'AYUSH', '', 'test', 'hello hello', '', '2021-02-15 08:43:56', 'gsha', 3, 1, 2, '', 0, 3),
(19, 'AYUSH', '', 'sdfgh', 'ghjxc', '', '2021-02-15 08:41:52', 'sdf', 4, 3, 2, 'fdgh', 0, 3),
(20, 'gfgbvb', '', 'gnhvbm', 'gfcvgb', 'fcvgbh', '2021-02-21 10:48:30', 'fgh', 4, 1, 0, '', 0, 0),
(21, 'test', '', 'test t', 'hehgjdsmncx', 'fsgxh', '2021-02-21 14:04:14', '#test#test2', 3, 1, 0, '', 0, 0),
(22, 'Admin', '', 'content check', 'check', 'checknew', '2021-02-21 14:14:34', 'check', 4, 1, 2, '', 0, 4),
(23, 'AYUSH', '', 'intern check', 'check', 'check ', '2021-02-21 14:17:47', 'check', 3, 0, 2, '', 0, 3),
(24, 'test', '', 't2', 'ghsjak', 'hjsdc', '2021-03-06 14:47:56', '#ab#cd', 4, 1, 0, '', 0, 0),
(25, 'COVID', 'http://localhost/voting/admin/uploads/1615045245.jpg', 'COVID', '<img src=\"http://localhost/voting/admin/uploads/1615045245.jpg\" style=\"display:block; margin:10px auto 20px; max-height:400px; width:auto\" />', 'FGASJh', '2021-03-06 16:21:08', '#ch3ck#test', 4, 1, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(50) NOT NULL,
  `category` text NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category`, `color`) VALUES
(3, 'General', ''),
(4, 'new ctegory', ''),
(8, 'newtest', '#e92b2b');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `id` bigint(50) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `start_date` text NOT NULL,
  `start_time` text NOT NULL,
  `end_date` text NOT NULL,
  `end_time` text NOT NULL,
  `prize` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id`, `name`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `prize`, `status`) VALUES
(16, 'upcoming', '   test', '2021-03-26', '19:00', '2021-03-31', '19:00', '15', 1),
(17, 'ongoing', '   test test', '2021-03-03', '19:00', '2021-03-26', '20:00', '345', 1),
(18, 'completed', '   test', '2021-02-28', '21:00', '2021-03-05', '21:00', '15$', 1),
(19, 'enrolled', '   test ', '2021-03-02', '21:00', '2021-03-19', '21:00', '11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contest_songs`
--

CREATE TABLE `contest_songs` (
  `id` bigint(50) NOT NULL,
  `c_id` bigint(50) NOT NULL,
  `s_id` bigint(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest_songs`
--

INSERT INTO `contest_songs` (`id`, `c_id`, `s_id`, `status`) VALUES
(5, 16, 5, 1),
(6, 16, 6, 1),
(7, 16, 7, 1),
(8, 17, 7, 1),
(9, 17, 8, 1),
(10, 19, 5, 1),
(11, 19, 6, 1),
(12, 19, 7, 1),
(13, 18, 4, 1),
(14, 18, 5, 1),
(15, 18, 6, 1),
(16, 18, 7, 1),
(17, 18, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contest_users`
--

CREATE TABLE `contest_users` (
  `id` bigint(50) NOT NULL,
  `c_id` bigint(50) NOT NULL,
  `u_id` bigint(50) NOT NULL,
  `description` text NOT NULL,
  `votes` bigint(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest_users`
--

INSERT INTO `contest_users` (`id`, `c_id`, `u_id`, `description`, `votes`, `status`) VALUES
(32, 19, 1, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `description`, `icon`) VALUES
(1, 'Song', 'Simply dummy text of the printing andrety esetting industry. Lorem Ipsum has beeyan the indust standard ', 'fa fa-camera-retro'),
(2, 'Video Upload', 'Simply dummy text of the printing andrety esetting industry. Lorem Ipsum has beeyan the indust standard unknown', 'fa fa-pencil-square-o'),
(5, 'Video Downloadd', 'Simply dummy text of the printing andrety esetting industry. Lorem Ipsum has beeyan the indust standard unknownn', 'fa fa-upload');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(50) NOT NULL,
  `u_id` bigint(50) NOT NULL,
  `image` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `u_id`, `image`, `time_stamp`, `category`) VALUES
(25, 2, 'http://localhost/DuBuddy/staff/content/uploads/1607745829.jpeg', '2020-12-12 04:03:49', 'Blogs'),
(26, 4, 'http://localhost/DuBuddy/staff/intern/uploads/1608012994.png', '2020-12-15 06:16:34', 'Blogs'),
(27, 1, 'http://localhost/DuBuddy/admin/uploads/1611286404.jpg', '2021-01-22 03:33:24', '[object Object]'),
(30, 3, 'http://localhost/DuBuddy/staff/intern/uploads/1613378003.png', '2021-02-15 08:33:23', 'Blogs'),
(31, 3, 'http://localhost/DuBuddy/staff/intern/uploads/1613378419.png', '2021-02-15 08:40:19', 'Blogs'),
(32, 1, 'http://localhost/DuBuddy/admin/uploads/1613379696.png', '2021-02-15 09:01:36', 'Blogs'),
(33, 1, 'http://localhost/DuBuddy/admin/uploads/1613379810.png', '2021-02-15 09:03:30', 'Blogs'),
(35, 1, 'http://localhost/voting/admin/uploads/1615045245.jpg', '2021-03-06 15:40:45', 'Blogs');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` bigint(20) NOT NULL,
  `heading` text NOT NULL,
  `sub_heading` text NOT NULL,
  `image` text NOT NULL,
  `link` text NOT NULL,
  `color` text NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `heading`, `sub_heading`, `image`, `link`, `color`, `sort_order`) VALUES
(1, 'Slider test', 'voting Contestw', 'http://localhost/voting/admin/uploads/1615053275_Screenshot (469).png', 'view_blog', '#cd0a0a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `index`
--

CREATE TABLE `index` (
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `index_changes`
--

CREATE TABLE `index_changes` (
  `id` bigint(50) NOT NULL,
  `c_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `title_color` text NOT NULL,
  `subtitle` text NOT NULL,
  `subtitle_color` text NOT NULL,
  `header_image` text NOT NULL,
  `body_title` text NOT NULL,
  `body_title_color` text NOT NULL,
  `body_subtitle` text NOT NULL,
  `body_subtitle_color` text NOT NULL,
  `btn_color` text NOT NULL,
  `name_color` text NOT NULL,
  `votes_color` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `index_changes`
--

INSERT INTO `index_changes` (`id`, `c_id`, `title`, `title_color`, `subtitle`, `subtitle_color`, `header_image`, `body_title`, `body_title_color`, `body_subtitle`, `body_subtitle_color`, `btn_color`, `name_color`, `votes_color`, `status`) VALUES
(1, 1, 'Main Title 222', '#10c668', 'Sub Title new new', '#ef0ba7', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'Voteeee!!', '#2b4e73', 'Hello  ', '#22ece2', '#952d2d', '#58ae1e', '#000000', 1),
(2, 2, 'VOTE FOR OUR NEWEST FLAVOUR!', 'black', 'Enter for a chance to win a year\'s supply of ice cream !', 'black', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', 'black', 'Calling all ice cream lovers! Here\'s your chance to pick the Icecream Shoppe\'s next feature flavour.Choose one of the options below\r\n                below to cast your vote - one lucky winner will recieve a year\'s supply of Icecream hoppe ice cream. You can vote once a day. \r\n                So don\'t forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', 'yellow', 'purple', 'pink', 1),
(3, 14, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#18c91d', '#133db9', '#c81414', 0),
(4, 15, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(5, 16, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(6, 17, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(7, 18, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(8, 19, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `id` bigint(50) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` bigint(50) NOT NULL,
  `name` text NOT NULL,
  `song` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `song`, `status`) VALUES
(4, 'test 1', 'http://localhost/voting/admin/uploads/WhatsApp Ptt 2021-02-22 at 8.35.29 AM.1614333702.ogg', 1),
(5, 'test2', 'http://localhost/voting/admin/uploads/WhatsApp Ptt 2021-02-22 at 8.35.29 AM.1614338222.ogg', 1),
(6, 'test3', 'http://localhost/voting/admin/uploads/WhatsApp Ptt 2021-02-22 at 8.35.29 AM.1614338241.ogg', 1),
(7, 'test4', 'http://localhost/voting/admin/uploads/WhatsApp Ptt 2021-02-22 at 8.35.29 AM.1614338252.ogg', 1),
(8, 'test5', 'http://localhost/voting/admin/uploads/WhatsApp Ptt 2021-02-22 at 8.35.29 AM.1614338346.ogg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(50) NOT NULL,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `ip_address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `ip_address`, `status`) VALUES
(1, 'rashi', '123456', 'r@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(2, 'u2new', '1456213244', 'u2new@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 2),
(4, 'u4', '25364785', 'u4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(5, 'u5', '985774635', 'u5@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(6, 'u6', '9485763524', 'u6@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(10, 'rasdghi', '7654345678', 'rsa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1),
(11, 'new', '1234567890', 'nu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(50) NOT NULL,
  `u_id` bigint(50) NOT NULL,
  `c_id` bigint(50) NOT NULL,
  `video` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `u_id`, `c_id`, `video`, `status`) VALUES
(45, 1, 19, 'http://localhost/voting/user/uploads./VID_81250711_043555_046.1615038525.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` bigint(50) NOT NULL,
  `email` text NOT NULL,
  `c_id` bigint(50) NOT NULL,
  `cu_id` bigint(50) NOT NULL,
  `ip_address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `web_config`
--

CREATE TABLE `web_config` (
  `id` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `phn` text NOT NULL,
  `address` text NOT NULL,
  `location` text NOT NULL,
  `logo` text NOT NULL,
  `image` text NOT NULL,
  `feature_image` text NOT NULL,
  `message` text NOT NULL,
  `about` text NOT NULL,
  `about_us` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `twitter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_config`
--

INSERT INTO `web_config` (`id`, `email`, `phn`, `address`, `location`, `logo`, `image`, `feature_image`, `message`, `about`, `about_us`, `facebook`, `instagram`, `twitter`) VALUES
(1, 'r@gamil.com', '7302248204', 'miyanwala', 'miyanwala', 'http://localhost/voting/admin/uploads/1615053275_Screenshot (469).png', 'http://localhost/voting/admin/uploads/1615053275_Screenshot (469).png', 'http://localhost/voting/admin/uploads/1615053275_Screenshot (469).png', 'hello test', 'ertyuiklmnbv', ' HD Resulation Lorem Ipsum text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.  Camra Shop Lorem Ipsum text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.', 'facebbook', 'instagram', 'twitter');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `id` bigint(50) NOT NULL,
  `c_id` bigint(50) NOT NULL,
  `u_id` bigint(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest_songs`
--
ALTER TABLE `contest_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest_users`
--
ALTER TABLE `contest_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `index_changes`
--
ALTER TABLE `index_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_config`
--
ALTER TABLE `web_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contest_songs`
--
ALTER TABLE `contest_songs`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contest_users`
--
ALTER TABLE `contest_users`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `index_changes`
--
ALTER TABLE `index_changes`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `web_config`
--
ALTER TABLE `web_config`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `winner`
--
ALTER TABLE `winner`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
