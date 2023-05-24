-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: May 24, 2023 at 03:05 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ico`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `name`, `image`, `content`) VALUES
(1, 'User', 'avatar.png', 'Lorem ipsum dolor sit amet.'),
(2, 'User', 'avatar.png', 'Lorem ipsum dolor sit amet.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `story_id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` text NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `story_id`, `user_id`, `text`, `created`, `likes`) VALUES
(1, 5, 1, 'I see this arguing often appear and I think it is focussing on the wrong points. In every domain mentioned both Node and the competition have strong reasons of why to use and those reasons transform over time and expertise.\n\nI.e. take the performance argument: a common assumption is:\n\nGo > Java > Node > Python > Rails > PHP\n\nEven for computational programming is only true for very basic programs. You can implement logic in C and bind it to JavaScript which allows you to write very quick implementations in Node.js. Python, particularly with CPython can be incredibly fast and the performance of PHP strongly depends on the VM.', '2018-04-29 06:57:53', 0),
(23, 5, 1, 'This is just a test comment.', '2018-04-30 13:37:20', 0),
(22, 1, 1, 'This is great news!', '2018-04-30 08:47:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
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
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `goal` int NOT NULL,
  `funds_raised` int NOT NULL,
  `deadline` timestamp NOT NULL,
  `created` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `title`, `text`, `goal`, `funds_raised`, `deadline`, `created`) VALUES
(1, 'Preliminary', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, repellat.', 50000, 0, '2018-06-27 17:03:21', '2018-05-16 17:03:21'),
(2, 'Initial Launch', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, repellat.', 50000, 0, '2018-05-16 17:03:21', '2018-05-16 17:03:21'),
(3, 'Beta Launch', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, repellat.', 50000, 0, '2018-05-16 17:04:14', '2018-05-16 17:04:14'),
(4, 'Final', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, repellat.', 50000, 0, '2018-05-16 17:04:14', '2018-05-16 17:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int NOT NULL,
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` text NOT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `user_id`, `text`, `likes`, `created`) VALUES
(1, 1, 11, 'OMG YOU ARE THE STUPIDEST PERSON EVAH LIKE AHAUEAHAAHA LOL TROLLOLOLOL!!!!', 0, '2018-04-29 07:34:00'),
(2, 1, 1, 'Go troll on your own site, moron.', 32, '2018-04-29 08:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `lead_text` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `upvotes` int NOT NULL,
  `views` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `user_id`, `cover_image`, `title`, `lead_text`, `slug`, `text`, `created`, `upvotes`, `views`) VALUES
