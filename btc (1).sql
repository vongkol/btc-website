-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2018 at 08:25 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.1.19-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_emails`
--

CREATE TABLE `admin_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_emails`
--

INSERT INTO `admin_emails` (`id`, `email`) VALUES
(2, 'hengvongkol@vdoo.biz');

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `active` bit(1) NOT NULL DEFAULT b'1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `active`, `create_at`, `icon`) VALUES
(1, 'News', 0, b'1', '2018-02-16 14:54:52', NULL),
(10, 'National News', 1, b'1', '2018-05-27 13:42:02', NULL),
(11, 'Economics', 1, b'1', '2018-05-27 13:42:23', NULL),
(12, 'Sports', 1, b'1', '2018-05-27 13:42:30', NULL),
(13, 'Projects', 0, b'1', '2018-05-27 13:59:16', NULL),
(14, 'Test', 1, b'0', '2018-05-27 16:21:17', NULL),
(15, 'Test', 0, b'1', '2018-06-05 05:43:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_menus`
--

CREATE TABLE `main_menus` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `url` varchar(250) DEFAULT '#',
  `order_number` int(11) DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_menus`
--

INSERT INTO `main_menus` (`id`, `name`, `url`, `order_number`, `active`, `create_at`) VALUES
(1, 'Home', '/', 1, 1, '2018-06-25 05:50:54'),
(2, 'Plans', '/plan', 2, 1, '2018-06-25 05:51:04'),
(3, 'About Us', '/page/2', 3, 1, '2018-06-25 05:51:24'),
(4, 'Contact Us', '/page/1', 4, 1, '2018-06-25 05:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postal_code` varchar(30) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `refby` varchar(200) DEFAULT '0',
  `score` bigint(20) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recovery_mode` tinyint(4) DEFAULT '0',
  `verify` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `first_name`, `last_name`, `gender`, `email`, `country`, `city`, `postal_code`, `username`, `password`, `photo`, `refby`, `score`, `active`, `create_at`, `recovery_mode`, `verify`) VALUES
(1, 'HENG', 'Vongkol', 'Male', 'hengvongkol@gmail.com', 'Cambodia', 'Phnom Penh', '855', 'vongkol', '$2y$10$J15F1HHIXfQWDohvM5AxKu5M5HZVUgPKkmvNkU7Rfx2smpHzbCrZ2', NULL, NULL, 1000, 1, '2018-07-27 05:35:12', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `order_date` varchar(30) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_type` varchar(30) NOT NULL DEFAULT 'cash'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `plan_id`, `member_id`, `status`, `create_at`, `payment_type`) VALUES
(1, '2018-08-14', 3, 1, 1, '2018-08-14 10:58:38', 'crypto');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` longtext,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `url` varchar(200) NOT NULL DEFAULT '#',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `featured_image` varchar(200) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `active`, `url`, `create_at`, `featured_image`) VALUES
(1, 'Contact Us', '<p>contuct us description&nbsp;Bitcoin is the world&#39;s first cryptocurrency, a form of electronic cash. It is the first decentralized digital currency: the system works without a central bank or single administrator.</p>', 1, '/page/1', '2018-06-25 06:23:36', 'default.png'),
(2, 'About Us', '<p>About Us Description&nbsp;Bitcoin is the world&#39;s first cryptocurrency, a form of electronic cash. It is the first decentralized digital currency: the system works without a central bank or single administrator.</p>', 1, '/page/2', '2018-06-25 06:23:54', 'default.png'),
(3, 'Term & Condition', '<p>Term Description</p>', 1, '/page/3', '2018-06-25 06:24:17', 'default.png'),
(4, 'Privacy policy', '<p>Privacy policy description</p>', 1, '/page/4', '2018-06-25 06:24:41', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `request_date` varchar(30) NOT NULL,
  `score` bigint(20) NOT NULL,
  `amount` float DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `request_date`, `score`, `amount`, `status`, `create_at`, `member_id`) VALUES
(3, '2018-07-18', 500, 5, 1, '2018-07-18 14:31:54', 1),
(4, '2018-08-14', 3000, NULL, 1, '2018-08-14 12:51:58', 1),
(5, '2018-08-14', 1000, NULL, 1, '2018-08-14 12:54:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `bank` text NOT NULL,
  `crypto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `bank`, `crypto`) VALUES
