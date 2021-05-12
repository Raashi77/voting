-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 08:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `short_des` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` text DEFAULT NULL,
  `category` bigint(50) NOT NULL,
  `status` int(11) NOT NULL,
  `writer_type` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  `alloted_to` bigint(50) NOT NULL,
  `written_by` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `image`, `title`, `long_description`, `short_des`, `timestamp`, `tags`, `category`, `status`, `writer_type`, `reason`, `alloted_to`, `written_by`) VALUES
(18, 'AYUSH', 'http://localhost/voting/admin/uploads/1615287383.jpg', 'test', '<h2><img src=\"http://localhost/voting/admin/uploads/1615287383.jpg\" style=\"display:block; margin:10px auto 20px; max-height:400px; width:auto\" />What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 'test', '2021-03-30 14:15:38', 'gsha', 9, 1, 2, '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(50) NOT NULL,
  `category` text DEFAULT NULL,
  `color` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category`, `color`) VALUES
(9, 'cat new', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL,
  `vid_id` bigint(20) DEFAULT NULL,
  `c_id` bigint(20) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `user` bigint(20) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `vid_id`, `c_id`, `comments`, `user`, `time_stamp`) VALUES
(1, 90, 17, 'This is a good laptop\r\n', 17, '2021-05-12 16:56:08'),
(2, 90, NULL, 'Good Laptop please share the link to buy!', 22, '2021-05-12 18:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `id` bigint(50) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `start_time` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `end_time` text DEFAULT NULL,
  `prize` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id`, `name`, `description`, `start_date`, `start_time`, `end_date`, `end_time`, `prize`, `status`) VALUES
(17, 'ongoing', '   test test', '2021-03-03', '19:00', '2021-07-26', '20:00', '345', NULL),
(24, 'BLAZE THE TRACK', '     rap your hardest \r\nthrow a hook the smartest \r\nwatch the ball grow ', '2021-04-29', '19:18', '2021-05-14', '21:30', '$500', 1),
(25, 'test contest', 'test dscription   ', '2021-04-01', '00:59', '2021-06-01', '23:59', '30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contest_songs`
--

CREATE TABLE `contest_songs` (
  `id` bigint(50) NOT NULL,
  `c_id` bigint(50) NOT NULL,
  `s_id` bigint(50) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest_songs`
--

INSERT INTO `contest_songs` (`id`, `c_id`, `s_id`, `status`) VALUES
(6, 20, 11, 1),
(7, 20, 17, 1),
(8, 20, 15, 1),
(9, 17, 17, 1),
(10, 24, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contest_users`
--

CREATE TABLE `contest_users` (
  `id` bigint(50) NOT NULL,
  `c_id` bigint(50) NOT NULL,
  `u_id` bigint(50) NOT NULL,
  `description` text DEFAULT NULL,
  `votes` bigint(50) DEFAULT 0,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contest_users`
--

INSERT INTO `contest_users` (`id`, `c_id`, `u_id`, `description`, `votes`, `status`) VALUES
(37, 20, 11, '', 2, 1),
(38, 20, 14, NULL, 2, 1),
(39, 20, 13, NULL, 1, 1),
(40, 20, 15, NULL, 2, 1),
(41, 20, 16, NULL, 2, 1),
(42, 20, 17, NULL, 0, 1),
(43, 17, 17, NULL, 2, 1),
(44, 16, 19, NULL, 1, 1),
(45, 17, 20, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) NOT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `description`, `icon`) VALUES
(1, 'Song', 'Simply dummy text of the printing andrety esetting industry. Lorem Ipsum has beeyan the indust standard ', 'fa fa-camera-retro'),
(2, 'Make  Video ', 'Simply dummy text of the printing andrety esetting industry. Lorem Ipsum has beeyan the indust standard unknown', 'fa fa-pencil-square-o'),
(5, 'Video Downloadd', 'Simply dummy text of the printing andrety esetting industry. Lorem Ipsum has beeyan the indust standard unknownn', 'fa fa-upload');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(50) NOT NULL,
  `u_id` bigint(50) NOT NULL,
  `image` text DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `u_id`, `image`, `time_stamp`, `category`) VALUES
(1, 1, 'uploads/1615285879.jpg', '2021-03-09 10:31:19', 'Blogs'),
(30, 3, 'http://localhost/DuBuddy/staff/intern/uploads/1613378003.png', '2021-02-15 08:33:23', 'Blogs'),
(32, 1, 'http://localhost/DuBuddy/admin/uploads/1613379696.png', '2021-02-15 09:01:36', 'Blogs'),
(33, 1, 'http://localhost/voting/admin/uploads/1615287383.jpg', '2021-03-09 10:56:23', 'Blogs');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` bigint(20) NOT NULL,
  `heading` text DEFAULT NULL,
  `sub_heading` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `file_type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `heading`, `sub_heading`, `image`, `link`, `color`, `sort_order`, `file_type`) VALUES
(1, 'Slider test', 'voting Contestw', 'uploads/trim.1F76E2A0-3DB0-4683-B627-CFD9E06CD1BD.1617471462.mp4', 'view_blog', '#cd0a0a', 1, 'video/quicktime');

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
  `title` text DEFAULT NULL,
  `title_color` text DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `subtitle_color` text DEFAULT NULL,
  `header_image` text DEFAULT NULL,
  `body_title` text DEFAULT NULL,
  `body_title_color` text DEFAULT NULL,
  `body_subtitle` text DEFAULT NULL,
  `body_subtitle_color` text DEFAULT NULL,
  `btn_color` text DEFAULT NULL,
  `name_color` text DEFAULT NULL,
  `votes_color` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `index_changes`
--

INSERT INTO `index_changes` (`id`, `c_id`, `title`, `title_color`, `subtitle`, `subtitle_color`, `header_image`, `body_title`, `body_title_color`, `body_subtitle`, `body_subtitle_color`, `btn_color`, `name_color`, `votes_color`, `status`) VALUES
(1, 1, 'Main Title 222', '#10c668', 'Sub Title new new', '#ef0ba7', 'http://kodiblaze.com/voting/admin/uploads/headingImg1.1613795167.jpg', 'Voteeee!!', '#2b4e73', 'Hello  ', '#22ece2', '#952d2d', '#58ae1e', '#000000', 1),
(2, 2, 'VOTE FOR OUR NEWEST FLAVOUR!', 'black', 'Enter for a chance to win a year\'s supply of ice cream !', 'black', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', 'black', 'Calling all ice cream lovers! Here\'s your chance to pick the Icecream Shoppe\'s next feature flavour.Choose one of the options below\r\n                below to cast your vote - one lucky winner will recieve a year\'s supply of Icecream hoppe ice cream. You can vote once a day. \r\n                So don\'t forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', 'yellow', 'purple', 'pink', 1),
(3, 14, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#18c91d', '#133db9', '#c81414', 0),
(4, 15, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(5, 16, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(6, 17, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(7, 20, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(8, 22, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', 0),
(9, 23, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', NULL),
(10, 24, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', NULL),
(11, 25, 'VOTE FOR OUR NEWEST FLAVOUR!', '#5c0099', 'Enter for a chance to win a years supply of ice cream !', 'white', 'http://localhost/voting/admin/uploads/headingImg1.1613795167.jpg', 'CHOOSE YOUR FAVOURITE FLAVOUR !', '#a31aff', 'Calling all ice cream lovers! Heres your chance to pick the Icecream Shoppes next feature flavour.Choose one of the options below below to cast your vote - one lucky winner will recieve a years supply of Icecream hoppe ice cream. You can vote once a day. So dont forget to come back to this page and vote again to get more entries! GOOD LUCK!', 'black', '#ffd633', '#b84dff', '#ff66ff', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `id` bigint(50) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` bigint(20) NOT NULL,
  `com_id` bigint(20) DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `user` bigint(20) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `com_id`, `reply`, `user`, `time_stamp`) VALUES
(1, 1, 'Ya good laptop!', 2, '2021-05-12 17:23:44'),
(2, 1, 'Jon ask him to share the price', 22, '2021-05-12 18:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` bigint(50) NOT NULL,
  `name` text DEFAULT NULL,
  `song` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `song`, `status`) VALUES
(15, 'Popo ', '/uploads/Popoo.1617469107.WAV', 1),
(17, 'Style ', '/uploads/Style .1617470455.WAV', 1);

-- --------------------------------------------------------

--
-- Table structure for table `theme_color`
--

CREATE TABLE `theme_color` (
  `id` bigint(50) NOT NULL,
  `base_color` text NOT NULL,
  `head_text_color` text NOT NULL,
  `top_header_color` text NOT NULL,
  `title_first_color` text NOT NULL,
  `title_second_color` text NOT NULL,
  `bottom_header_color` text NOT NULL,
  `vg_bg_color` text NOT NULL,
  `c_bg_color` text NOT NULL,
  `c_button_color` text NOT NULL,
  `c_button_text_color` text NOT NULL,
  `f_bg_color` text NOT NULL,
  `icon_color` text NOT NULL,
  `icon_border_color` text NOT NULL,
  `icon_bg_color` text NOT NULL,
  `other_text_color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme_color`
--

INSERT INTO `theme_color` (`id`, `base_color`, `head_text_color`, `top_header_color`, `title_first_color`, `title_second_color`, `bottom_header_color`, `vg_bg_color`, `c_bg_color`, `c_button_color`, `c_button_text_color`, `f_bg_color`, `icon_color`, `icon_border_color`, `icon_bg_color`, `other_text_color`) VALUES
(1, '#294417', '#f9fcf8', '#131711', '#f87630', '#ff740a', '#062d15', '#2e2d2d', '#2e2d2d', '#fb8537', '#ffffff', '#141c12', '#fafafa', '#f2f3f3', '#0c0d0c', '#eaece4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(50) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `ip_address`, `status`) VALUES
(2, 'raashi', '', 'Mananryan1234@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '::1', 1),
(5, 'new', '', 'mm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '::1', 1),
(6, 'What do you want to learn?', '', 'Man1234@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '::1', 2),
(7, 'test', '', 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '::1', 1),
(8, 'raashi', '', 'rrras@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '::1', 1),
(9, 'Sumit Kumar', NULL, 'sk79875648@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '182.68.166.218', 1),
(10, 'Morgan Mangawe', NULL, 'babyfacemo3400@gmail.com', '2c9341ca4cf3d87b9e4eb905d6a3ec45', '108.251.27.199', 1),
(11, 'Najee', NULL, 'najeemilton@gmail.com', 'e81ebe352292d1d5b35286583974f12d', '166.137.143.17', 1),
(12, 'Shedrick Marks', NULL, 'shedrickmarks123@gmail.com', 'b40b8f862d816d65b4c1dcdaf6accfc1', '98.44.24.21', 1),
(13, 'raashi', NULL, 'p@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '132.154.237.64', 1),
(14, 'new', NULL, 'new@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '132.154.106.189', 1),
(15, 'Bwoods', NULL, 'brycewoodson18@gmail.com', '65b11ffdbfede1794f4279514765d772', '98.198.110.204', 1),
(16, 'Naba', NULL, 'nlang876@gmail.com', 'cc428d0f75d77d9b450fa0a166d712c2', '172.58.191.35', 1),
(17, 'Jon', NULL, 'jondlspam1@gmail.com', '25d55ad283aa400af464c76d713c07ad', '73.136.217.191', 1),
(18, 'James Lang', NULL, 'tlang@ccrhubzone.com', '990763ecfd715befad384c38731a3af6', '172.58.219.250', 1),
(19, 'ttest', NULL, 'ttest@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '139.167.204.122', 1),
(20, 'najee', NULL, 'kodiblazee@gmail.com', '42b3a434680c6ab19771582f6d1bfbf5', '2601:2c5:c700:2ed0:d54a:a439:2bc4:6a24', 1),
(21, 'tset', NULL, 'r@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '139.167.202.92', 1),
(22, 'Vansh Patpatia', NULL, 'vansh10patpatia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2401:4900:b0c:7de7:8d46:c313:b983:64eb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'Pancham Sheoran', 'panchamsheoran@gmail.com', '8109716921', '213', 'rwq'),
(2, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Turn Surf-Surf-Surf into Talk Talk Talk', 'Hello, my nameâ€™s Eric and I just ran across your website at kodiblaze.com...\r\n\r\nI found it after a quick search, so your SEOâ€™s working outâ€¦\r\n\r\nContent looks pretty goodâ€¦\r\n\r\nOne thingâ€™s missing thoughâ€¦\r\n\r\nA QUICK, EASY way to connect with you NOW.\r\n\r\nBecause studies show that a web lead like me will only hang out a few seconds â€“ 7 out of 10 disappear almost instantly, Surf Surf Surfâ€¦ then gone forever.\r\n\r\nI have the solution:\r\n\r\nTalk With Web Visitor is a software widget thatâ€™s works on your site, ready to capture any visitorâ€™s Name, Email address and Phone Number.  Youâ€™ll know immediately theyâ€™re interested and you can call them directly to TALK with them - literally while theyâ€™re still on the web looking at your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works and even give it a tryâ€¦ it could be huge for your business.\r\n\r\nPlus, now that youâ€™ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation prontoâ€¦ which is so powerful, because connecting with someone within the first 5 minutes is 100 times more effective than waiting 30 minutes or more later.\r\n\r\nThe new text messaging feature lets you follow up regularly with new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything Iâ€™ve just described is extremely simple to implement, cost-effective, and profitable.\r\n \r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business, potentially converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial â€“ and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right nowâ€¦ donâ€™t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=kodiblaze.com\r\n'),
(3, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website frst.group...\r\n\r\nIâ€™m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it â€“ itâ€™s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHereâ€™s a solution for youâ€¦\r\n\r\nTalk With Web Visitor is a software widget thatâ€™s works on your site, ready to capture any visitorâ€™s Name, Email address and Phone Number.  Youâ€™ll know immediately theyâ€™re interested and you can call them directly to talk with them literally while theyâ€™re still on the web looking at your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business â€“ and because youâ€™ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation â€“ immediatelyâ€¦ and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything Iâ€™ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial â€“ and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right nowâ€¦ donâ€™t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=frst.group\r\n'),
(4, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Cool website!', 'Cool website!\r\n\r\nMy nameâ€™s Eric, and I just found your site - kodiblaze.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what youâ€™re doing is pretty cool.\r\n \r\nBut if you donâ€™t mind me asking â€“ after someone like me stumbles across kodiblaze.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nIâ€™m guessing some, but I also bet youâ€™d like moreâ€¦ studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHereâ€™s a thought â€“ what if there was an easy way for every visitor to â€œraise their handâ€ to get a phone call from you INSTANTLYâ€¦ the second they hit your site and said, â€œcall me now.â€\r\n\r\nYou can â€“\r\n  \r\nTalk With Web Visitor is a software widget thatâ€™s works on your site, ready to capture any visitorâ€™s Name, Email address and Phone Number.  It lets you know IMMEDIATELY â€“ so that you can talk to that lead while theyâ€™re literally looking over your site.\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads â€“ the difference between contacting someone within 5 minutes versus 30 minutes later can be huge â€“ like 100 times better!\r\n\r\nThatâ€™s why we built out our new SMS Text With Lead featureâ€¦ because once youâ€™ve captured the visitorâ€™s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities â€“ even if you donâ€™t close a deal then and there, you can follow up with text messages for new offers, content links, even just â€œhow you doing?â€ notes to build a relationship.\r\n\r\nWouldnâ€™t that be cool?\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial â€“ and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right nowâ€¦ donâ€™t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=kodiblaze.com\r\n'),
(5, 'Ash', 'ash@techknowspace.com', '888-938-8893', '', 'Hello,\r\n\r\nMy Name is Ash and I Run Tech Know Space https://techknowspace.com We are your Premium GO-TO Service Centre for All Logic Board & Mainboard Repair\r\n\r\nWhen other shops say \"it can\'t be fixed\" WE CAN HELP!\r\n\r\nALL iPHONE 8 & NEWER\r\nBACK GLASS REPAIR - 1 HOUR\r\n\r\nDevices We Repair\r\nAudio Devices Audio Device Repair\r\n\r\nBluetooth Speakers - Headphones - iPod Touch\r\nComputers All Computer Repair\r\n\r\nAll Brands & Models - Custom Built - PC & Mac\r\nGame Consoles Game Console Repair\r\n\r\nPS4 - XBox One - Nintendo Switch\r\nLaptops All Laptop Repair\r\n\r\nAll Brands & Models - Acer, Asus, Compaq, Dell, HP, Lenovo, Toshiba\r\nMacBooks All MacBook Repair\r\n\r\nAll Series & Models - Air, Classic, Pro\r\nPhones All Phone Repair\r\n\r\nAll Brands & Models - BlackBerry, Huawei, iPhone, LG, OnePlus, Samsung, Sony\r\nSmart Watches Apple Watch Repair\r\n\r\nApple Watch - Samsung Gear - Moto 360\r\nTablets All Tablet Repair\r\n\r\nAll Brands & Models - iPad, Lenovo Yoga, Microsoft Surface, Samsung Tab\r\n\r\nDrone Repair\r\n\r\nCall us and tell us your issues today!\r\n\r\nToll Free: (888) 938-8893\r\nhttps://techknowspace.com\r\n\r\nAsh Mansukhani\r\nash@techknowspace.com\r\n<img src=\"https://yt3.ggpht.com/ytc/AAUvwnhUhkYdWNeEvgk0Kb1HPFRGjLlXdAKaAXUhwNjC=s900-c-k-c0x00ffffff-no-rj\" alt=\"Ash Mansukhani\" width=\"500\" height=\"600\"> \r\n'),
(6, 'Den', 'info@orderdomains.com', '+16898593423', 'ATTENTION', 'DOMAIN kodiblaze.com IMMEDIATE TERMINATION\r\nInvoice#: 576833\r\nDate: 2021-05-05\r\n\r\nINSTANT ATTENTION REQUIRED IN REGARDS TO YOUR DOMAIN kodiblaze.com\r\n\r\nYOUR DOMAIN kodiblaze.com WILL BE TERMINATED WITHIN 12 HOURS\r\n\r\nWe have not received your payment for the renewal of your domain kodiblaze.com\r\n\r\nWe have tried to reach you by phone several times, to inform you in regards of the TERMINATION of your domain kodiblaze.com\r\n\r\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://united-domains.ga/?n=kodiblaze.com&r=a&t=1620105345&p=v8\r\n\r\nIF WE DO NOT RECEIVE YOUR PAYMENT WITHIN 12 HOURS, YOUR DOMAIN kodiblaze.com WILL BE TERMINATED!\r\n\r\nCLICK HERE FOR SECURE ONLINE PAYMENT: https://united-domains.ga/?n=kodiblaze.com&r=a&t=1620105345&p=v8\r\n\r\nYOUR IMMEDIATE ATTENTION IS ABSOLUTELY NECESSARY IN ORDER TO KEEP YOUR DOMAIN kodiblaze.com\r\n\r\nThis important notification for kodiblaze.com will EXPIRE WITHIN 12 HOURS after you have received this email!'),
(7, 'Donaldflilt', 'no-replyEnduch@gmail.com', '83145136141', 'A new method of email distribution.', 'Good day!  kodiblaze.com \r\n \r\nDid you know that it is possible to send commercial offer entirely lawfully? \r\nWe providing a new method of sending proposal through feedback forms. Such forms are located on many sites. \r\nWhen such letters are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nalso, messages sent through feedback Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis message is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\n \r\nWe only use chat.'),
(8, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Turn Surf-Surf-Surf into Talk Talk Talk', 'Hello, my nameâ€™s Eric and I just ran across your website at kodiblaze.com...\r\n\r\nI found it after a quick search, so your SEOâ€™s working outâ€¦\r\n\r\nContent looks pretty goodâ€¦\r\n\r\nOne thingâ€™s missing thoughâ€¦\r\n\r\nA QUICK, EASY way to connect with you NOW.\r\n\r\nBecause studies show that a web lead like me will only hang out a few seconds â€“ 7 out of 10 disappear almost instantly, Surf Surf Surfâ€¦ then gone forever.\r\n\r\nI have the solution:\r\n\r\nTalk With Web Visitor is a software widget thatâ€™s works on your site, ready to capture any visitorâ€™s Name, Email address and Phone Number.  Youâ€™ll know immediately theyâ€™re interested and you can call them directly to TALK with them - literally while theyâ€™re still on the web looking at your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works and even give it a tryâ€¦ it could be huge for your business.\r\n\r\nPlus, now that youâ€™ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation prontoâ€¦ which is so powerful, because connecting with someone within the first 5 minutes is 100 times more effective than waiting 30 minutes or more later.\r\n\r\nThe new text messaging feature lets you follow up regularly with new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything Iâ€™ve just described is extremely simple to implement, cost-effective, and profitable.\r\n \r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business, potentially converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial â€“ and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right nowâ€¦ donâ€™t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=kodiblaze.com\r\n'),
(9, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website kodiblaze.com...\r\n\r\nIâ€™m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it â€“ itâ€™s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHereâ€™s a solution for youâ€¦\r\n\r\nTalk With Web Visitor is a software widget thatâ€™s works on your site, ready to capture any visitorâ€™s Name, Email address and Phone Number.  Youâ€™ll know immediately theyâ€™re interested and you can call them directly to talk with them literally while theyâ€™re still on the web looking at your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business â€“ and because youâ€™ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation â€“ immediatelyâ€¦ and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything Iâ€™ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial â€“ and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right nowâ€¦ donâ€™t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=kodiblaze.com\r\n'),
(10, 'Thomas', 'thomas.mooner@gmail.com', '0351 81 39 73', 'Freelancers, they are ready to work with you', 'Find your Freelancer professional, worth it to try, believe me!\r\nFreelancers with amazing ideas, perfect skills, outstanding knowledge, low cost, ready to start right now, here: https://bit.ly/3vKlcxo\r\n\r\nSincerely, Thomas'),
(11, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'how to turn eyeballs into phone calls', 'Hi, Eric here with a quick thought about your website kodiblaze.com...\r\n\r\nIâ€™m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it â€“ itâ€™s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHereâ€™s a solution for youâ€¦\r\n\r\nTalk With Web Visitor is a software widget thatâ€™s works on your site, ready to capture any visitorâ€™s Name, Email address and Phone Number.  Youâ€™ll know immediately theyâ€™re interested and you can call them directly to talk with them literally while theyâ€™re still on the web looking at your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business â€“ and because youâ€™ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation â€“ immediatelyâ€¦ and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything Iâ€™ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial â€“ and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right nowâ€¦ donâ€™t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=kodiblaze.com\r\n'),
(12, 'Mike Audley\r\n', 'see-email-in-message@monkeydigital.co', '84623293112', 'Increase Domain Strength for kodiblaze.com', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your kodiblaze.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your kodiblaze.com to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great feat. \r\n \r\nSee our offers here: \r\nhttps://www.monkeydigital.co/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.co/product/ahrefs-DR50-UR70/ \r\n \r\n \r\nthank you \r\nMike Audley\r\n \r\nsupport@monkeydigital.co');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(50) NOT NULL,
  `u_id` bigint(50) NOT NULL,
  `c_id` bigint(50) NOT NULL,
  `video` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `file_type` text DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `u_id`, `c_id`, `video`, `status`, `file_type`, `time_stamp`) VALUES
(75, 9, 16, 'uploads/trim.C617E2B5-D792-4543-B7B4-77BD350DD5D5.1615861314.1615972453.1617134892.mp4', 1, 'video/mp4', '2021-03-30 20:08:12'),
(76, 9, 16, 'uploads/trim.C617E2B5-D792-4543-B7B4-77BD350DD5D5.1615861314.1617172885.mp4', 1, 'video/quicktime', '2021-03-31 06:41:25'),
(77, 9, 16, 'uploads/trim.C617E2B5-D792-4543-B7B4-77BD350DD5D5.1615861314.1617172917.mp4', 1, 'video/quicktime', '2021-03-31 06:41:57'),
(78, 11, 20, 'uploads/63916497978__4CF2BC9C-EBC6-47AD-B290-A8E83D737C19.1617472193.mp4', 1, 'video/quicktime', '2021-04-03 17:49:53'),
(81, 14, 20, 'uploads/VID_63200605_102640_738.1617616152.mp4', 1, 'video/mp4', '2021-04-05 09:49:12'),
(82, 14, 20, 'uploads/VID_63210504_080903_591.1617616754.mp4', 1, 'video/mp4', '2021-04-05 09:59:14'),
(83, 13, 20, 'uploads/VID_78500917_052531_688.1617629408.mp4', 1, 'video/mp4', '2021-04-05 13:30:08'),
(84, 13, 20, 'uploads/VID_63270702_042855_340.1617629442.mp4', 1, 'video/mp4', '2021-04-05 13:30:42'),
(85, 13, 20, 'uploads/VID_78520412_114228_648.1617629480.mp4', 1, 'video/mp4', '2021-04-05 13:31:20'),
(86, 15, 20, 'uploads/trim.56C97E7D-D2FF-46B1-89F2-BD372DCE3F85.1617731356.mp4', 1, 'video/quicktime', '2021-04-06 17:49:16'),
(87, 16, 20, 'uploads/trim.3F316480-CA85-412D-9593-75C71A11C39E.1617733877.mp4', 1, 'video/quicktime', '2021-04-06 18:31:17'),
(88, 17, 20, NULL, 1, NULL, '2021-04-10 02:39:57'),
(90, 17, 17, 'uploads/64002952703__E120AA28-A128-433B-BCE6-7F0E4BB42826.1618336736.mp4', 1, 'video/quicktime', '2021-04-19 09:26:25'),
(91, 19, 16, 'uploads/VID_63371020_150206_987.1618825245.mp4', 1, 'video/mp4', '2021-04-19 09:40:45'),
(92, 20, 17, 'uploads/DEF64EFD-4B45-4CDD-9F7D-5D1574B81A37_2_0_a.1619756998.mp4', 1, 'video/quicktime', '2021-04-30 04:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` bigint(50) NOT NULL,
  `email` text DEFAULT NULL,
  `c_id` bigint(50) NOT NULL,
  `cu_id` bigint(50) NOT NULL,
  `ip_address` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `email`, `c_id`, `cu_id`, `ip_address`, `status`) VALUES
(1, '', 17, 1, '::1', 1),
(2, '', 19, 32, '::1', 1),
(3, '', 16, 36, '::1', 1),
(4, '', 16, 37, '::1', 1),
(5, '', 20, 38, '166.137.143.113', 1),
(6, '', 20, 37, '166.137.143.113', 1),
(7, '', 20, 40, '166.137.143.113', 1),
(8, '', 20, 40, '2600:387:1:803::a4', 1),
(9, '', 20, 38, '139.167.204.122', 1),
(10, '', 20, 43, '139.167.204.122', 1),
(11, '', 20, 42, '139.167.204.122', 1),
(12, '', 20, 40, '139.167.204.122', 1),
(15, '', 17, 43, '139.167.204.122', 1),
(16, '', 16, 44, '139.167.204.122', 1),
(17, '', 20, 40, '2600:387:1:803::71', 1),
(18, '', 20, 39, '2600:387:1:803::71', 1),
(19, '', 20, 41, '2600:387:1:803::71', 1),
(20, '', 17, 43, '139.167.168.134', 1),
(21, '', 20, 38, '139.167.168.134', 1),
(22, '', 20, 40, '2600:387:1:803::bf', 1),
(23, '', 20, 38, '2600:387:1:803::66', 1),
(24, '', 20, 41, '2600:1702:8f0:85c0::48', 1),
(25, '', 17, 45, '2601:2c5:c700:2ed0:61d1:4e11:e55c:a553', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_config`
--

CREATE TABLE `web_config` (
  `id` bigint(20) NOT NULL,
  `email` text DEFAULT NULL,
  `phn` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `feature_image` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `about_us` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `web_title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_config`
--

INSERT INTO `web_config` (`id`, `email`, `phn`, `address`, `location`, `logo`, `image`, `feature_image`, `message`, `about`, `about_us`, `facebook`, `instagram`, `twitter`, `web_title`) VALUES
(1, 'kodiblazee@gmail.com', '281690333fourrrrrr', '', 'mo city texas ', 'uploads/1619926159_ScreenShot2021-01-09at6.11.29PM.png', 'uploads/1619926193_tumblr_n8nofbqR3l1spn9cyo1_1280.jpeg', 'uploads/1619926209_tumblr_n8nofbqR3l1spn9cyo1_1280.jpeg', 'hello test', 'test', '', 'facebbook', 'instagram', 'twitter', 'KODI BLAZE');

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
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
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_color`
--
ALTER TABLE `theme_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contest_songs`
--
ALTER TABLE `contest_songs`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contest_users`
--
ALTER TABLE `contest_users`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `index_changes`
--
ALTER TABLE `index_changes`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `theme_color`
--
ALTER TABLE `theme_color`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `web_config`
--
ALTER TABLE `web_config`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `winner`
--
ALTER TABLE `winner`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