(1, 11, 'background.jpg', 'France: Crypto Is Now ‘Moveable Property’, Tax Down From 45 To 19 Percent', 'France: Crypto Is Now ‘Moveable Property’, Tax Down From 45 To 19 Percent', 'France-Crypto-Is-Now-Moveable-Property-Tax-Down-From-45-To-19-Percent', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque eligendi dolorem, iure ducimus quia consectetur deleniti odio dolorum doloribus velit quisquam natus! Adipisci cupiditate ratione enim a debitis, vero voluptas, blanditiis molestias ullam laborum quos minima quod commodi sed quia. Laboriosam impedit ex, inventore commodi magni, nobis voluptatum rem ullam velit quis aliquid exercitationem repudiandae iste minima, eius expedita qui saepe! Vitae laboriosam porro dolorem quod distinctio assumenda officia laudantium quo provident nobis accusantium praesentium, culpa consequuntur accusamus maxime hic cupiditate veritatis sint sequi, itaque, quaerat similique nesciunt deleniti. Animi, in? Eaque illo voluptatum soluta doloremque dolores nihil, impedit quibusdam.\n', '2018-04-27 16:41:08', 0, 1),
(2, 11, 'news1.jpg', 'Crypto Market In Green Following Correction, Bitcoin Above $9,000, EOS Gains Significantly', '', 'Crypto-Market-In-Green-Following-Correction-Bitcoin-Above-9-000-EOS-Gains-Significantly', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque eligendi dolorem, iure ducimus quia consectetur deleniti odio dolorum doloribus velit quisquam natus! Adipisci cupiditate ratione enim a debitis, vero voluptas, blanditiis molestias ullam laborum quos minima quod commodi sed quia. Laboriosam impedit ex, inventore commodi magni, nobis voluptatum rem ullam velit quis aliquid exercitationem repudiandae iste minima, eius expedita qui saepe! Vitae laboriosam porro dolorem quod distinctio assumenda officia laudantium quo provident nobis accusantium praesentium, culpa consequuntur accusamus maxime hic cupiditate veritatis sint sequi, itaque, quaerat similique nesciunt deleniti. Animi, in? Eaque illo voluptatum soluta doloremque dolores nihil, impedit quibusdam.\r\n', '2018-04-27 18:10:44', 0, 0),
(3, 11, 'news1.jpg', 'Crypto Market Hitting $40 Trln In 10 Years “Definitely Possible”, Says Pantera Capital CEO', '', 'Crypto-Market-Hitting-40-Trln-In-10-Years-Definitely-Possible-Says-Pantera-Capital-CEO', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque eligendi dolorem, iure ducimus quia consectetur deleniti odio dolorum doloribus velit quisquam natus! Adipisci cupiditate ratione enim a debitis, vero voluptas, blanditiis molestias ullam laborum quos minima quod commodi sed quia. Laboriosam impedit ex, inventore commodi magni, nobis voluptatum rem ullam velit quis aliquid exercitationem repudiandae iste minima, eius expedita qui saepe! Vitae laboriosam porro dolorem quod distinctio assumenda officia laudantium quo provident nobis accusantium praesentium, culpa consequuntur accusamus maxime hic cupiditate veritatis sint sequi, itaque, quaerat similique nesciunt deleniti. Animi, in? Eaque illo voluptatum soluta doloremque dolores nihil, impedit quibusdam.\r\n', '2018-04-27 18:10:44', 0, 1),
(4, 11, 'news1.jpg', '5 More Payments Firms to Adopt Ripple\'s xVia Tech', '', '5-More-Payments-Firms-to-Adopt-Ripple-s-xVia-Tech', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque eligendi dolorem, iure ducimus quia consectetur deleniti odio dolorum doloribus velit quisquam natus! Adipisci cupiditate ratione enim a debitis, vero voluptas, blanditiis molestias ullam laborum quos minima quod commodi sed quia. Laboriosam impedit ex, inventore commodi magni, nobis voluptatum rem ullam velit quis aliquid exercitationem repudiandae iste minima, eius expedita qui saepe! Vitae laboriosam porro dolorem quod distinctio assumenda officia laudantium quo provident nobis accusantium praesentium, culpa consequuntur accusamus maxime hic cupiditate veritatis sint sequi, itaque, quaerat similique nesciunt deleniti. Animi, in? Eaque illo voluptatum soluta doloremque dolores nihil, impedit quibusdam.\r\n', '2018-04-27 18:12:33', 0, 0),
(5, 1, 'congress.jpg', 'SEC Official Defends \'Balanced\' ICO Oversight in Congress', 'A U.S. Congressman called for a ban on initial coin offerings (ICOs) during a hearing on Thursday.', 'SEC-Official-Defends-Balanced-ICO-Oversight-in-Congress', 'The remarks from Rep. Brad Sherman (D-Calif.) came as William Hinman, the director of the Securities and Exchange Commission\'s Division of Corporation Finance, was speaking before the House Financial Services Committee\'s Capital Markets, Securities, and Investment Subcommittee. Hinman had told the committee that his division is \"striving for a balanced approach\" when it comes to cryptocurrencies and ICOs.\n\nYet Sherman argued against that line of thinking, asserting that token sales are detrimental to the economy.\n<br><br>\n\"The reason for securities markets is to provide jobs in the real economy,\" Sherman remarked. \"An IPO [initial public offering] does that, an ICO does the opposite. It takes money out of the real economy.\"\n\nWhen Hinman began to argue that the blockchain technology that underpins ICOs \"may have some promise,\" Sherman cut him off:\n\n\"I\'m not saying ban blockchain, I\'m saying ban the ICOs.\"\n<div class=\"quote\">\"I\'m not saying ban blockchain, I\'m saying ban the ICOs.\"</div>\n<br><br>\nHinman, in turn, pushed back by saying: \"Some folks are finding that the ICO instrument allows for a different type of enterprise, one that\'s more decentralized, and which they think has some value.\"\n\nDuring his opening remarks, Sherman struck a critical tone toward bitcoin in particular, remarking that \"bitcoin is a security in that it is an investment.\"\n\nIt\'s a notable comment, given that it\'s one that the SEC is unlikely to agree with - Hinman\'s boss, SEC chairman Jay Clayton, suggested in November that while ICO tokens likely qualify as securities, bitcoin does not.\n<br><br>\n\"When you depart from the bitcoin or the ethereum, and you get into the tokens, the hallmarks become pretty clear,\" Clayton told the Wall Street Journal.\n\nSpeaking to CoinDesk Friday, Digital Asset Research senior analyst and counsel Matt Gertler said bitcoin does not meet the Supreme Court\'s definition of a security.\n\n\"The first prong of the Howey Test is an investment of money,\" he said via email. \"Considering that all bitcoin was mined and not sold for money at issuance, it is unclear how bitcoin would satisfy the Howey Test.\"\n\n<br><br>\n<b>Not all negative</b>\n<br><br>\nThe reception to ICOs at the House subcommittee hearing wasn\'t entirely hostile, however. Rep. Tom Emmer (R-Minn.) criticized his colleagues\' \"ignorance about how special this area is.\"\n\nEmmer\'s enthusiasm for cryptocurrencies is not new - he told CoinDesk in March that the U.S. must avoid overregulating the sector.\n\nThe lawmaker asked Hinman at Friday\'s hearing if there were circumstances in which a token sale would be \"something other than a securities offering.\"\n\n\"It\'s quite hard to have an initial sale without having a securities offering,\" Hinman replied, \"which is why the chairman has noted that the initial sale of these may require compliance or exemptions.\"\n<br><br>\nEmmer then asked about utility tokens, which ICO proponents argue should not be regulated as securities because they are designed to facilitate the usage of a blockchain-based network, rather than act as investments.\n\n\"We certainly can imagine a token where the holder is buying it for its utility and not as an investment,\" Hinman responded.\n<div class=\"quote\">\"We certainly can imagine a token where the holder is buying it for its utility and not as an investment\"</div>\n<br><br>\nHinman went on to suggest that the SEC would take a token\'s circumstances into account, \"especially if it\'s a decentralized network.\"\n\n\"The issues around whether a particular coin offering may be a security are somewhat complex,\" Hinman told committee chairman Rep. Bill Huizenga (R-Mich.). He went on to say that his division\'s goal is to \"not stifle innovation.\"\n<br><br>\nCapitol image via Shutterstock\n<br><br>\nThis article has been updated for clarity.', '2018-04-27 18:13:18', 0, 197);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int NOT NULL,
  `hash` varchar(255) NOT NULL,
  `from_address` varchar(255) NOT NULL,
  `to_address` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `hash`, `from_address`, `to_address`, `amount`, `timestamp`) VALUES
(2, '0x6d495a5feb1701ec31ae5bf4498a78142a1179b5019a9d14b2ccd92a8821eb30', '0xe400e6c112f573db63f7897b9deaca5440361c8d', '0x545ddee7ceb4574f9b60780e921e28bef2dbdd2b', 0, '2018-05-06 16:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `wallet_address` varchar(255) NOT NULL,
  `bitcoin_address` varchar(255) DEFAULT NULL,
  `litecoin_address` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'default_user.png',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `country_id` int NOT NULL,
  `passkey` varchar(255) DEFAULT NULL,
  `timeout` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `wallet_address`, `bitcoin_address`, `litecoin_address`, `profile_image`, `created`, `country_id`, `passkey`, `timeout`) VALUES
(1, 'Kareem', 'Belgharbi', 'kareembelgharbi@gmail.com', '$2y$10$TrU8BtK2B3.i0nAtJPFXIOH.0PqAwEW7CWXTUHbJJ8sxWzg75cD/.', '0x2C29D880a0e6ED3D4DC1E03B9401617c2320B14D', '3CaZQLLVbi59TePYdpe8a6pUteZ8dayvRD', 'MFoctwT6CB2xh1zPAP48gaBjYryfKur3xv', 'merica.png', '2018-04-30 22:00:00', 196, 'd728578ea53cbf5edf7cc4c9649f1a7f8d99299c1ffc5ce2d7f235d43456eb85da412fbe86565721', '2018-06-09 19:43:40'),
(11, 'Ahmed', 'Baghrir', 'ahmedbaghrir@gmail.com', '$2y$10$oXcCe7FbmwRuI./BZMGOieKBn5I80kWBhtwYtNh0bWSjn5ee4TIhG', '0xea69757bee3c454AB364C41B26b4Bfe29fc94E89', NULL, NULL, 'default_user.png', '2018-04-30 22:00:00', 0, '', '2018-04-30 22:00:00'),
(12, 'Sadam', 'Mohammed', 'sadammohammed@gmail.com', '$2y$10$tgHfPfF6D6TEKWCTzStPpu/gsluxr5wGP7t0Y258F..z36foP7RFm', '0x2c29d880a0e6ed3d4dc1e03b9401617c2320b14d', '39imo3uA75Dq21JPnRNk51m59W32tZekLW', 'MN4MiQx7G2TWKPEgENGKfSvBoB1zjdY4QD', 'default_user.png', '2018-05-22 15:25:13', 15, NULL, NULL),
(14, 'Waseem', 'Mahmoud', 'waseem@gmail.com', '$2y$10$eiW.0nVhpgq9l7jP9C/vtea0vilngvpL1mYeofq1d8kMJQUh0oVoO', '0xea69757bee3c454AB364C41B26b4Bfe29fc94E89', '3PpeHArbEDsE4kXYVMFjteKVWHCXNmtN73', 'MAfhiPkVDgbJMbPtsXjXWn3qGRuZdvRZsi', 'default_user.png', '2018-06-08 19:28:21', 20, NULL, NULL),
(15, 'Kareem', 'Belgharbi', 'example@example.com', '$2y$10$D/xBqsQIkQYY38c9cBQQnuzfOswVYpBDC2wIhvI.hac6SaILMEVaK', '0x2C29D880a0e6ED3D4DC1E03B9401617c2320B14D', NULL, NULL, 'default_user.png', '2021-07-29 11:34:15', 16, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `story_id` (`story_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`user_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