(1, 'ABA: 000223945, Name: HENG Vongkol', '0xae0fa19d67eb858791874fa1fedb0c3a9c0f97bc9b218e9048316aaa9916c90d');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `list` tinyint(4) NOT NULL DEFAULT '0',
  `insert` tinyint(4) NOT NULL DEFAULT '0',
  `update` tinyint(4) NOT NULL DEFAULT '0',
  `delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `list`, `insert`, `update`, `delete`) VALUES
(2, 'Main Menu', 0, 0, 0, 0),
(3, 'Sub Menu', 0, 0, 0, 0),
(4, 'Slideshow', 0, 0, 0, 0),
(5, 'Page', 0, 0, 0, 0),
(6, 'Featured Work', 0, 0, 0, 0),
(7, 'Video', 0, 0, 0, 0),
(8, 'Current Project', 0, 0, 0, 0),
(9, 'Advertisement', 0, 0, 0, 0),
(10, 'Portfolio', 0, 0, 0, 0),
(11, 'Company Feature', 0, 0, 0, 0),
(13, 'Partner', 0, 0, 0, 0),
(14, 'File Manager', 0, 0, 0, 0),
(16, 'User', 0, 0, 0, 0),
(17, 'Role', 0, 0, 0, 0),
(18, 'Post Category', 0, 0, 0, 0),
(25, 'Permission', 0, 0, 0, 0),
(26, 'Social', 0, 0, 0, 0),
(27, 'Portfolio Category', 0, 0, 0, 0),
(28, 'Post', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `description` text,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `description`, `active`) VALUES
(1, 'Basic Plan', 100, '<p>Test</p>', 0),
(2, 'Second Plan', 200, '<p>Tes</p>', 1),
(3, 'Third Plan', 300, '<p>Hello World ....</p>', 1),
(4, 'Four Plan', 400, '<p>Test</p>\r\n\r\n<p>Tes</p>\r\n\r\n<p>test</p>', 1),
(5, 'Five Plan', 500, '<p>tset</p>\r\n\r\n<p>test</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `rate`) VALUES
(1, 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrator'),
(4, 'Data Entry'),
(5, 'Manager'),
(10, 'Viewer');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `list` int(11) NOT NULL DEFAULT '0',
  `insert` int(11) NOT NULL DEFAULT '0',
  `update` int(11) NOT NULL DEFAULT '0',
  `delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `list`, `insert`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 6, 1, 1, 1, 1),
