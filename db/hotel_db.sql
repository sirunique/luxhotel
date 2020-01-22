-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2019 at 09:03 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `name`, `gender`, `email`, `password`, `created`, `modified`) VALUES
(1, 'admin', 'Male', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tb`
--

CREATE TABLE `contact_tb` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_tb`
--

INSERT INTO `contact_tb` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Muritadoh Tunde', 'ola@gmail.com', 'sdmsds', 'sdysudtsyudtsutustudyst'),
(2, 'Muritadoh Tunde', 'ola@gmail.com', 'sdmsds', 'sdysudtsyudtsutustudyst');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tb`
--

CREATE TABLE `gallery_tb` (
  `id` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_tb`
--

INSERT INTO `gallery_tb` (`id`, `image`, `description`) VALUES
(1, 'img_bg_5.jpg', 'with newimage');

-- --------------------------------------------------------

--
-- Table structure for table `lodge_tb`
--

CREATE TABLE `lodge_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `room_id` int(100) NOT NULL,
  `check_in_date` varchar(100) NOT NULL,
  `check_out_date` varchar(100) NOT NULL,
  `check_in_time` varchar(100) NOT NULL,
  `check_out_time` varchar(100) NOT NULL,
  `payment_id` int(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `check_in_staff` varchar(100) NOT NULL,
  `check_out_staff` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodge_tb`
--

INSERT INTO `lodge_tb` (`id`, `name`, `phone`, `email`, `room_id`, `check_in_date`, `check_out_date`, `check_in_time`, `check_out_time`, `payment_id`, `amount`, `status`, `check_in_staff`, `check_out_staff`) VALUES
(1, 'Muritadoh Sodeeq', '08167676767', 'muritadohsodeeqtunde@gmail.com', 4, '2019-08-05', 'Pending', '18:56:58', 'Pending', 1, '68000', 'active', '1', 'Pending'),
(2, 'Temitope adeosun', '08169752668', 'ola@gmail.com', 4, '2019-08-05', 'Pending', '18:57:34', 'Pending', 2, '8000', 'active', '1', 'Pending'),
(3, 'Sulayman Abdul Maleek', '08169752668', 'trendynetworks@gmail.com', 5, '2019-08-05', 'Pending', '19:00:12', 'Pending', 3, '50000', 'active', '1', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_tb`
--

CREATE TABLE `newsletter_tb` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_tb`
--

INSERT INTO `newsletter_tb` (`id`, `email`) VALUES
(1, 'ola@gmail.com'),
(2, 'muritadohsodeeq97@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tb`
--

CREATE TABLE `payment_tb` (
  `id` int(100) NOT NULL,
  `ref_code` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `room_id` int(100) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_tb`
--

INSERT INTO `payment_tb` (`id`, `ref_code`, `date`, `time`, `amount`, `name`, `email`, `room_id`, `room_name`, `status`, `payment_type`) VALUES
(1, 'gzri4mnptu', '2019-08-05', '18:56:58', 68000, 'Muritadoh Sodeeq', 'muritadohsodeeqtunde@gmail.com', 4, '', 'success', 'Cash'),
(2, 'mzpe1yns73', '2019-08-05', '18:57:33', 8000, 'Temitope adeosun', 'ola@gmail.com', 4, '', 'success', 'Cash'),
(3, 'p8yl1nwru2', '2019-08-05', '19:00:12', 50000, 'Sulayman Abdul Maleek', 'trendynetworks@gmail.com', 5, '', 'success', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_tb`
--

CREATE TABLE `reserve_tb` (
  `id` int(100) NOT NULL,
  `room_id` int(100) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_price` varchar(100) NOT NULL,
  `check_in_date` varchar(100) NOT NULL,
  `check_out_date` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `adult` int(100) NOT NULL,
  `children` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve_tb`
--

INSERT INTO `reserve_tb` (`id`, `room_id`, `room_name`, `room_price`, `check_in_date`, `check_out_date`, `fullname`, `email`, `phone`, `adult`, `children`, `subtotal`, `status`) VALUES
(1, 3, 'Suite', '3000', '2019-08-06', '2019-08-22', 'Sulayman Abdul Maleek', 'ola@gmail.com', '2147483647', 1, 0, 48000, 'YES'),
(2, 4, 'Special', '4000', '2019-08-20', '2019-08-30', 'Olawale', 'ola@gmail.com', '08167676767', 1, 0, 40000, 'YES'),
(3, 5, 'Family Room', '5000', '2019-08-20', '2019-08-30', 'Sulayman Abdul Maleek', 'trendynetworks@gmail.com', '08169752668', 1, 0, 50000, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_tb`
--

CREATE TABLE `rooms_tb` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_room` int(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms_tb`
--

INSERT INTO `rooms_tb` (`id`, `name`, `description`, `duration`, `price`, `total_room`, `status`, `image`) VALUES
(1, 'Room Service Need Here', 'Need Room Here Service quidem recusandae sequi aut? Ratione, enim, consequatur!', 'per night', 1000, 2, 'Active', 'menu-9.jpg'),
(2, 'Presidential Villa', 'bnnbmnbmnbmnbmxzb,BdMBDMbdsaDUIYAuyQWPUIOWEYURYTILKN,M.LKLKZJXHSAJJADGNSBXABHSA', 'per night', 2000, 0, 'Active', 'amenities-2.jpg'),
(3, 'Suite', 'ahhhsbdbdbb', 'per night', 3000, 0, 'Active', 'room-2.jpg'),
(4, 'Special', 'ddbdddbbdbdvdv', 'per night', 4000, 0, 'Active', 'room-4.jpg'),
(5, 'Family Room', 'sddhsgdsgds', 'per night', 5000, 1, 'Active', 'room-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_tb`
--

CREATE TABLE `service_tb` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tb`
--

INSERT INTO `service_tb` (`id`, `name`, `description`, `image`) VALUES
(1, 'Room Service', 'Need Room Here Service quidem recusandae sequi aut? Ratione, enim, consequatur!', 'menu-9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials_tb`
--

CREATE TABLE `testimonials_tb` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials_tb`
--

INSERT INTO `testimonials_tb` (`id`, `name`, `description`, `image`) VALUES
(2, 'Brian Doe', 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.', 'person2.jpg'),
(3, 'Nathalie Miller', 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.', 'person1.jpg'),
(4, 'Shara Jones', 'Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.', 'person3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `test_rand`
--

CREATE TABLE `test_rand` (
  `id` int(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_rand`
--

INSERT INTO `test_rand` (`id`, `code`) VALUES
(1, 'cash_619619'),
(2, 'cash_563472'),
(3, 'cash_878729'),
(4, 'cash_911612'),
(5, 'cash_484192'),
(6, 'cash_441365'),
(7, 'cash_400359'),
(8, 'cash_718597'),
(9, 'cash_350307'),
(10, 'cash_776348'),
(11, 'cash_360203'),
(12, 'cash_631179'),
(13, 'cash_399610'),
(14, 'cash_705303'),
(15, 'cash_388655'),
(16, 'cash_580237'),
(17, 'cash_411343'),
(18, 'cash_548629'),
(19, 'cash_436261'),
(20, 'cash_857671'),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, ''),
(32, ''),
(33, ''),
(34, ''),
(35, ''),
(36, ''),
(37, ''),
(38, ''),
(39, ''),
(40, ''),
(41, ''),
(42, ''),
(43, ''),
(44, ''),
(45, ''),
(46, ''),
(47, ''),
(48, ''),
(49, ''),
(50, ''),
(51, ''),
(52, 'cash_647252'),
(53, 'cash_450331'),
(54, 'cash_594657'),
(55, 'cash_399500'),
(56, 'cash_471712'),
(57, 'cash_660224'),
(58, 'cash_701326'),
(59, 'cash_986459'),
(60, 'cash_863649'),
(61, 'cash_793230'),
(62, 'cash_604406'),
(63, 'cash_454783'),
(64, 'cash_363478'),
(65, 'cash_419421'),
(66, 'cash_541503'),
(67, 'cash_562705'),
(68, 'cash_662220'),
(69, 'cash_704674'),
(70, 'cash_889194'),
(71, 'cash_602642'),
(72, 'cash_380456'),
(73, 'cash_757326'),
(74, 'cash_349574'),
(75, 'cash_557428'),
(76, 'cash_389311'),
(77, 'cash_706404'),
(78, 'cash_625360'),
(79, 'cash_605635'),
(80, 'cash_605275'),
(81, 'cash_635606'),
(82, 'cash_914200'),
(83, 'cash_539759'),
(84, 'cash_977499'),
(85, 'cash_867345'),
(86, 'cash_810340'),
(87, 'cash_518601'),
(88, 'cash_758493'),
(89, 'cash_895653'),
(90, 'cash_753285'),
(91, 'cash_843217'),
(92, 'cash_533253'),
(93, 'cash_625207'),
(94, 'cash_600421'),
(95, 'cash_736777'),
(96, 'cash_867647'),
(97, 'cash_683339'),
(98, 'cash_921415'),
(99, 'cash_441457'),
(100, 'cash_485263'),
(101, 'cash_830308'),
(102, 'cash_736631'),
(103, 'cash_451668'),
(104, 'cash_440579'),
(105, 'cash_603283'),
(106, 'cash_480653'),
(107, 'cash_876758'),
(108, 'cash_621620'),
(109, 'cash_404289'),
(110, 'cash_676674'),
(111, 'cash_951420'),
(112, 'cash_513200'),
(113, 'cash_729541'),
(114, 'cash_942703'),
(115, 'cash_672221'),
(116, 'cash_941226'),
(117, 'cash_668391'),
(118, 'cash_410408'),
(119, 'cash_509219'),
(120, 'cash_541307'),
(121, 'cash_888365'),
(122, 'cash_793577'),
(123, 'cash_643605'),
(124, 'cash_735756'),
(125, 'cash_643591'),
(126, 'cash_740598'),
(127, 'cash_526620'),
(128, 'cash_712654'),
(129, 'cash_494460'),
(130, 'cash_373480'),
(131, 'cash_407198'),
(132, 'cash_586596'),
(133, 'cash_904351'),
(134, 'cash_351354'),
(135, 'cash_832210'),
(136, 'cash_966651'),
(137, 'cash_641317'),
(138, 'cash_647211'),
(139, 'cash_498781'),
(140, 'cash_857506'),
(141, 'cash_874651'),
(142, 'cash_883612'),
(143, 'cash_605620'),
(144, 'cash_588679'),
(145, 'cash_740632'),
(146, 'cash_538711'),
(147, 'cash_837360'),
(148, 'cash_958397'),
(149, 'cash_522716'),
(150, 'cash_425775'),
(151, 'cash_988526'),
(152, 'cash_865617'),
(153, 'cash_643299'),
(154, 'cash_698304'),
(155, 'cash_913688'),
(156, 'cash_846515'),
(157, 'cash_922658'),
(158, 'cash_745717'),
(159, 'cash_444535'),
(160, 'cash_706481'),
(161, 'cash_506278'),
(162, 'cash_502751'),
(163, 'cash_745617'),
(164, 'cash_774487'),
(165, 'cash_615761'),
(166, 'cash_554718'),
(167, 'cash_742626'),
(168, 'cash_969208'),
(169, 'cash_659605'),
(170, 'cash_960683'),
(171, 'cash_798444'),
(172, 'cash_603199'),
(173, 'cash_977683'),
(174, 'cash_367354'),
(175, 'cash_819190'),
(176, 'cash_389502'),
(177, ''),
(178, ''),
(179, ''),
(180, ''),
(181, ''),
(182, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_tb`
--
ALTER TABLE `contact_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_tb`
--
ALTER TABLE `gallery_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lodge_tb`
--
ALTER TABLE `lodge_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_tb`
--
ALTER TABLE `newsletter_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_tb`
--
ALTER TABLE `payment_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_tb`
--
ALTER TABLE `reserve_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_tb`
--
ALTER TABLE `rooms_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_tb`
--
ALTER TABLE `service_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials_tb`
--
ALTER TABLE `testimonials_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_rand`
--
ALTER TABLE `test_rand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_tb`
--
ALTER TABLE `contact_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_tb`
--
ALTER TABLE `gallery_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lodge_tb`
--
ALTER TABLE `lodge_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter_tb`
--
ALTER TABLE `newsletter_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_tb`
--
ALTER TABLE `payment_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reserve_tb`
--
ALTER TABLE `reserve_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms_tb`
--
ALTER TABLE `rooms_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_tb`
--
ALTER TABLE `service_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials_tb`
--
ALTER TABLE `testimonials_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_rand`
--
ALTER TABLE `test_rand`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