(3, 1, 5, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 3, 1, 1, 1, 1),
(6, 1, 2, 1, 1, 1, 1),
(7, 4, 2, 1, 1, 1, 0),
(8, 4, 3, 1, 1, 1, 0),
(9, 4, 4, 1, 1, 1, 0),
(10, 4, 5, 1, 0, 0, 0),
(11, 4, 6, 1, 0, 0, 0),
(12, 5, 6, 1, 1, 1, 0),
(13, 4, 1, 1, 1, 1, 0),
(14, 1, 7, 1, 1, 1, 1),
(15, 1, 8, 1, 1, 1, 1),
(16, 1, 9, 1, 1, 1, 1),
(17, 1, 10, 1, 1, 1, 1),
(18, 1, 11, 1, 1, 1, 1),
(19, 1, 12, 1, 1, 1, 1),
(20, 1, 13, 1, 1, 1, 1),
(21, 1, 14, 1, 1, 1, 1),
(22, 1, 15, 1, 1, 1, 1),
(23, 1, 16, 1, 1, 1, 1),
(24, 1, 17, 1, 1, 1, 1),
(25, 1, 18, 1, 1, 1, 1),
(26, 1, 19, 1, 1, 1, 1),
(27, 1, 20, 1, 1, 1, 1),
(28, 1, 21, 1, 1, 1, 1),
(29, 1, 22, 1, 1, 1, 1),
(30, 1, 23, 1, 1, 1, 1),
(31, 1, 24, 1, 1, 1, 1),
(32, 1, 25, 1, 1, 1, 1),
(33, 4, 7, 1, 1, 1, 0),
(34, 4, 8, 1, 1, 1, 0),
(35, 4, 14, 1, 1, 1, 0),
(36, 4, 15, 1, 1, 1, 0),
(37, 5, 5, 1, 1, 1, 0),
(38, 5, 1, 1, 1, 1, 0),
(39, 5, 2, 1, 1, 1, 0),
(40, 5, 3, 1, 1, 1, 0),
(41, 5, 4, 1, 1, 1, 0),
(42, 5, 7, 1, 1, 1, 0),
(43, 5, 8, 1, 1, 1, 0),
(44, 5, 9, 1, 1, 1, 0),
(45, 5, 10, 1, 1, 1, 0),
(46, 5, 11, 1, 1, 1, 0),
(47, 5, 12, 1, 1, 1, 0),
(48, 5, 13, 1, 1, 1, 0),
(49, 5, 14, 1, 0, 0, 0),
(50, 5, 14, 1, 1, 1, 0),
(51, 5, 15, 1, 1, 1, 0),
(52, 4, 13, 1, 0, 0, 0),
(53, 4, 12, 1, 0, 0, 0),
(54, 4, 11, 1, 0, 0, 0),
(55, 4, 10, 1, 0, 0, 0),
(56, 4, 9, 1, 0, 0, 0),
(57, 10, 1, 1, 0, 0, 0),
(58, 10, 2, 1, 0, 0, 0),
(59, 10, 4, 1, 0, 0, 0),
(60, 10, 3, 1, 0, 0, 0),
(61, 10, 5, 1, 0, 0, 0),
(62, 10, 7, 1, 0, 0, 0),
(63, 10, 6, 1, 0, 0, 0),
(64, 10, 8, 1, 0, 0, 0),
(65, 10, 9, 1, 0, 0, 0),
(66, 10, 10, 1, 0, 0, 0),
(67, 10, 12, 1, 0, 0, 0),
(68, 10, 11, 1, 0, 0, 0),
(69, 10, 13, 1, 0, 0, 0),
(70, 10, 14, 1, 0, 0, 0),
(71, 10, 15, 1, 0, 0, 0),
(72, 10, 16, 1, 0, 0, 0),
(73, 10, 17, 1, 0, 0, 0),
(74, 10, 19, 1, 0, 0, 0),
(75, 10, 20, 1, 0, 0, 0),
(76, 10, 21, 1, 0, 0, 0),
(77, 10, 22, 1, 0, 0, 0),
(78, 10, 23, 1, 0, 0, 0),
(79, 10, 24, 1, 0, 0, 0),
(80, 10, 25, 1, 0, 0, 0),
(81, 1, 26, 1, 1, 1, 1),
(82, 1, 28, 1, 1, 1, 1),
(83, 1, 27, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `photo` varchar(80) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(4) DEFAULT '1',
  `order` tinyint(4) DEFAULT '0',
  `url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `photo`, `create_at`, `active`, `order`, `url`) VALUES
(1, 'Wedoo', 'ddd-min.png', '2018-02-11 03:14:45', 0, 0, NULL),
(2, 'Vdoo Solutions', 'hh.png', '2018-02-11 03:19:03', 0, 1, NULL),
(3, 'test', 'fish.jpg', '2018-02-11 03:19:24', 0, 0, NULL),
(4, 'Vdoo Solutions', 'dream_village_hd.jpg', '2018-02-11 03:36:38', 0, 0, NULL),
(5, 'Vdoo Solutions', 'post-4.png', '2018-02-11 15:37:03', 0, 0, NULL),
(6, 'EU Cycling tour', 'slide2.jpg', '2018-03-01 04:26:52', 0, 1, 'http://vdoo.biz/'),
(7, 'EU Cycling tour EU Cycling tour EU Cycling tour EU Cycling tour', 'slide1.jpg', '2018-03-01 04:27:04', 1, 2, '#'),
(8, 'EU Cycling tour', 'slide9-min.png', '2018-03-01 04:47:39', 0, 3, NULL),
(9, 'vichey', '4-min.png', '2018-03-13 16:46:01', 0, 0, '456789'),
(10, 'Hello', 'slide1.jpg', '2018-05-08 16:05:14', 1, 3, '#'),
(11, 'EU Cycling tourEU Cycling tourEU Cycling tourEU Cycling tourEU Cycling tourEU Cycling tour', '1-min.png', '2018-05-09 18:27:13', 0, 0, NULL),
(12, 'test', 'swDNLSxupk2p74uja.jpeg', '2018-05-19 12:20:59', 0, 1, 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(120) DEFAULT NULL,
  `icon` varchar(60) DEFAULT NULL,
  `order_number` int(11) DEFAULT '0',
  `active` tinyint(4) DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `url`, `icon`, `order_number`, `active`, `create_at`) VALUES
(1, 'Facebook', '#', 'tw.png', 2, 0, '2017-08-15 07:53:35'),
(2, 'Facebook', 'https://www.facebook.com/ecc007', 'fb.png', 1, 1, '2018-05-09 17:01:16'),
(3, 'Linkedin', 'https://www.facebook.com/', 'in.png', 3, 1, '2018-05-09 17:01:36'),
(4, 'Gmail', 'https://www.email.com/', 'tw.png', 4, 1, '2018-05-09 17:02:02'),
(5, 'Gmail', 'https://www.email.com/', 'g.png', 4, 1, '2018-06-25 08:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`, `language`, `role_id`) VALUES
(1, 'Heng Vongkol', 'admin@gmail.com', '$2y$10$YfZEjryxGfiH8aOrxX/0jOyHYry53o9uMbyrVos4I2gogKv2t1OHG', 'w0I51TqYvEL8fuTJnYtQGolDuGlo2U2IQpWhQbkyg4jn1YI3X8nQYPFkr5rj', '2017-05-27 22:35:52', '2017-05-27 22:35:52', '1 copy.jpg', 'en', 1),
(5, 'Writer', 'ranypa852@gmail.com', '$2y$10$7STuALxOE2qiIMCdviLfr.MeB8CR27FS6neE7XZnIkVt8gua6efiO', '1KLKr8wSH4vVdu6XRBx8snf5Yxn3TI04vvvKlhgvc20uXD4DrEG24Q7u8tWt', NULL, NULL, 'IMG_7478a copy.jpg', 'en', 4);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `url` varchar(225) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(225) NOT NULL,
  `poster_image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `url`, `active`, `create_at`, `title`, `poster_image`) VALUES
(1, '//www.youtube.com/embed/M-qYym-i1_8', 1, '2018-06-25 06:44:32', 'Bitcoin Training', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_emails`
--
ALTER TABLE `admin_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menus`
--
ALTER TABLE `main_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_emails`
--
ALTER TABLE `admin_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `main_menus`
--
ALTER TABLE `main_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
