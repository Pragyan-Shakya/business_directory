-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 12:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `next_noticebank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_google_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `industry_id` int(10) UNSIGNED NOT NULL,
  `moderator_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `municipal_id` int(11) NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_employees` int(11) DEFAULT NULL,
  `branches` int(11) DEFAULT NULL,
  `established_date` date DEFAULT NULL,
  `ownership` enum('Private','Public','Government','NGO','INGOS') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','Blocked') COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_company` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `industry_id`, `moderator_id`, `user_id`, `title`, `slug`, `email`, `seo`, `logo`, `cover_image`, `address`, `province_id`, `district_id`, `municipal_id`, `website`, `mobile`, `phone`, `fax`, `description`, `total_employees`, `branches`, `established_date`, `ownership`, `status`, `top_company`, `map`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 5, 'Test Company', 'test-company', 'test@test.com', 'Test Company', 'public/assets/uploads/logos/1575179192Baby.tux.sit-black-800x800.png', 'public/assets/uploads/cover_images/1575179192125770-garmin-01-1260x210 (1).jpg', 'test address', 3, 30, 335, 'https://test.com', '1234567', '0987654321', '1234567', '<p>qwertyuiop asdfghjkl; zxcvbnm, asdfghjk xcvbnm, ertyui dfghj bnm qw&nbsp; qweqwe</p>', 100, 2, '2019-12-02', 'Private', 'Active', 'Yes', NULL, '2019-12-01 05:46:32', '2020-02-20 10:19:35'),
(2, 1, NULL, 1, 'Notice Bank', 'notice-bank', 'noticebank@gmail.com', 'Notice Bank', 'public/assets/uploads/logos/1577685449Baby.tux.sit-black-800x800.png', 'public/assets/uploads/cover_images/1577685449company profile landing.PNG', 'Kathmandu', 3, 30, 335, 'https://noticebank.com', '1234567890', '1234567890', '1234567890', '<p>This is Notice Bank. A business directory website.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas suscipit turpis vitae lectus imperdiet, id molestie purus varius. Sed eleifend tellus id enim tempus, sit amet facilisis augue cursus. Vivamus viverra faucibus nibh, id iaculis quam. Maecenas dictum elementum dui, id tincidunt lorem lacinia at. Integer ac erat massa. Morbi eget feugiat orci, eu gravida nisl. Quisque at efficitur nisi, sit amet feugiat lacus. Aenean molestie lectus in tristique hendrerit. Praesent suscipit ante dolor, ornare viverra mi auctor ac. Nulla mattis egestas diam, non vehicula felis tempus nec. Curabitur fermentum metus quis ante mattis bibendum. Sed tempor faucibus lacus, a placerat risus faucibus bibendum. Donec et feugiat turpis. Sed non lacinia nisi, nec blandit magna. Sed eu lectus dui. Etiam eu scelerisque lectus, in fermentum sapien.</p>\r\n\r\n<p>Phasellus ligula risus, feugiat ac euismod sit amet, auctor quis nunc. Nullam egestas purus dui, eget malesuada felis lacinia eu. Nullam pretium magna id posuere volutpat. Proin sit amet volutpat sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas egestas auctor mi, nec vehicula sapien lobortis eu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam cursus nec nunc nec accumsan. Donec sodales leo ac ex euismod, sed pretium sem vehicula.</p>\r\n\r\n<p>Mauris id auctor lorem. Etiam lacinia nibh nec eros commodo tempor. Etiam ut semper mauris, a sodales arcu. Nulla lacinia purus et dui ullamcorper, et varius metus faucibus. Proin vitae sodales libero. Praesent pulvinar erat leo, non finibus tellus malesuada non. Praesent lorem erat, sollicitudin et pulvinar ut, tempor vel ex. Nullam quis massa nec lectus congue aliquet. Nulla rutrum, quam id venenatis rhoncus, arcu lorem porttitor tellus, id semper tortor libero sed est. Suspendisse scelerisque convallis aliquet. Aenean feugiat sem sit amet lacus fringilla, eget malesuada tellus feugiat. Maecenas quis sapien arcu.</p>\r\n\r\n<p>Morbi consectetur egestas magna. Pellentesque mattis eros ut sem blandit, maximus facilisis enim consequat. Sed varius feugiat magna, suscipit posuere ipsum varius eget. Praesent posuere iaculis est ultricies vehicula. Nulla eget leo auctor, hendrerit odio vel, commodo orci. Nulla id ex non tellus luctus elementum. Donec a bibendum magna, nec tincidunt augue.</p>', 100, 1, '2019-12-01', 'Private', 'Active', 'Yes', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.276891975016!2d85.29111309519689!3d27.709031933725658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1579239653448!5m2!1sen!2snp\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', '2019-12-30 05:57:30', '2020-02-25 10:07:33'),
(3, 2, NULL, NULL, 'New Company', 'new-company', 'company@gmai.com', 'New Company', 'public/assets/uploads/logos/1582435394fun-fruits.png', 'public/assets/uploads/cover_images/1582435394camera-xs.jpg', 'kathmandu', 6, 60, 619, NULL, '1234567890', '0987654321', '1234567', '<p>qwertyuiop[ asdfghjkl</p>', 10, 1, '2013-07-17', 'Private', 'Active', 'Yes', NULL, '2020-01-01 05:50:11', '2020-02-23 05:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` int(10) UNSIGNED NOT NULL,
  `configuration_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `configuration_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `configuration_key`, `configuration_value`, `created_at`, `updated_at`) VALUES
(20, 'site_title', 'NoticeBank', '2017-10-14 04:14:20', '2019-09-23 06:03:37'),
(21, 'site_description', 'NoticeBank, A business Directory.', '2017-10-14 04:14:21', '2019-12-08 06:12:12'),
(22, 'site_primary_email', 'info@noticebank.com', '2017-10-14 04:14:21', '2019-12-08 06:19:02'),
(23, 'site_secondary_email', 'noticebank@gmail.com', '2017-10-14 04:14:21', '2019-12-08 06:19:02'),
(24, 'site_primary_phone', '01234567', '2017-10-14 04:14:21', '2019-09-17 01:11:27'),
(25, 'site_secondary_phone', '9876543210', '2017-10-14 04:14:21', '2019-09-17 01:11:27'),
(26, 'site_address', 'Kathmandu, Nepal', '2017-10-14 04:14:21', '2019-09-17 01:11:27'),
(28, 'facebook_link', 'https://facebook.com', '2017-10-14 04:14:22', '2019-12-08 06:08:58'),
(29, 'twitter_link', 'https://twitter.com', '2017-10-14 04:14:22', '2019-12-08 06:08:58'),
(30, 'googleplus_link', 'https://google.com', '2017-10-14 04:14:22', '2019-12-08 06:08:58'),
(31, 'instagram_link', 'https://instagram.com', '2017-10-14 04:14:22', '2019-12-08 06:08:58'),
(32, 'linkedin_link', 'https://linkedin.com', '2017-10-14 04:14:22', '2019-12-08 06:08:58'),
(33, 'copyright', 'Copyright © 2019 NoticeBank. All Rights Reserved.', '2017-10-14 04:14:22', '2019-09-23 06:04:59'),
(34, 'keywords', 'notice bank, business directory, jobs, lost and found, services', '2017-10-14 04:14:23', '2019-12-08 06:34:23'),
(35, 'description', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, asasas', '2017-10-14 04:14:23', '2019-09-17 01:19:02'),
(36, 'who_we_are', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, asasas', '2017-10-19 04:19:22', '2019-02-28 22:53:55'),
(37, 'our_mission', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', '2017-10-19 04:19:22', '2019-09-23 06:04:27'),
(38, 'our_vision', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', '2017-10-19 04:19:22', '2019-09-23 06:04:28'),
(39, 'our_help', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', '2017-10-19 04:19:22', '2019-09-23 06:04:28'),
(40, 'our_support', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', '2017-10-19 04:19:22', '2019-09-23 06:04:28'),
(47, 'site_favicon', 'settings/Kne6VMhRxnFhTRjrdhUHfo0Rv3oz3jTR5HgzxDR6.png', '2017-11-28 08:14:40', '2019-09-23 06:03:39'),
(48, 'site_logo', 'public/assets/uploads/settings/1575784859Baby.tux.sit-black-800x800.png', '2017-11-28 08:18:18', '2019-12-08 06:00:59'),
(49, 'footer_logo', 'settings/m17ElAB9zFmpkIJOeUkm9SEYU0t7t8eMVSlT5jhw.png', '2017-11-28 08:34:56', '2019-09-23 06:04:59'),
(50, 'payments_logo', 'settings/Mkzwv57y9ACq2Tgc1cbgqGpQETGL3ttmmDSM2Fmi.png', '2017-11-28 08:39:42', '2017-12-15 07:45:00'),
(52, 'login-img', 'settings/HXfDPfhU2UWpk4cnmOTcSS8dkYgPOLJ9PssJu3W6.png', '2017-12-31 15:59:52', '2019-09-23 06:03:39'),
(54, 'company_name', 'NoticeBank', '2018-11-19 01:18:43', '2019-09-23 06:03:37'),
(55, 'google_map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.086068070068!2d85.33115821438402!3d27.68373463313754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19ff1a36dac7%3A0x7d6c6d5b99a402ec!2sNext%20Aussie%20Tech%20-%20Kathmandu!5e0!3m2!1sen!2snp!4v1576397410232!5m2!1sen!2snp\" width=\"100%\" height=\"400\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, '2019-12-15 08:14:49'),
(56, 'listing_categories', '[\"1\",\"3\",\"5\",\"8\",\"50\"]', '2020-02-27 06:37:51', '2020-02-27 08:15:21'),
(57, 'front_banner', 'public/assets/uploads/settings/1583309098architecture-buildings-church-338515.jpg', '2020-03-04 08:04:58', '2020-03-04 08:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_companies`
--

CREATE TABLE `contact_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_companies`
--

INSERT INTO `contact_companies` (`id`, `company_id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(9, 2, 'Pragyan Shakya', 'pragyan7shakya@gmail.com', 'test message', 'Active', '2020-01-17 06:59:26', '2020-01-17 06:59:26'),
(10, 2, 'Pragyan', 'pragyan7shakya@gmail.com', 'test message', 'Active', '2020-01-23 05:45:54', '2020-01-23 05:45:54'),
(11, 2, 'Pragyan', 'pragyan7shakya@gmail.com', 'test message', 'Active', '2020-01-23 05:46:30', '2020-01-23 05:46:30'),
(12, 2, 'test user', 'tst@test.com', 'qwertyui', 'Active', '2020-01-23 05:49:16', '2020-01-23 05:49:16'),
(13, 2, 'test123', 'tesa123@asd.com', 'asfdcgx zsrfgv asdfzxgf', 'Active', '2020-01-23 05:51:00', '2020-01-23 05:51:00'),
(14, 2, 'qwertyui', 'asdfc@awds.sdf', 'qwerty', 'Active', '2020-01-23 05:58:09', '2020-01-23 05:58:09'),
(16, 2, 'Pragyan Shakya', 'pragyan7shakya@gmail.com', 'This is a test for anydesk screen sharing', 'Active', '2020-02-25 09:33:34', '2020-02-25 09:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', NULL, NULL),
(2, 'Albania', NULL, NULL),
(3, 'Algeria', NULL, NULL),
(4, 'American Samoa', NULL, NULL),
(5, 'Andorra', NULL, NULL),
(6, 'Angola', NULL, NULL),
(7, 'Anguilla', NULL, NULL),
(8, 'Antarctica', NULL, NULL),
(9, 'Antigua and Barbuda', NULL, NULL),
(10, 'Argentina', NULL, NULL),
(11, 'Armenia', NULL, NULL),
(12, 'Aruba', NULL, NULL),
(13, 'Australia', NULL, NULL),
(14, 'Austria', NULL, NULL),
(15, 'Azerbaijan', NULL, NULL),
(16, 'Bahamas', NULL, NULL),
(17, 'Bahrain', NULL, NULL),
(18, 'Bangladesh', NULL, NULL),
(19, 'Barbados', NULL, NULL),
(20, 'Belarus', NULL, NULL),
(21, 'Belgium', NULL, NULL),
(22, 'Belize', NULL, NULL),
(23, 'Benin', NULL, NULL),
(24, 'Bermuda', NULL, NULL),
(25, 'Bhutan', NULL, NULL),
(26, 'Bolivia', NULL, NULL),
(27, 'Bosnia and Herzegowina', NULL, NULL),
(28, 'Botswana', NULL, NULL),
(29, 'Bouvet Island', NULL, NULL),
(30, 'Brazil', NULL, NULL),
(31, 'British Indian Ocean Territory', NULL, NULL),
(32, 'Brunei Darussalam', NULL, NULL),
(33, 'Bulgaria', NULL, NULL),
(34, 'Burkina Faso', NULL, NULL),
(35, 'Burundi', NULL, NULL),
(36, 'Cambodia', NULL, NULL),
(37, 'Cameroon', NULL, NULL),
(38, 'Canada', NULL, NULL),
(39, 'Cape Verde', NULL, NULL),
(40, 'Cayman Islands', NULL, NULL),
(41, 'Central African Republic', NULL, NULL),
(42, 'Chad', NULL, NULL),
(43, 'Chile', NULL, NULL),
(44, 'China', NULL, NULL),
(45, 'Christmas Island', NULL, NULL),
(46, 'Cocos (Keeling) Islands', NULL, NULL),
(47, 'Colombia', NULL, NULL),
(48, 'Comoros', NULL, NULL),
(49, 'Congo', NULL, NULL),
(50, 'Cook Islands', NULL, NULL),
(51, 'Costa Rica', NULL, NULL),
(52, 'Cote D\\Ivoire', NULL, NULL),
(53, 'Croatia', NULL, NULL),
(54, 'Cuba', NULL, NULL),
(55, 'Cyprus', NULL, NULL),
(56, 'Czech Republic', NULL, NULL),
(57, 'Denmark', NULL, NULL),
(58, 'Djibouti', NULL, NULL),
(59, 'Dominica', NULL, NULL),
(60, 'Dominican Republic', NULL, NULL),
(61, 'East Timor', NULL, NULL),
(62, 'Ecuador', NULL, NULL),
(63, 'Egypt', NULL, NULL),
(64, 'El Salvador', NULL, NULL),
(65, 'Equatorial Guinea', NULL, NULL),
(66, 'Eritrea', NULL, NULL),
(67, 'Estonia', NULL, NULL),
(68, 'Ethiopia', NULL, NULL),
(69, 'Falkland Islands (Malvinas)', NULL, NULL),
(70, 'Faroe Islands', NULL, NULL),
(71, 'Fiji', NULL, NULL),
(72, 'Finland', NULL, NULL),
(73, 'France', NULL, NULL),
(74, 'France', NULL, NULL),
(75, 'French Guiana', NULL, NULL),
(76, 'French Polynesia', NULL, NULL),
(77, 'French Southern Territories', NULL, NULL),
(78, 'Gabon', NULL, NULL),
(79, 'Gambia', NULL, NULL),
(80, 'Georgia', NULL, NULL),
(81, 'Germany', NULL, NULL),
(82, 'Ghana', NULL, NULL),
(83, 'Gibraltar', NULL, NULL),
(84, 'Greece', NULL, NULL),
(85, 'Greenland', NULL, NULL),
(86, 'Grenada', NULL, NULL),
(87, 'Guadeloupe', NULL, NULL),
(88, 'Guam', NULL, NULL),
(89, 'Guatemala', NULL, NULL),
(90, 'Guinea', NULL, NULL),
(91, 'Guinea-bissau', NULL, NULL),
(92, 'Guyana', NULL, NULL),
(93, 'Haiti', NULL, NULL),
(94, 'Heard and Mc Donald Islands', NULL, NULL),
(95, 'Honduras', NULL, NULL),
(96, 'Hong Kong', NULL, NULL),
(97, 'Hungary', NULL, NULL),
(98, 'Iceland', NULL, NULL),
(99, 'India', NULL, NULL),
(100, 'Indonesia', NULL, NULL),
(101, 'Iran (Islamic Republic of)', NULL, NULL),
(102, 'Iraq', NULL, NULL),
(103, 'Ireland', NULL, NULL),
(104, 'Israel', NULL, NULL),
(105, 'Italy', NULL, NULL),
(106, 'Jamaica', NULL, NULL),
(107, 'Japan', NULL, NULL),
(108, 'Jordan', NULL, NULL),
(109, 'Kazakhstan', NULL, NULL),
(110, 'Kenya', NULL, NULL),
(111, 'Kiribati', NULL, NULL),
(112, 'North Korea', NULL, NULL),
(113, 'Korea', NULL, NULL),
(114, 'Kuwait', NULL, NULL),
(115, 'Kyrgyzstan', NULL, NULL),
(116, 'Lao People\\s Democratic Republic', NULL, NULL),
(117, 'Latvia', NULL, NULL),
(118, 'Lebanon', NULL, NULL),
(119, 'Lesotho', NULL, NULL),
(120, 'Liberia', NULL, NULL),
(121, 'Libyan Arab Jamahiriya', NULL, NULL),
(122, 'Liechtenstein', NULL, NULL),
(123, 'Lithuania', NULL, NULL),
(124, 'Luxembourg', NULL, NULL),
(125, 'Macau', NULL, NULL),
(126, 'Macedonia', NULL, NULL),
(127, 'Madagascar', NULL, NULL),
(128, 'Malawi', NULL, NULL),
(129, 'Malaysia', NULL, NULL),
(130, 'Maldives', NULL, NULL),
(131, 'Mali', NULL, NULL),
(132, 'Malta', NULL, NULL),
(133, 'Marshall Islands', NULL, NULL),
(134, 'Martinique', NULL, NULL),
(135, 'Mauritania', NULL, NULL),
(136, 'Mauritius', NULL, NULL),
(137, 'Mayotte', NULL, NULL),
(138, 'Mexico', NULL, NULL),
(139, 'Micronesia', NULL, NULL),
(140, 'Moldova', NULL, NULL),
(141, 'Monaco', NULL, NULL),
(142, 'Mongolia', NULL, NULL),
(143, 'Montserrat', NULL, NULL),
(144, 'Morocco', NULL, NULL),
(145, 'Mozambique', NULL, NULL),
(146, 'Myanmar', NULL, NULL),
(147, 'Namibia', NULL, NULL),
(148, 'Nauru', NULL, NULL),
(149, 'Nepal', NULL, NULL),
(150, 'Netherlands', NULL, NULL),
(151, 'Netherlands Antilles', NULL, NULL),
(152, 'New Caledonia', NULL, NULL),
(153, 'New Zealand', NULL, NULL),
(154, 'Nicaragua', NULL, NULL),
(155, 'Niger', NULL, NULL),
(156, 'Nigeria', NULL, NULL),
(157, 'Niue', NULL, NULL),
(158, 'Norfolk Island', NULL, NULL),
(159, 'Northern Mariana Islands', NULL, NULL),
(160, 'Norway', NULL, NULL),
(161, 'Oman', NULL, NULL),
(162, 'Pakistan', NULL, NULL),
(163, 'Palau', NULL, NULL),
(164, 'Panama', NULL, NULL),
(165, 'Papua New Guinea', NULL, NULL),
(166, 'Paraguay', NULL, NULL),
(167, 'Peru', NULL, NULL),
(168, 'Philippines', NULL, NULL),
(169, 'Pitcairn', NULL, NULL),
(170, 'Poland', NULL, NULL),
(171, 'Portugal', NULL, NULL),
(172, 'Puerto Rico', NULL, NULL),
(173, 'Qatar', NULL, NULL),
(174, 'Reunion', NULL, NULL),
(175, 'Romania', NULL, NULL),
(176, 'Russian Federation', NULL, NULL),
(177, 'Rwanda', NULL, NULL),
(178, 'Saint Kitts and Nevis', NULL, NULL),
(179, 'Saint Lucia', NULL, NULL),
(180, 'Saint Vincent and the Grenadines', NULL, NULL),
(181, 'Samoa', NULL, NULL),
(182, 'San Marino', NULL, NULL),
(183, 'Sao Tome and Principe', NULL, NULL),
(184, 'Saudi Arabia', NULL, NULL),
(185, 'Senegal', NULL, NULL),
(186, 'Seychelles', NULL, NULL),
(187, 'Sierra Leone', NULL, NULL),
(188, 'Singapore', NULL, NULL),
(189, 'Slovak Republic', NULL, NULL),
(190, 'Slovenia', NULL, NULL),
(191, 'Solomon Islands', NULL, NULL),
(192, 'Somalia', NULL, NULL),
(193, 'South Africa', NULL, NULL),
(194, 'South Georgia &amp; South Sandwich Islands', NULL, NULL),
(195, 'Spain', NULL, NULL),
(196, 'Sri Lanka', NULL, NULL),
(197, 'St. Helena', NULL, NULL),
(198, 'St. Pierre and Miquelon', NULL, NULL),
(199, 'Sudan', NULL, NULL),
(200, 'Suriname', NULL, NULL),
(201, 'Svalbard and Jan Mayen Islands', NULL, NULL),
(202, 'Swaziland', NULL, NULL),
(203, 'Sweden', NULL, NULL),
(204, 'Switzerland', NULL, NULL),
(205, 'Syrian Arab Republic', NULL, NULL),
(206, 'Taiwan', NULL, NULL),
(207, 'Tajikistan', NULL, NULL),
(208, 'Tanzania', NULL, NULL),
(209, 'Thailand', NULL, NULL),
(210, 'Togo', NULL, NULL),
(211, 'Tokelau', NULL, NULL),
(212, 'Tonga', NULL, NULL),
(213, 'Trinidad and Tobago', NULL, NULL),
(214, 'Tunisia', NULL, NULL),
(215, 'Turkey', NULL, NULL),
(216, 'Turkmenistan', NULL, NULL),
(217, 'Turks and Caicos Islands', NULL, NULL),
(218, 'Tuvalu', NULL, NULL),
(219, 'Uganda', NULL, NULL),
(220, 'Ukraine', NULL, NULL),
(221, 'United Arab Emirates', NULL, NULL),
(222, 'United Kingdom', NULL, NULL),
(223, 'United States', NULL, NULL),
(224, 'United States Minor Outlying Islands', NULL, NULL),
(225, 'Uruguay', NULL, NULL),
(226, 'Uzbekistan', NULL, NULL),
(227, 'Vanuatu', NULL, NULL),
(228, 'Vatican City State (Holy See)', NULL, NULL),
(229, 'Venezuela', NULL, NULL),
(230, 'Viet Nam', NULL, NULL),
(231, 'Virgin Islands (British)', NULL, NULL),
(232, 'Virgin Islands (U.S.)', NULL, NULL),
(233, 'Wallis and Futuna Islands', NULL, NULL),
(234, 'Western Sahara', NULL, NULL),
(235, 'Yemen', NULL, NULL),
(236, 'Yugoslavia', NULL, NULL),
(237, 'Democratic Republic of Congo', NULL, NULL),
(238, 'Zambia', NULL, NULL),
(239, 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `district_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Taplejung', NULL, '2019-01-06 05:26:42', '2019-01-06 05:26:42'),
(2, 1, 'Panchthar', NULL, '2019-01-06 05:38:21', '2019-01-06 05:38:21'),
(3, 1, 'Ilam', NULL, '2019-01-06 05:38:38', '2019-01-06 05:38:38'),
(4, 1, 'Jhapa', NULL, '2019-01-06 05:38:52', '2019-01-06 05:38:52'),
(5, 1, 'Morang', NULL, '2019-01-06 05:39:03', '2019-01-06 05:39:03'),
(6, 1, 'Sunasari', NULL, '2019-01-06 05:39:22', '2019-01-06 05:39:22'),
(7, 1, 'Dhankuta', NULL, '2019-01-06 05:39:40', '2019-01-06 05:39:40'),
(8, 1, 'Terhathum', NULL, '2019-01-06 05:39:54', '2019-01-06 05:39:54'),
(9, 1, 'Sankhusabha', NULL, '2019-01-06 05:40:14', '2019-01-06 05:40:14'),
(10, 1, 'Bhojpur', NULL, '2019-01-06 05:40:27', '2019-01-06 05:40:27'),
(11, 1, 'Solukhumbu', NULL, '2019-01-06 05:41:26', '2019-01-06 05:41:26'),
(12, 1, 'Okhaldunga', NULL, '2019-01-06 05:41:49', '2019-01-06 05:41:49'),
(13, 1, 'Khotang', NULL, '2019-01-06 05:42:04', '2019-01-06 05:42:04'),
(14, 1, 'Udayapur', NULL, '2019-01-06 05:42:23', '2019-01-06 05:42:23'),
(15, 2, 'Saptari', NULL, '2019-01-06 05:43:50', '2019-01-06 05:43:50'),
(16, 2, 'Siraha', NULL, '2019-01-06 05:44:16', '2019-01-06 05:44:16'),
(17, 2, 'Dhanusha', NULL, '2019-01-06 05:44:49', '2019-01-06 05:44:49'),
(18, 2, 'Mahottari', NULL, '2019-01-06 05:45:17', '2019-01-06 05:45:17'),
(19, 2, 'Sarlahi', NULL, '2019-01-06 05:45:58', '2019-01-06 05:45:58'),
(20, 2, 'Rautahat', NULL, '2019-01-06 05:46:20', '2019-01-06 05:46:20'),
(21, 2, 'Bara', NULL, '2019-01-06 05:46:37', '2019-01-06 05:46:37'),
(22, 2, 'Parsa', NULL, '2019-01-06 05:47:15', '2019-01-06 05:47:15'),
(23, 3, 'Sindhuli', NULL, '2019-01-06 05:47:52', '2019-01-06 05:47:52'),
(24, 3, 'Ramechhap', NULL, '2019-01-06 05:48:30', '2019-01-06 05:48:30'),
(25, 3, 'Dolakha', NULL, '2019-01-06 05:48:51', '2019-01-06 05:48:51'),
(26, 3, 'Sindhupalchowk', NULL, '2019-01-06 05:49:09', '2019-01-06 05:49:09'),
(27, 3, 'Kavrepalanchok', NULL, '2019-01-06 05:49:29', '2019-01-06 05:49:29'),
(28, 3, 'Lalitpur', NULL, '2019-01-06 05:49:52', '2019-01-06 05:49:52'),
(29, 3, 'Bhaktapur', NULL, '2019-01-06 05:50:08', '2019-01-06 05:50:08'),
(30, 3, 'Kathmandu', 'public/assets/uploads/destinations/1583053923ancient-architect-architecture-2104882 (1).jpg', '2019-01-06 05:51:04', '2020-03-01 09:12:03'),
(31, 3, 'Nuwakot', NULL, '2019-01-06 05:51:20', '2019-01-06 05:51:20'),
(32, 3, 'Rasuwa', NULL, '2019-01-06 05:51:51', '2019-01-06 05:51:51'),
(33, 3, 'Dhading', NULL, '2019-01-06 05:52:24', '2019-01-06 05:52:24'),
(34, 3, 'Makawanpur', NULL, '2019-01-06 05:52:45', '2019-01-06 05:52:45'),
(35, 3, 'Chitwan', NULL, '2019-01-06 05:53:04', '2019-01-06 05:53:04'),
(36, 4, 'Gorkha', NULL, '2019-01-06 05:53:46', '2019-01-06 05:53:46'),
(37, 4, 'Lamjung', NULL, '2019-01-06 05:54:01', '2019-01-06 05:54:01'),
(38, 4, 'Tanahun', NULL, '2019-01-06 05:55:31', '2019-01-06 05:55:31'),
(39, 4, 'Syangja', NULL, '2019-01-06 05:55:50', '2019-01-06 05:55:50'),
(40, 4, 'Kaski', NULL, '2019-01-06 05:56:07', '2019-01-06 05:56:07'),
(41, 4, 'Manang', NULL, '2019-01-06 05:56:29', '2019-01-06 05:56:29'),
(42, 4, 'Mustang', NULL, '2019-01-06 05:58:08', '2019-01-06 05:58:08'),
(43, 4, 'Myagdi', NULL, '2019-01-06 05:58:49', '2019-01-06 05:58:49'),
(44, 4, 'Parbat', NULL, '2019-01-06 05:59:08', '2019-01-06 05:59:08'),
(45, 4, 'Baglung', NULL, '2019-01-06 05:59:26', '2019-01-06 05:59:26'),
(46, 4, 'Nawalparasi', NULL, '2019-01-06 06:00:42', '2019-01-06 06:00:42'),
(47, 5, 'Gulmi', NULL, '2019-01-06 06:01:04', '2019-01-06 06:01:04'),
(48, 5, 'Palpa', NULL, '2019-01-06 06:01:29', '2019-01-06 06:01:29'),
(49, 5, 'Rupandehi', NULL, '2019-01-06 06:01:50', '2019-01-06 06:01:50'),
(50, 5, 'Kapilbastu', NULL, '2019-01-06 06:02:34', '2019-01-06 06:02:34'),
(51, 5, 'Arghakhanchi', NULL, '2019-01-06 06:02:49', '2019-01-06 06:02:49'),
(52, 5, 'Pyuthan', NULL, '2019-01-06 06:03:13', '2019-01-06 06:03:13'),
(53, 5, 'Rolpa', NULL, '2019-01-06 06:03:27', '2019-01-06 06:03:27'),
(54, 5, 'Eastern Rukum District', NULL, '2019-01-06 06:03:48', '2019-01-06 06:03:48'),
(55, 5, 'Dang', NULL, '2019-01-06 06:04:05', '2019-01-06 06:04:05'),
(56, 5, 'Banke', NULL, '2019-01-06 06:04:21', '2019-01-06 06:04:21'),
(57, 5, 'Bardiya', NULL, '2019-01-06 06:04:43', '2019-01-06 06:04:43'),
(58, 6, 'Salyan', NULL, '2019-01-06 06:05:06', '2019-01-06 06:05:06'),
(59, 6, 'Surkhet', NULL, '2019-01-06 06:05:25', '2019-01-06 06:05:25'),
(60, 6, 'Dailekh', 'public/assets/uploads/destinations/1583053947asia-china-himalayas-1531660.jpg', '2019-01-06 06:05:44', '2020-03-01 09:12:27'),
(61, 6, 'Jajarkot', NULL, '2019-01-06 06:06:02', '2019-01-06 06:06:02'),
(62, 6, 'Dolpa', NULL, '2019-01-06 09:00:49', '2019-01-06 09:00:49'),
(63, 6, 'Jumla', NULL, '2019-01-06 09:01:39', '2019-01-06 09:01:39'),
(64, 6, 'Kalikot', NULL, '2019-01-06 09:02:31', '2019-01-06 09:02:31'),
(65, 6, 'Mugu', NULL, '2019-01-06 09:03:09', '2019-01-06 09:03:09'),
(66, 6, 'Humla', NULL, '2019-01-06 09:03:24', '2019-01-06 09:03:24'),
(67, 7, 'Bajura', NULL, '2019-01-06 09:03:47', '2019-01-06 09:03:47'),
(68, 7, 'Bajhang', NULL, '2019-01-06 09:04:07', '2019-01-06 09:04:07'),
(69, 7, 'Achham', NULL, '2019-01-06 09:04:28', '2019-01-06 09:04:28'),
(70, 7, 'Doti', NULL, '2019-01-06 09:04:49', '2019-01-06 09:04:49'),
(71, 7, 'Kailali', NULL, '2019-01-06 09:05:31', '2019-01-06 09:05:31'),
(72, 7, 'Kanchanpur', NULL, '2019-01-06 09:05:50', '2019-01-06 09:05:50'),
(73, 7, 'Dadeldhura', NULL, '2019-01-06 09:06:09', '2019-01-06 09:06:09'),
(74, 7, 'Baitadi', NULL, '2019-01-06 09:06:28', '2019-01-06 09:06:28'),
(75, 7, 'Darchula', NULL, '2019-01-06 09:06:47', '2019-01-06 09:06:47'),
(76, 5, 'Parasi District', NULL, '2020-01-04 18:15:00', '2020-01-04 18:15:00'),
(77, 6, 'Western Rukum District', NULL, '2020-01-04 18:15:00', '2020-01-04 18:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `top_employer` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` datetime NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `company_id`, `title`, `description`, `event_date`, `location`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 2, 'Blood Donation Program', '<p>People are suffering from blood cancer and are dying. Lets donate and help the needy ones.</p>', '2020-01-31 00:00:00', 'Kathmandu Durbar Squar', 'public/assets/uploads/events/1578216119170x100.png', 'Active', '2020-01-05 09:21:59', '2020-01-05 09:21:59'),
(6, 2, 'Cahrity Event', '<p>Mar 13, 2017 -&nbsp;<em>Order by</em>&nbsp;on&nbsp;<em>relationship</em>&nbsp;field. Of course instead of get you can still paginate if needed. When you use the with method the&nbsp;<em>Eloquent</em>&nbsp;makes another&nbsp;<em>query</em>&nbsp;in database to retrieve the related data using whereIn. This is why we can&#39;t&nbsp;<em>order by</em>&nbsp;a&nbsp;<em>relation</em>&nbsp;field.</p>', '2020-01-30 00:00:00', 'Patan Durbar', 'public/assets/uploads/events/1578895955about-slider.png', 'Active', '2020-01-13 06:12:35', '2020-01-13 06:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `company_id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, '74876768-553971888755883-5855526036455817216-n.png', 'public/assets/uploads/galleries/74876768-553971888755883-5855526036455817216-n.png', 'Active', '2020-01-05 07:26:26', '2020-01-05 07:26:26'),
(5, 2, '125770-garmin-01-1260x210-1.jpg', 'public/assets/uploads/galleries/125770-garmin-01-1260x210-1.jpg', 'Active', '2020-01-05 07:26:26', '2020-01-05 07:26:26'),
(6, 2, '74234778-2523725104340973-8498209049928531968-n.png', 'public/assets/uploads/galleries/74234778-2523725104340973-8498209049928531968-n.png', 'Active', '2020-01-05 07:26:26', '2020-01-05 07:26:26'),
(7, 2, '75362544-720876418409379-4562140710219808768-n.png', 'public/assets/uploads/galleries/75362544-720876418409379-4562140710219808768-n.png', 'Active', '2020-01-05 07:26:30', '2020-01-05 07:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `top` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `title`, `slug`, `status`, `top`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', 'information-technology', 'Active', 'Yes', '2018-09-25 04:26:25', '2018-11-08 17:59:37'),
(2, 'Telecommunication', 'telecommunication', 'Active', 'Yes', '2018-09-25 04:26:32', '2018-10-03 18:40:45'),
(3, 'Administration', 'administration', 'Active', 'Yes', '2018-09-25 04:26:42', '2018-09-25 04:26:42'),
(5, 'Banking', 'banking', 'Active', 'Yes', '2018-09-25 04:26:55', '2018-09-25 04:26:55'),
(7, 'Technology', 'technology', 'Active', 'Yes', NULL, '2018-12-08 06:49:39'),
(8, 'Driver', 'musical-instruments-professional-audio', 'Active', 'Yes', '2018-09-25 04:30:25', '2018-09-25 04:30:57'),
(10, 'Manufacturing', 'manufacturing', 'Active', 'Yes', '2018-09-25 04:37:46', '2018-09-25 04:37:46'),
(12, 'Manpower', 'manpower-1', 'Active', 'Yes', '2018-10-03 18:41:17', '2018-10-03 18:41:17'),
(13, 'Engineering', 'engineering', 'Active', 'Yes', NULL, '2018-12-08 06:49:45'),
(14, 'General Mgmt / Administration', 'general-mgmt-administration', 'Active', 'Yes', '2018-12-04 08:08:33', '2018-12-04 08:08:33'),
(15, 'Marketing / Advertising / Custom', 'marketing-advertising-custom', 'Active', 'Yes', '2018-12-04 08:09:37', '2018-12-04 08:09:37'),
(16, 'IT & Telecommunications', 'it-telecommunications', 'Active', 'Yes', '2018-12-04 08:10:10', '2018-12-04 08:10:10'),
(17, 'NGO / INGO / Social Work', 'ngo-ingo-social-work', 'Active', 'Yes', '2018-12-04 08:12:14', '2018-12-04 08:12:14'),
(18, 'Banking / Insurance / Financial Service', 'banking-insurance-financial-service', 'Active', 'Yes', '2018-12-04 08:12:34', '2018-12-04 08:12:34'),
(19, 'Information / Computer / Technology', 'information-computer-technology', 'Active', 'Yes', '2018-12-04 08:12:49', '2018-12-04 08:12:49'),
(20, 'Education _ School & College', 'education-school-college', 'Active', 'Yes', '2018-12-04 08:13:01', '2018-12-04 08:13:01'),
(21, 'Manufacturing / Engineering', 'manufacturing-engineering', 'Active', 'Yes', '2018-12-04 08:13:25', '2018-12-04 08:13:25'),
(22, 'Construction / Real Esate', 'construction-real-esate', 'Active', 'Yes', '2018-12-04 08:13:46', '2018-12-04 08:13:46'),
(23, 'Hospital / Clinic / Diagnostic', 'hospital-clinic-diagnostic', 'Active', 'Yes', '2018-12-04 08:14:01', '2018-12-04 08:14:01'),
(24, 'Immigration & Education Consultancy', 'immigration-education-consultancy', 'Active', 'Yes', '2018-12-04 08:14:13', '2018-12-04 08:14:13'),
(25, 'Sales & Public Relations', 'sales-public-relations', 'Active', 'Yes', '2018-12-04 08:14:35', '2018-12-04 08:14:35'),
(26, 'Creative / Graphics / Designing', 'creative-graphics-designing', 'Active', 'Yes', '2018-12-04 08:14:49', '2018-12-04 08:14:49'),
(27, 'Journalism / Editor / Media', 'journalism-editor-media', 'Active', 'Yes', '2018-12-04 08:15:25', '2018-12-04 08:15:25'),
(28, 'Hydropower \\ Alternate Energy', 'hydropower-alternate-energy', 'Active', 'Yes', '2018-12-04 08:15:49', '2018-12-04 08:15:49'),
(29, 'Human Resource / org Development', 'human-resource-org-development', 'Active', 'Yes', '2018-12-04 08:16:50', '2018-12-04 08:16:50'),
(30, 'Commercial / Logistics / Supply Chain', 'commercial-logistics-supply-chain', 'Active', 'Yes', '2018-12-04 08:17:04', '2018-12-04 08:17:04'),
(31, 'Fashion / textile Designing', 'fashion-textile-designing', 'Active', 'Yes', '2018-12-04 08:17:18', '2018-12-04 08:17:18'),
(32, 'Protective security Services', 'protective-security-services', 'Active', 'Yes', '2018-12-04 08:17:43', '2018-12-04 08:17:43'),
(33, 'Producation / Maintenance / Quality', 'producation-maintenance-quality', 'Active', 'Yes', '2018-12-04 08:18:13', '2018-12-04 08:18:13'),
(34, 'Legal Services', 'legal-services', 'Active', 'Yes', '2018-12-04 08:18:38', '2018-12-04 08:18:38'),
(35, 'Hotel / Resort/ Restaurant', 'hotel-resort-restaurant', 'Active', 'Yes', '2018-12-04 08:18:59', '2018-12-04 08:18:59'),
(36, 'Distribution Companies', 'distribution-companies', 'Active', 'Yes', '2018-12-04 08:19:16', '2018-12-04 08:19:16'),
(37, 'Consumer Product / FMCG', 'consumer-product-fmch', 'Active', 'Yes', '2018-12-04 08:19:57', '2018-12-05 10:12:21'),
(38, 'Pharmaceutical / Healthcare', 'pharmaceutical-healthcare', 'Active', 'Yes', '2018-12-04 08:20:11', '2018-12-04 08:20:11'),
(39, 'Automotive  Sales Support & Service', 'automotive-sales-support-service', 'Active', 'Yes', '2018-12-04 08:20:24', '2018-12-04 08:20:24'),
(40, 'Manpower Recruitment', 'manpower-recruitment', 'Active', 'Yes', '2018-12-04 08:20:36', '2018-12-04 08:20:36'),
(41, 'Hydropower \\ Alternate Energy', 'hydropower-alternate-energy-1', 'Active', 'Yes', '2018-12-04 08:21:15', '2018-12-04 08:21:15'),
(42, 'Retail \\ shops', 'retail-shops', 'Active', 'Yes', '2018-12-04 08:21:26', '2018-12-04 08:21:26'),
(43, 'Garments \\ Carpet Industries', 'garments-carpet-industries', 'Active', 'Yes', '2018-12-04 08:21:38', '2018-12-04 08:21:38'),
(44, 'Audit Firms \\ Tax Consultant', 'audit-firms-tax-consultant', 'Active', 'Yes', '2018-12-04 08:21:48', '2018-12-04 08:21:48'),
(45, 'Training Institutes', 'training-institutes', 'Active', 'Yes', '2018-12-04 08:22:04', '2018-12-04 08:22:04'),
(46, 'Multinational Companies', 'multinational-companies', 'Active', 'Yes', '2018-12-04 08:22:16', '2018-12-04 08:22:16'),
(47, 'Embassies \\ Froign Consulate', 'embassies-froign-consulate', 'Active', 'Yes', '2018-12-04 08:22:25', '2018-12-04 08:22:25'),
(48, 'Distribution & Manufacturing Companies', 'distribution-manufacturing-companies', 'Active', 'Yes', '2018-12-05 23:15:25', '2018-12-05 23:15:25'),
(49, 'Accounting /Finance', 'accounting-finance', 'Active', 'Yes', '2018-12-06 02:21:40', '2018-12-06 02:21:40'),
(50, 'Automobile', 'automobile', 'Active', 'Yes', '2018-12-07 03:56:18', '2018-12-07 03:56:18'),
(51, 'Import/Export/ Delivery', 'import-export-delivery', 'Active', 'Yes', '2018-12-08 06:44:49', '2018-12-08 06:44:49'),
(52, 'Computer Operator/Data Entry', 'computer-operator-data-entry', 'Active', 'Yes', '2018-12-08 20:52:33', '2018-12-08 20:52:33'),
(53, 'Advance Excle', 'advance-excle', 'Active', 'Yes', '2018-12-08 20:56:58', '2018-12-08 20:56:58'),
(54, 'Pivot table', 'pivot-table', 'Active', 'Yes', '2018-12-08 20:57:34', '2018-12-08 20:57:34'),
(56, 'Lubricant', 'lubricant', 'Active', 'Yes', '2018-12-19 03:57:13', '2018-12-19 03:57:13'),
(57, 'Multinational Companies', 'multinational-companies-1', 'Active', 'Yes', '2018-12-21 01:46:03', '2018-12-21 01:46:03'),
(58, 'Multinational Companies', 'multinational-companies-2', 'Active', 'Yes', '2018-12-21 01:46:39', '2018-12-21 01:46:39'),
(59, 'Embassy / Foreign Consulate / Diplomatic Mission', 'embassy-foreign-consulate-diplomatic-mission', 'Active', 'Yes', '2018-12-25 02:26:42', '2018-12-25 02:26:42'),
(60, 'Electrical / Switch gears', 'electrical-switch-gears', 'Active', 'Yes', '2018-12-25 02:28:44', '2018-12-25 02:28:44'),
(61, 'Industrial Products / Heavy Machinery', 'industrial-products-heavy-machinery', 'Active', 'Yes', '2018-12-25 02:29:40', '2018-12-25 02:29:40'),
(62, 'food Beverage', 'food-beverage', 'Active', 'Yes', '2018-12-25 02:30:15', '2018-12-25 02:30:15'),
(63, 'Logistic / Courier / Air Express Companies', 'logistic-courier-air-express-companies', 'Active', 'Yes', '2018-12-30 00:54:12', '2018-12-30 00:54:12'),
(64, 'Beauty Consultant', 'beauty-consultant', 'Active', 'Yes', '2018-12-31 00:12:31', '2018-12-31 00:12:31'),
(65, 'Construction / Engineering', 'construction-engineering', 'Active', 'Yes', '2019-01-03 23:29:44', '2019-01-03 23:29:44'),
(66, 'Medical/Healthcare/Hospital', 'medical-healthcare-hospital', 'Active', 'Yes', '2019-01-03 23:57:40', '2019-01-03 23:57:40'),
(67, 'Travel agents / Tour Operators', 'travel-agents-tour-operators', 'Active', 'Yes', '2019-01-04 02:55:52', '2019-01-04 02:55:52'),
(68, 'Cement Industry', 'cement-industry', 'Active', 'Yes', '2019-01-09 04:03:39', '2019-01-09 04:03:39'),
(69, 'Supply Chain', 'supply-chain', 'Active', 'Yes', '2019-01-13 06:02:09', '2019-01-13 06:02:09'),
(70, 'Supervisor', 'supervisor', 'Active', 'Yes', '2019-01-13 06:17:29', '2019-01-13 06:17:29'),
(71, 'Recovery / Claims', 'recovery-claims', 'Active', 'Yes', '2019-01-19 06:27:15', '2019-01-19 06:27:15'),
(72, 'Media/Dotcom/Entertainment', 'media-dotcom-entertainment', 'Active', 'Yes', '2019-01-24 00:13:59', '2019-01-24 00:13:59'),
(73, 'Accounts / Finance / Tax / CS / Audit', 'accounts-finance-tax-cs-audit', 'Active', 'Yes', '2019-01-24 00:14:31', '2019-01-24 00:14:31'),
(74, 'Brewery/Distillery', 'brewery-distillery', 'Active', 'Yes', '2019-01-30 23:16:20', '2019-01-30 23:16:20'),
(75, 'Media/Dotcom/Entertainment', 'media-dotcom-entertainment-1', 'Active', 'Yes', '2019-01-31 23:32:55', '2019-01-31 23:32:55'),
(76, 'Marketing / Advertising /  Branding,', 'marketing-advertising-branding', 'Active', 'Yes', '2019-02-03 05:45:32', '2019-02-03 05:45:32'),
(77, 'Trading/Export/Import', 'trading-export-import', 'Active', 'Yes', '2019-02-10 01:16:00', '2019-02-10 01:16:00'),
(78, 'Real Estate/Property', 'real-estate-property', 'Active', 'Yes', '2019-02-11 23:04:50', '2019-02-11 23:04:50'),
(79, 'Pharmaceutical', 'pharmaceutical', 'Active', 'Yes', '2019-02-11 23:49:34', '2019-02-11 23:49:34'),
(80, 'production Department', 'production-department', 'Active', 'Yes', '2019-02-26 06:42:13', '2019-02-26 06:42:13'),
(81, 'Marketing / Advertising / Customer Service', 'marketing-advertising-customer-service', 'Active', 'Yes', '2019-03-03 02:10:53', '2019-03-03 02:10:53'),
(82, 'Graphic Designer', 'graphic-designer', 'Active', 'Yes', '2019-03-05 04:31:31', '2019-03-05 04:31:31'),
(83, 'Education/Teaching/Training', 'education-teaching-training', 'Active', 'Yes', '2019-03-06 00:46:17', '2019-03-06 00:46:17'),
(84, 'Media/Dotcom/Entertainment', 'media-dotcom-entertainment-2', 'Active', 'Yes', '2019-03-06 02:02:11', '2019-03-06 02:02:11'),
(85, 'Media/Dotcom/Entertainment', 'media-dotcom-entertainment-3', 'Active', 'Yes', '2019-03-06 02:30:08', '2019-03-06 02:30:08'),
(86, 'School/College', 'school-college', 'Active', 'Yes', '2019-03-07 03:11:08', '2019-03-07 03:11:08'),
(87, 'Sales/ Business Development', 'sales-business-development', 'Active', 'Yes', '2019-03-17 09:21:06', '2019-03-17 09:21:06'),
(88, 'Media/Dotcom/Entertainment', 'media-dotcom-entertainment-4', 'Active', 'Yes', '2019-04-25 00:56:26', '2019-04-25 00:56:26'),
(89, 'Trading Company', 'trading-company', 'Active', 'Yes', '2019-04-26 03:48:20', '2019-04-26 03:48:20'),
(90, 'Construction Equipment', 'construction-equipment', 'Active', 'Yes', '2019-04-26 04:02:43', '2019-04-26 04:02:43'),
(91, 'test 123123', 'test-123123', 'Active', 'No', '2019-12-24 08:07:12', '2019-12-24 08:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_level` enum('Internship','Fresher','Mid Level','Senior Level') COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` enum('Freelance','Contract','Part Time','Full Time') COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_type` enum('Negotiable','Fixed','Range') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_salary` double(8,2) DEFAULT NULL,
  `max_salary` double(8,2) DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` enum('Not Required','Less than 1 year','More than or equals to 1 years','More than or equals to 3 years','More than or equals to 5 years') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `industry_id`, `title`, `slug`, `description`, `specification`, `vacancy`, `location`, `job_level`, `job_type`, `salary_type`, `min_salary`, `max_salary`, `deadline`, `education`, `experience`, `status`, `view`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Laravel Developers', 'laravel-developers', '<p>Calling&nbsp;<code>select2(&#39;data&#39;)</code>&nbsp;will return a JavaScript array of objects representing the current selection. Each object will contain all of the properties/values that were in the source data objects passed through&nbsp;<code>processResults</code>&nbsp;and&nbsp;<code>templateResult</code>&nbsp;callbacks.</p>', '<ul>\r\n	<li>There are two ways to programmatically access the current selection data: using&nbsp;<code>.select2(&#39;data&#39;)</code>, or by using a jQuery selector.</li>\r\n	<li>Do not rely on the&nbsp;<code>selected</code>&nbsp;attribute of&nbsp;&nbsp;elements to determine the currently selected item(s). 123123</li>\r\n</ul>', 3, 'Kathmandu', 'Fresher', 'Full Time', 'Fixed', 12000.00, NULL, '2020-01-14 00:00:00', 'Intermediate', 'Not Required', 'Active', 0, '2020-01-06 07:48:12', '2020-01-06 07:54:58'),
(2, 2, 2, 'Job 2', 'job-2', '<p>qwerwertwer werqwer</p>', '<p>&nbsp;qwesdas dzas dzas zc</p>', 3, 'Kathmandu', 'Fresher', 'Contract', 'Negotiable', NULL, NULL, '2020-01-31 00:00:00', 'slc', 'Less than 1 year', 'Active', 0, '2020-01-23 11:17:20', '2020-01-23 11:17:20'),
(3, 2, 18, 'New Vacancy for Marketing Manager', 'new-vacancy-for-marketing-manager', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>', '<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Etiam a mi sed eros pharetra pharetra in id neque.</li>\r\n	<li>Duis non nibh mattis, mattis felis eget, ornare mi.</li>\r\n	<li>Cras et quam egestas, efficitur risus vitae, rhoncus mi.</li>\r\n	<li>Ut molestie magna ultrices risus sagittis efficitur.</li>\r\n</ul>', 4, 'Sankhamul, Kathmandu', 'Senior Level', 'Full Time', 'Fixed', 50000.00, NULL, '2020-02-29 00:00:00', 'Masters Prefered', 'More than or equals to 3 years', 'Active', 0, '2020-02-25 09:27:26', '2020-02-25 09:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_04_122330_create_permission_tables', 2),
(15, '2019_12_15_153131_create_testimonials_table', 3),
(16, '2019_12_15_163500_create_blogs_table', 4),
(17, '2019_12_22_113932_create_galleries_table', 5),
(18, '2020_01_02_131813_create_services_table', 6),
(21, '2020_01_03_102030_create_events_table', 7),
(26, '2020_01_05_172810_create_jobs_table', 8),
(28, '2020_01_06_145528_create_notices_table', 9),
(31, '2020_01_12_130420_create_reviews_table', 10),
(32, '2020_01_16_171541_create_save_listings_table', 11),
(33, '2020_01_17_114410_create_contact_companies_table', 12),
(34, '2020_01_23_101817_create_queue_jobs_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 5),
(6, 'App\\User', 5),
(6, 'App\\User', 6),
(6, 'App\\User', 8),
(7, 'App\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `municipals`
--

CREATE TABLE `municipals` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `municipal_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `municipals`
--

INSERT INTO `municipals` (`id`, `district_id`, `municipal_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Phungling Municipality', '2019-01-06 05:34:13', '2019-01-06 05:34:13'),
(2, 1, 'Aatharai Triveni', '2019-01-06 05:35:23', '2019-01-06 05:35:23'),
(3, 1, 'Sidingawa', '2019-01-06 10:04:10', '2019-01-06 10:04:10'),
(4, 1, 'Phakatanglung', '2019-01-06 10:04:22', '2019-01-06 10:04:22'),
(5, 1, 'Mikwa Khola', '2019-01-06 10:04:49', '2019-01-06 10:04:49'),
(6, 1, 'Meringden', '2019-01-06 10:05:03', '2019-01-06 10:05:03'),
(7, 1, 'Maiwa Khola', '2019-01-06 10:05:13', '2019-01-06 10:05:13'),
(8, 1, 'Yangbarak', '2019-01-06 10:05:26', '2019-01-06 10:05:26'),
(9, 1, 'Sirijunga', '2019-01-06 10:05:39', '2019-01-06 10:05:39'),
(10, 2, 'Phidim Municipality', '2019-01-06 10:06:36', '2019-01-06 10:06:36'),
(11, 2, 'Phalelung', '2019-01-06 10:07:08', '2019-01-06 10:07:08'),
(12, 2, 'Palgunanda', '2019-01-06 10:08:33', '2019-01-06 10:08:33'),
(13, 2, 'Hilihang', '2019-01-06 10:09:04', '2019-01-06 10:09:04'),
(14, 2, 'Kummayak', '2019-01-06 10:09:30', '2019-01-06 10:09:30'),
(15, 2, 'Miklajung', '2019-01-06 10:09:55', '2019-01-06 10:09:55'),
(16, 2, 'Tumbewa', '2019-01-06 10:10:21', '2019-01-06 10:10:21'),
(17, 2, 'Yangbarak', '2019-01-06 10:10:45', '2019-01-06 10:10:45'),
(18, 3, 'Ilam Municipality', '2019-01-06 10:19:27', '2019-01-06 10:19:27'),
(19, 3, 'Deumai Municipality', '2019-01-06 10:19:27', '2019-01-06 10:19:27'),
(20, 3, 'Mai Municipality', '2019-01-06 10:21:07', '2019-01-06 10:21:07'),
(21, 3, 'Suryodaya Municipality', '2019-01-06 10:21:07', '2019-01-06 10:21:07'),
(22, 3, 'Phakaphokthum', '2019-01-06 10:21:53', '2019-01-06 10:21:53'),
(23, 3, 'Chulachuli', '2019-01-06 10:22:07', '2019-01-06 10:22:07'),
(24, 3, 'Mai Jogmai', '2019-01-06 10:22:54', '2019-01-06 10:22:54'),
(25, 3, 'Mangsebung', '2019-01-06 10:23:22', '2019-01-06 10:23:22'),
(26, 3, 'Rong', '2019-01-06 10:23:41', '2019-01-06 10:23:41'),
(27, 3, 'Sandakpur', '2019-01-06 10:23:57', '2019-01-06 10:23:57'),
(28, 4, 'MechiNagar Municipality', '2019-01-06 10:25:32', '2019-01-06 10:25:32'),
(29, 4, 'Damak Municipality', '2019-01-06 10:25:49', '2019-01-06 10:25:49'),
(30, 4, 'Kankai Municipality', '2019-01-06 10:26:13', '2019-01-06 10:26:13'),
(31, 4, 'Bhadrapur Municipality', '2019-01-06 10:26:30', '2019-01-06 10:26:30'),
(32, 4, 'Arjundhara Municipality', '2019-01-06 10:26:49', '2019-01-06 10:26:49'),
(33, 4, 'ShivaSataxi Municipality', '2019-01-06 10:27:07', '2019-01-06 10:27:07'),
(34, 4, 'Gauradaha Municipality', '2019-01-06 10:27:20', '2019-01-06 10:27:20'),
(35, 4, 'Birtamod Municipality', '2019-01-06 10:27:38', '2019-01-06 10:27:38'),
(36, 4, 'Kamal', '2019-01-06 10:27:58', '2019-01-06 10:27:58'),
(37, 4, 'Gaurigunj', '2019-01-06 10:28:11', '2019-01-06 10:28:11'),
(38, 4, 'Barhadashi', '2019-01-06 10:28:24', '2019-01-06 10:28:24'),
(39, 4, 'Jhapa', '2019-01-06 10:28:40', '2019-01-06 10:28:40'),
(40, 4, 'BuddaShanti', '2019-01-06 10:28:52', '2019-01-06 10:28:52'),
(41, 4, 'Haldibari', '2019-01-06 10:29:09', '2019-01-06 10:29:09'),
(42, 4, 'Kanchankawal', '2019-01-06 10:29:20', '2019-01-06 10:29:20'),
(43, 5, 'Biratnagar Sub-Metrpolitan', '2019-01-06 10:29:44', '2019-01-06 10:29:44'),
(44, 5, 'Belbari Municipality', '2019-01-06 10:30:50', '2019-01-06 10:30:50'),
(45, 5, 'Letang Municipality', '2019-01-06 10:31:24', '2019-01-06 10:31:24'),
(46, 5, 'Pathari-Sanishchare Municiplaity', '2019-01-06 10:31:41', '2019-01-06 10:31:41'),
(47, 5, 'Rangeli Municipality', '2019-01-06 10:32:32', '2019-01-06 10:32:32'),
(48, 5, 'Ratuwamai Municipality', '2019-01-06 10:32:47', '2019-01-06 10:32:47'),
(49, 5, 'Sunbarshi Municiplaity', '2019-01-06 10:33:03', '2019-01-06 10:33:03'),
(50, 5, 'Urlabari Municipality', '2019-01-06 10:33:18', '2019-01-06 10:33:18'),
(51, 5, 'SundarHaraincha Municipality', '2019-01-06 10:33:34', '2019-01-06 10:33:34'),
(52, 5, 'BudhiGanga', '2019-01-06 10:33:50', '2019-01-06 10:33:50'),
(53, 5, 'Dhanpalthan', '2019-01-06 10:34:03', '2019-01-06 10:34:03'),
(54, 5, 'Gramthan', '2019-01-06 10:34:16', '2019-01-06 10:34:16'),
(55, 5, 'Jahada', '2019-01-06 10:34:33', '2019-01-06 10:34:33'),
(56, 5, 'Kanepokhari', '2019-01-06 10:35:17', '2019-01-06 10:35:17'),
(57, 5, 'Katahari', '2019-01-06 10:35:27', '2019-01-06 10:35:27'),
(58, 5, 'Kerabari', '2019-01-06 10:35:54', '2019-01-06 10:35:54'),
(59, 5, 'Miklajung', '2019-01-06 10:36:08', '2019-01-06 10:36:08'),
(60, 6, 'Itahari Sub-Metropolitan', '2019-01-06 10:36:34', '2019-01-06 10:36:34'),
(61, 6, 'Dharan Sub-Metropolitan', '2019-01-06 10:37:40', '2019-01-06 10:37:40'),
(62, 6, 'Inaruwa Municipality', '2019-01-06 10:37:57', '2019-01-06 10:37:57'),
(63, 6, 'Duhabi Municipality', '2019-01-06 10:38:12', '2019-01-06 10:38:12'),
(64, 6, 'Ramdhuni Municipality', '2019-01-06 10:38:26', '2019-01-06 10:38:26'),
(65, 6, 'Baraha Municipality', '2019-01-06 10:38:39', '2019-01-06 10:38:39'),
(66, 6, 'Dewangunj', '2019-01-06 10:38:59', '2019-01-06 10:38:59'),
(67, 6, 'Koshi', '2019-01-06 10:39:12', '2019-01-06 10:39:12'),
(68, 6, 'Gadhi', '2019-01-06 10:39:24', '2019-01-06 10:39:24'),
(69, 6, 'Barju', '2019-01-06 10:39:42', '2019-01-06 10:39:42'),
(70, 6, 'Bhokraha', '2019-01-06 10:39:55', '2019-01-06 10:39:55'),
(71, 6, 'Harinagara', '2019-01-06 10:40:21', '2019-01-06 10:40:21'),
(72, 7, 'Pakhribas Municipality', '2019-01-06 10:41:33', '2019-01-06 10:41:33'),
(73, 7, 'Dhankuta Municipality', '2019-01-06 10:41:53', '2019-01-06 10:41:53'),
(74, 7, 'Mahalaxmi Municipality', '2019-01-06 10:42:08', '2019-01-06 10:42:08'),
(75, 7, 'SanguriGadhi', '2019-01-06 10:42:24', '2019-01-06 10:42:24'),
(79, 7, 'Khalsa Chhintang Sahidbhumi', '2019-01-06 10:42:38', '2019-01-06 10:42:38'),
(80, 7, 'Chhathat Jorpati', '2019-01-06 10:42:50', '2019-01-06 10:42:50'),
(81, 7, 'Chaubise', '2019-01-06 10:43:02', '2019-01-06 10:43:02'),
(82, 8, 'Myanglung Municipality', '2019-01-06 10:43:21', '2019-01-06 10:43:21'),
(83, 8, 'Laligurans Municipality', '2019-01-06 10:43:36', '2019-01-06 10:43:36'),
(84, 8, 'Aatharai', '2019-01-06 10:43:53', '2019-01-06 10:43:53'),
(85, 8, 'Chhathar', '2019-01-06 10:44:06', '2019-01-06 10:44:06'),
(86, 8, 'Phedap', '2019-01-06 10:44:22', '2019-01-06 10:44:22'),
(87, 8, 'Menchayayem', '2019-01-06 10:45:01', '2019-01-06 10:45:01'),
(88, 9, 'Chainpur Municipality', '2019-01-06 10:45:51', '2019-01-06 10:45:51'),
(89, 9, 'DharmaDevi Municipality', '2019-01-06 10:46:08', '2019-01-06 10:46:08'),
(90, 9, 'Khadbari Municipality', '2019-01-06 10:46:20', '2019-01-06 10:46:20'),
(91, 9, 'Madi Municipality', '2019-01-06 10:47:07', '2019-01-06 10:47:07'),
(92, 9, 'PanchKhapan Municipality', '2019-01-06 10:47:19', '2019-01-06 10:47:19'),
(93, 9, 'Bhot Khola', '2019-01-06 10:47:46', '2019-01-06 10:47:46'),
(94, 9, 'Chichila', '2019-01-06 10:48:05', '2019-01-06 10:48:05'),
(95, 9, 'Makalu', '2019-01-06 10:48:17', '2019-01-06 10:48:17'),
(96, 9, 'Sabhapokhari', '2019-01-06 10:48:32', '2019-01-06 10:48:32'),
(97, 9, 'Silingchong', '2019-01-06 10:48:48', '2019-01-06 10:48:48'),
(98, 10, 'Bhojpur Municipality', '2019-01-06 10:50:14', '2019-01-06 10:50:14'),
(99, 10, 'Shadananda Municipality', '2019-01-06 10:50:56', '2019-01-06 10:50:56'),
(100, 10, 'Tyamke Maiyum', '2019-01-06 10:51:13', '2019-01-06 10:51:13'),
(101, 10, 'Ram Prasad Rai', '2019-01-06 10:51:38', '2019-01-06 10:51:38'),
(102, 10, 'Arun', '2019-01-06 10:51:56', '2019-01-06 10:51:56'),
(103, 10, 'PauwaDungama', '2019-01-06 10:52:10', '2019-01-06 10:52:10'),
(104, 10, 'Salpasilichho', '2019-01-06 10:52:24', '2019-01-06 10:52:24'),
(105, 10, 'Aamchok', '2019-01-06 10:52:44', '2019-01-06 10:52:44'),
(106, 10, 'HatuwaGadhi', '2019-01-06 10:54:10', '2019-01-06 10:54:10'),
(107, 11, 'SoluDudhakund Municipality', '2019-01-06 10:54:37', '2019-01-06 10:54:37'),
(108, 11, 'Dudhakoshi', '2019-01-06 10:54:56', '2019-01-06 10:54:56'),
(109, 11, 'Khumbu PasangLhamu', '2019-01-06 10:55:34', '2019-01-06 10:55:34'),
(110, 11, 'Dudhakaushika', '2019-01-06 10:55:53', '2019-01-06 10:55:53'),
(111, 11, 'Necha Salyan', '2019-01-06 10:56:35', '2019-01-06 10:56:35'),
(112, 11, 'Maha Kulung', '2019-01-06 10:56:50', '2019-01-06 10:56:50'),
(113, 11, 'Likhu Pike', '2019-01-06 10:57:09', '2019-01-06 10:57:09'),
(114, 11, 'Sotang', '2019-01-06 10:57:24', '2019-01-06 10:57:24'),
(115, 12, 'SiddiCharan Municipality', '2019-01-06 10:58:14', '2019-01-06 10:58:14'),
(116, 12, 'Khiji Demba', '2019-01-06 10:58:14', '2019-01-06 10:58:14'),
(117, 12, 'Champadevi', '2019-01-06 10:58:40', '2019-01-06 10:58:40'),
(118, 12, 'ChishankhuGadhi', '2019-01-06 10:58:55', '2019-01-06 10:58:55'),
(119, 12, 'ManeBhanjyang', '2019-01-06 10:59:09', '2019-01-06 10:59:09'),
(120, 12, 'Molung', '2019-01-06 10:59:25', '2019-01-06 10:59:25'),
(121, 12, 'Likhu', '2019-01-06 10:59:40', '2019-01-06 10:59:40'),
(122, 12, 'Sunkoshi', '2019-01-06 10:59:52', '2019-01-06 10:59:52'),
(123, 13, 'Halesi Tuwachung Municipality', '2019-01-06 11:00:45', '2019-01-06 11:00:45'),
(124, 13, 'Rupakot Majhuwagadhi Municipality', '2019-01-06 11:01:04', '2019-01-06 11:01:04'),
(125, 13, 'Aiselukharka', '2019-01-06 11:01:20', '2019-01-06 11:01:20'),
(126, 13, 'Lamidanda', '2019-01-06 11:01:37', '2019-01-06 11:01:37'),
(127, 13, 'Jantedhunga ', '2019-01-06 11:01:54', '2019-01-06 11:01:54'),
(128, 13, 'Khotehang', '2019-01-06 11:03:56', '2019-01-06 11:03:56'),
(129, 13, 'Kepilasgadhi', '2019-01-06 11:04:11', '2019-01-06 11:04:11'),
(130, 13, 'Diprung', '2019-01-06 11:04:28', '2019-01-06 11:04:28'),
(131, 13, 'Sakela', '2019-01-06 11:04:43', '2019-01-06 11:04:43'),
(132, 13, 'Barahpokhari', '2019-01-06 11:05:00', '2019-01-06 11:05:00'),
(133, 14, 'Katari Municipality', '2019-01-06 11:05:43', '2019-01-06 11:05:43'),
(134, 14, 'ChaudandiGadhi Municipality', '2019-01-06 11:06:00', '2019-01-06 11:06:00'),
(135, 14, 'Triyuga Municipality', '2019-01-06 11:06:14', '2019-01-06 11:06:14'),
(136, 14, 'Belaka Municipality', '2019-01-06 11:06:28', '2019-01-06 11:06:28'),
(137, 14, 'Udayapur Gadhi', '2019-01-06 11:06:42', '2019-01-06 11:06:42'),
(138, 14, 'Tapli', '2019-01-06 11:07:36', '2019-01-06 11:07:36'),
(139, 14, 'Rautamai', '2019-01-06 11:07:51', '2019-01-06 11:07:51'),
(140, 14, 'Sunkoshi', '2019-01-06 11:08:05', '2019-01-06 11:08:05'),
(141, 15, 'Rajbiraj Municipality', '2019-01-06 11:08:28', '2019-01-06 11:08:28'),
(142, 15, 'Kanchanrup Municipality', '2019-01-06 11:08:42', '2019-01-06 11:08:42'),
(143, 15, 'Dakneshwori Municipality', '2019-01-06 11:08:59', '2019-01-06 11:08:59'),
(144, 15, 'BodeBarsain Municipality', '2019-01-06 11:10:36', '2019-01-06 11:10:36'),
(145, 15, 'Khadak Municipality', '2019-01-06 11:11:08', '2019-01-06 11:11:08'),
(146, 15, 'Shambhunath Municipality', '2019-01-06 11:11:26', '2019-01-06 11:11:26'),
(147, 15, 'Surunga Municipality', '2019-01-06 11:11:46', '2019-01-06 11:11:46'),
(148, 15, 'HanumanNagar Kankalini', '2019-01-06 11:12:02', '2019-01-06 11:12:02'),
(149, 15, 'Krishna Sawaran', '2019-01-06 11:12:17', '2019-01-06 11:12:17'),
(150, 15, 'Chhinnamasta', '2019-01-06 11:12:31', '2019-01-06 11:12:31'),
(151, 15, 'Mahadeva', '2019-01-06 11:12:43', '2019-01-06 11:12:43'),
(152, 15, 'Saptkoshi', '2019-01-06 11:23:41', '2019-01-06 11:23:41'),
(153, 15, 'Tirhut', '2019-01-06 11:24:01', '2019-01-06 11:24:01'),
(154, 15, 'Tilathi Koiladi', '2019-01-06 11:24:15', '2019-01-06 11:24:15'),
(155, 15, 'Rupani', '2019-01-06 11:24:56', '2019-01-06 11:24:56'),
(156, 15, 'Belhi Chapani', '2019-01-06 11:25:11', '2019-01-06 11:25:11'),
(157, 15, 'Bishnupura', '2019-01-06 11:25:39', '2019-01-06 11:25:39'),
(158, 16, 'Lahan Municipality', '2019-01-06 11:26:02', '2019-01-06 11:26:02'),
(159, 16, 'DhanagadhiMai Municipality', '2019-01-06 11:26:17', '2019-01-06 11:26:17'),
(160, 16, 'Siraha Municipality', '2019-01-06 11:26:30', '2019-01-06 11:26:30'),
(161, 16, 'GolBazaar Municipality', '2019-01-06 11:26:45', '2019-01-06 11:26:45'),
(162, 16, 'Mirchaiya Municipality', '2019-01-06 11:26:59', '2019-01-06 11:26:59'),
(163, 16, 'Kalyanpur Municipality', '2019-01-06 11:27:42', '2019-01-06 11:27:42'),
(164, 16, 'Bhagawanpur', '2019-01-06 11:27:57', '2019-01-06 11:27:57'),
(165, 16, 'Aaurahi', '2019-01-06 11:28:11', '2019-01-06 11:28:11'),
(166, 16, 'Bishnupur', '2019-01-06 11:28:27', '2019-01-06 11:28:27'),
(167, 16, 'Sukhipur', '2019-01-06 11:28:43', '2019-01-06 11:28:43'),
(168, 16, 'Karjanha', '2019-01-06 11:28:56', '2019-01-06 11:28:56'),
(169, 16, 'Bariyarpatti', '2019-01-06 11:29:07', '2019-01-06 11:29:07'),
(170, 16, 'Laxmipur Patari', '2019-01-06 11:29:19', '2019-01-06 11:29:19'),
(171, 16, 'Naraha', '2019-01-06 11:29:30', '2019-01-06 11:29:30'),
(172, 16, 'Sakhuwanankarkatt', '2019-01-06 11:29:43', '2019-01-06 11:29:43'),
(173, 16, 'Arnama', '2019-01-06 11:30:00', '2019-01-06 11:30:00'),
(174, 16, 'Nawarajpur', '2019-01-06 11:30:13', '2019-01-06 11:30:13'),
(175, 17, 'Janakpur Sub-Metropolitan', '2019-01-06 11:31:31', '2019-01-06 11:31:31'),
(176, 17, 'Chhireshwarnath Municipality', '2019-01-06 11:31:47', '2019-01-06 11:31:47'),
(177, 17, 'Ganeshman Charnath Municipality', '2019-01-06 11:31:59', '2019-01-06 11:31:59'),
(178, 17, 'Dhanusadham Municipality', '2019-01-06 11:32:12', '2019-01-06 11:32:12'),
(179, 17, 'Nagaraen Municipality', '2019-01-06 11:32:28', '2019-01-06 11:32:28'),
(180, 17, 'Bideh Municipality', '2019-01-06 11:32:42', '2019-01-06 11:32:42'),
(181, 17, 'Mithila Municipality', '2019-01-06 11:32:55', '2019-01-06 11:32:55'),
(182, 17, 'Shahid Nagar Municipality', '2019-01-06 11:33:09', '2019-01-06 11:33:09'),
(183, 17, 'Sabaila Municipality', '2019-01-06 11:33:25', '2019-01-06 11:33:25'),
(184, 17, 'Kamala Siddidatri', '2019-01-06 11:33:58', '2019-01-06 11:33:58'),
(185, 17, 'Janak Nandini', '2019-01-06 11:34:14', '2019-01-06 11:34:14'),
(186, 17, 'Bateshwor', '2019-01-06 11:34:50', '2019-01-06 11:34:50'),
(187, 17, 'Mithila Bihari', '2019-01-06 11:35:04', '2019-01-06 11:35:04'),
(188, 17, 'Mukhiyapatti Musaharmiya', '2019-01-06 11:35:18', '2019-01-06 11:35:18'),
(189, 17, 'Laxminiya', '2019-01-06 11:35:28', '2019-01-06 11:35:28'),
(190, 17, 'Hanspur', '2019-01-06 11:35:41', '2019-01-06 11:35:41'),
(191, 17, 'Aaurahi', '2019-01-06 11:35:55', '2019-01-06 11:35:55'),
(192, 18, 'Jaleshwor Municipality', '2019-01-06 11:40:09', '2019-01-06 11:40:09'),
(193, 18, 'Bardibas Municipality', '2019-01-06 11:40:26', '2019-01-06 11:40:26'),
(194, 18, 'Gaushala Municipality', '2019-01-06 11:40:41', '2019-01-06 11:40:41'),
(195, 18, 'Ekadara', '2019-01-06 11:40:53', '2019-01-06 11:40:53'),
(196, 18, 'Sonama', '2019-01-06 11:41:08', '2019-01-06 11:41:08'),
(197, 18, 'Samsi', '2019-01-06 11:41:23', '2019-01-06 11:41:23'),
(198, 18, 'Loharpatti', '2019-01-06 11:41:38', '2019-01-06 11:41:38'),
(199, 18, 'RamGopalpur', '2019-01-06 11:41:51', '2019-01-06 11:41:51'),
(200, 18, 'Mahottari', '2019-01-06 11:42:03', '2019-01-06 11:42:03'),
(201, 18, 'Manara', '2019-01-06 11:42:15', '2019-01-06 11:42:15'),
(202, 18, 'Matihani', '2019-01-06 11:42:54', '2019-01-06 11:42:54'),
(203, 18, 'Bhangaha', '2019-01-06 11:43:07', '2019-01-06 11:43:07'),
(204, 18, 'Balawa', '2019-01-06 11:43:28', '2019-01-06 11:43:28'),
(205, 18, 'Pipara', '2019-01-06 11:43:36', '2019-01-06 11:43:36'),
(206, 18, 'Aaurahi', '2019-01-06 11:44:20', '2019-01-06 11:44:20'),
(207, 19, 'Ishworpur Municipality', '2019-01-06 11:44:43', '2019-01-06 11:44:43'),
(213, 19, 'Malangawa Municipality', '2019-01-06 11:50:31', '2019-01-06 11:50:31'),
(214, 19, 'Lalbandi Municipality', '2019-01-06 11:50:51', '2019-01-06 11:50:51'),
(215, 19, 'Haripur Municipality', '2019-01-06 11:51:26', '2019-01-06 11:51:26'),
(216, 19, 'Haripurwa Municipality', '2019-01-06 11:51:41', '2019-01-06 11:51:41'),
(217, 19, 'Hariwan Municipality', '2019-01-06 11:52:00', '2019-01-06 11:52:00'),
(218, 19, 'Barahathawa Municipality', '2019-01-06 11:53:24', '2019-01-06 11:53:24'),
(219, 19, 'Balara Municipality', '2019-01-06 11:53:41', '2019-01-06 11:53:41'),
(220, 19, 'Godaita Municipality', '2019-01-06 11:53:56', '2019-01-06 11:53:56'),
(221, 19, 'Bagamati Municipality', '2019-01-06 11:54:22', '2019-01-06 11:54:22'),
(222, 19, 'Kabilasi', '2019-01-06 11:54:48', '2019-01-06 11:54:48'),
(223, 19, 'Chakraghatta', '2019-01-06 11:55:05', '2019-01-06 11:55:05'),
(224, 19, 'Chandra Nagar', '2019-01-06 11:55:18', '2019-01-06 11:55:18'),
(225, 19, 'DhanaKoul', '2019-01-06 11:55:32', '2019-01-06 11:55:32'),
(226, 19, 'Bramhapuri', '2019-01-06 11:55:46', '2019-01-06 11:55:46'),
(227, 19, 'Ram Nagar', '2019-01-06 11:56:01', '2019-01-06 11:56:01'),
(228, 19, 'Bishnu', '2019-01-06 11:56:24', '2019-01-06 11:56:24'),
(229, 20, 'Chandrapur Municipality', '2019-01-06 11:57:16', '2019-01-06 11:57:16'),
(230, 20, 'Garuda Municipality', '2019-01-06 11:57:31', '2019-01-06 11:57:31'),
(231, 20, 'Gaur Municipality', '2019-01-06 11:57:49', '2019-01-06 11:57:49'),
(232, 20, 'BoudhiMai', '2019-01-06 11:58:06', '2019-01-06 11:58:06'),
(233, 20, 'Brindaban', '2019-01-06 11:58:27', '2019-01-06 11:58:27'),
(234, 20, 'Devahi Gonahi', '2019-01-06 11:58:36', '2019-01-06 11:58:36'),
(235, 20, 'Durga Bhagawati', '2019-01-06 11:58:58', '2019-01-06 11:58:58'),
(236, 20, 'GadhiMai', '2019-01-06 11:59:07', '2019-01-06 11:59:07'),
(237, 20, 'Gujara', '2019-01-06 11:59:29', '2019-01-06 11:59:29'),
(238, 20, 'Katahariya', '2019-01-06 11:59:42', '2019-01-06 11:59:42'),
(239, 20, 'Madhav Narayan', '2019-01-06 11:59:57', '2019-01-06 11:59:57'),
(240, 20, 'Moulapur', '2019-01-06 12:00:14', '2019-01-06 12:00:14'),
(241, 20, 'Phatuwa Bijayapur', '2019-01-06 12:00:30', '2019-01-06 12:00:30'),
(242, 20, 'IshNath', '2019-01-06 12:00:44', '2019-01-06 12:00:44'),
(243, 20, 'Paroha', '2019-01-06 12:00:57', '2019-01-06 12:00:57'),
(244, 20, 'Rajpur', '2019-01-06 12:01:10', '2019-01-06 12:01:10'),
(245, 21, 'Kalaiya Sub-Metrpolish', '2019-01-06 12:01:38', '2019-01-06 12:01:38'),
(246, 21, 'Jitpur Simara Sub-Metrpolish', '2019-01-06 12:03:43', '2019-01-06 12:03:43'),
(247, 21, 'Kolhabi Municipality', '2019-01-06 12:04:04', '2019-01-06 12:04:04'),
(248, 21, 'Nijgadh Municipality', '2019-01-06 12:04:21', '2019-01-06 12:04:21'),
(249, 21, 'Maha Gahdimai Municipality', '2019-01-06 12:04:44', '2019-01-06 12:04:44'),
(250, 21, 'Simraun Gadh Municipality', '2019-01-06 12:05:12', '2019-01-06 12:05:12'),
(251, 21, 'Adarsha Kotwal', '2019-01-06 12:06:08', '2019-01-06 12:06:08'),
(252, 21, 'Karaiya Mai', '2019-01-06 12:06:29', '2019-01-06 12:06:29'),
(253, 21, 'Devtaal', '2019-01-06 12:06:46', '2019-01-06 12:06:46'),
(254, 21, 'PachaRouta', '2019-01-06 12:07:02', '2019-01-06 12:07:02'),
(255, 21, 'Parawanipur', '2019-01-06 12:07:44', '2019-01-06 12:07:44'),
(256, 21, 'Prasouni', '2019-01-06 12:08:01', '2019-01-06 12:08:01'),
(257, 21, 'Pheta', '2019-01-06 12:08:23', '2019-01-06 12:08:23'),
(258, 21, 'Bara Gadhi', '2019-01-06 12:08:40', '2019-01-06 12:08:40'),
(259, 21, 'Subarna', '2019-01-06 12:08:56', '2019-01-06 12:08:56'),
(260, 22, 'Birgunj Sub-Metropolitan', '2019-01-06 12:10:36', '2019-01-06 12:10:36'),
(261, 22, 'Pokhariya Municipality', '2019-01-06 12:11:03', '2019-01-06 12:11:03'),
(262, 22, 'Subarnapur', '2019-01-06 12:11:27', '2019-01-06 12:11:27'),
(263, 22, 'Jagarnathapur', '2019-01-06 12:12:18', '2019-01-06 12:12:18'),
(264, 22, 'Dhobini', '2019-01-06 12:13:03', '2019-01-06 12:13:03'),
(265, 22, 'Chhipahar Mai', '2019-01-06 12:13:29', '2019-01-06 12:13:29'),
(266, 22, 'Pakaha Mainpur', '2019-01-06 12:14:37', '2019-01-06 12:14:37'),
(267, 22, 'Bindabasini', '2019-01-06 12:14:59', '2019-01-06 12:14:59'),
(268, 22, 'Bahudar Mai', '2019-01-06 12:15:34', '2019-01-06 12:15:34'),
(269, 22, 'Belawa', '2019-01-06 12:15:49', '2019-01-06 12:15:49'),
(270, 22, 'Parsa Gadhi', '2019-01-06 12:16:14', '2019-01-06 12:16:14'),
(271, 22, 'Sakhuwa Prasouni', '2019-01-06 12:16:52', '2019-01-06 12:16:52'),
(272, 22, 'Paterwa Sugauli', '2019-01-06 12:17:08', '2019-01-06 12:17:08'),
(273, 23, 'Kamalamai Municipality', '2019-01-06 12:17:30', '2019-01-06 12:17:30'),
(274, 23, 'Dudhauli Municipality', '2019-01-06 12:17:45', '2019-01-06 12:17:45'),
(275, 23, 'Golanjor', '2019-01-06 12:18:05', '2019-01-06 12:18:05'),
(276, 23, 'Ghyanglekh', '2019-01-06 12:18:24', '2019-01-06 12:18:24'),
(277, 23, 'Teen Patan', '2019-01-06 12:18:49', '2019-01-06 12:18:49'),
(278, 23, 'Phikkal', '2019-01-06 12:19:07', '2019-01-06 12:19:07'),
(279, 23, 'Marin', '2019-01-06 12:19:25', '2019-01-06 12:19:25'),
(280, 23, 'Sunkoshi', '2019-01-06 12:19:39', '2019-01-06 12:19:39'),
(281, 23, 'Hariharpur Gadhi', '2019-01-06 12:19:55', '2019-01-06 12:19:55'),
(282, 24, 'Manthali Municipality', '2019-01-06 12:21:26', '2019-01-06 12:21:26'),
(283, 24, 'Ramechhap Municipality', '2019-01-06 12:21:45', '2019-01-06 12:21:45'),
(284, 24, 'Umakunda', '2019-01-06 12:22:08', '2019-01-06 12:22:08'),
(285, 24, 'KhandaDevi', '2019-01-06 12:22:28', '2019-01-06 12:22:28'),
(286, 24, 'Gokul Ganga', '2019-01-06 12:22:47', '2019-01-06 12:22:47'),
(287, 24, 'Doramba', '2019-01-06 12:23:08', '2019-01-06 12:23:08'),
(288, 24, 'Likhu', '2019-01-06 12:23:26', '2019-01-06 12:23:26'),
(289, 24, 'Sunapati', '2019-01-06 12:23:44', '2019-01-06 12:23:44'),
(290, 25, 'Jiri Municipality', '2019-01-06 12:24:33', '2019-01-06 12:24:33'),
(291, 25, 'Bhimeshwor Muncipality', '2019-01-06 12:25:32', '2019-01-06 12:25:32'),
(292, 25, 'Kalinchok', '2019-01-06 12:25:54', '2019-01-06 12:25:54'),
(293, 25, 'Gauri Shankar', '2019-01-06 12:26:10', '2019-01-06 12:26:10'),
(294, 25, 'Tamakoshi', '2019-01-06 12:26:25', '2019-01-06 12:26:25'),
(295, 25, 'Melung', '2019-01-06 12:26:39', '2019-01-06 12:26:39'),
(296, 25, 'Bigu', '2019-01-06 12:26:54', '2019-01-06 12:26:54'),
(298, 25, 'Baiteshwor', '2019-01-06 12:27:48', '2019-01-06 12:27:48'),
(299, 25, 'Shailung', '2019-01-06 12:28:21', '2019-01-06 12:28:21'),
(300, 26, 'Chautara Sangachokgadhi  Municipality', '2019-01-06 12:28:44', '2019-01-06 12:28:44'),
(301, 26, 'Barhabise Municipality', '2019-01-06 12:29:04', '2019-01-06 12:29:04'),
(302, 26, 'Melamchi Municipality', '2019-01-06 12:29:26', '2019-01-06 12:29:26'),
(303, 26, 'Indrawati', '2019-01-06 12:29:44', '2019-01-06 12:29:44'),
(304, 26, 'Jugal', '2019-01-06 12:30:02', '2019-01-06 12:30:02'),
(305, 26, 'PanchaPokhari', '2019-01-06 12:30:20', '2019-01-06 12:30:20'),
(306, 26, 'Balephi', '2019-01-06 12:30:36', '2019-01-06 12:30:36'),
(307, 26, 'Bhotekoshi', '2019-01-06 12:31:01', '2019-01-06 12:31:01'),
(308, 26, 'Lishankhu Pakhar', '2019-01-06 12:31:18', '2019-01-06 12:31:18'),
(309, 26, 'Sunkoshi', '2019-01-06 12:31:35', '2019-01-06 12:31:35'),
(310, 26, 'Helambu', '2019-01-06 12:31:50', '2019-01-06 12:31:50'),
(311, 26, 'TripuraSundari', '2019-01-06 12:32:07', '2019-01-06 12:32:07'),
(312, 27, 'Dhulikhel Municipality', '2019-01-06 12:34:34', '2019-01-06 12:34:34'),
(313, 27, 'Banepa Municipality', '2019-01-06 12:34:48', '2019-01-06 12:34:48'),
(314, 27, 'Panauti Municipality', '2019-01-06 12:35:02', '2019-01-06 12:35:02'),
(315, 27, 'Panchkhal Municipality', '2019-01-06 12:35:36', '2019-01-06 12:35:36'),
(316, 27, 'Namobuddha Municipality', '2019-01-06 12:35:52', '2019-01-06 12:35:52'),
(317, 27, 'Mandan Deupur', '2019-01-06 12:36:05', '2019-01-06 12:36:05'),
(318, 27, 'Khanikhola', '2019-01-06 12:36:22', '2019-01-06 12:36:22'),
(319, 27, 'Chaunri Deurali', '2019-01-06 12:36:57', '2019-01-06 12:36:57'),
(320, 27, 'Temal', '2019-01-06 12:37:11', '2019-01-06 12:37:11'),
(321, 27, 'Bethanchok', '2019-01-06 12:37:29', '2019-01-06 12:37:29'),
(322, 27, 'Bhumlu', '2019-01-06 12:37:46', '2019-01-06 12:37:46'),
(323, 27, 'Mahabharat', '2019-01-06 12:38:01', '2019-01-06 12:38:01'),
(324, 27, 'Roshi', '2019-01-06 12:39:00', '2019-01-06 12:39:00'),
(325, 28, 'Lalitpur Metropolitan', '2019-01-06 12:39:40', '2019-01-06 12:39:40'),
(326, 28, 'Godawari Municipality', '2019-01-06 12:39:57', '2019-01-06 12:39:57'),
(327, 28, 'MahaLaxmi Municipality', '2019-01-06 12:40:30', '2019-01-06 12:40:30'),
(328, 28, 'Konjyosom', '2019-01-06 12:41:19', '2019-01-06 12:41:19'),
(329, 28, 'Bagmati', '2019-01-06 12:41:39', '2019-01-06 12:41:39'),
(330, 28, 'Mahankal', '2019-01-06 12:41:57', '2019-01-06 12:41:57'),
(331, 29, 'Changunarayan Municipality', '2019-01-06 12:42:23', '2019-01-06 12:42:23'),
(332, 29, 'Bhaktapur Municipality', '2019-01-06 12:42:49', '2019-01-06 12:42:49'),
(333, 29, 'Madhyapur Municipality', '2019-01-06 12:43:11', '2019-01-06 12:43:11'),
(334, 29, 'Surya Binayak Municipality', '2019-01-06 12:43:36', '2019-01-06 12:43:36'),
(335, 30, 'Kathmandu Metropolitan', '2019-01-06 12:44:39', '2019-01-06 12:44:39'),
(336, 30, 'Kageswori-Manohara Municipality', '2019-01-06 12:44:56', '2019-01-06 12:44:56'),
(337, 30, 'Kirtipur Municipality', '2019-01-06 12:45:14', '2019-01-06 12:45:14'),
(338, 30, 'Gokarneshwor Municipality', '2019-01-06 12:45:45', '2019-01-06 12:45:45'),
(339, 30, 'Chandragiri Municipality', '2019-01-06 12:46:07', '2019-01-06 12:46:07'),
(340, 30, 'Tokha Municipality', '2019-01-06 12:46:25', '2019-01-06 12:46:25'),
(341, 30, 'Tarkeshwor Municiplaity', '2019-01-06 12:47:09', '2019-01-06 12:47:09'),
(342, 30, 'Daxinkali Municipality', '2019-01-06 12:47:25', '2019-01-06 12:47:25'),
(343, 30, 'Nagarjun Municipality', '2019-01-06 12:47:49', '2019-01-06 12:47:49'),
(344, 30, 'Budhanialkantha Municipality', '2019-01-06 12:48:14', '2019-01-06 12:48:14'),
(345, 30, 'Sankharapur Municipality', '2019-01-06 12:48:33', '2019-01-06 12:48:33'),
(346, 31, 'Bidur Municipality', '2019-01-06 12:51:05', '2019-01-06 12:51:05'),
(347, 31, 'Belkot Gadhi Municipality', '2019-01-06 12:51:25', '2019-01-06 12:51:25'),
(348, 31, 'Kakani', '2019-01-06 12:51:43', '2019-01-06 12:51:43'),
(349, 31, 'Kispang', '2019-01-06 12:51:57', '2019-01-06 12:51:57'),
(350, 31, 'Tadi', '2019-01-06 12:52:15', '2019-01-06 12:52:15'),
(351, 31, 'Tarkeshwor', '2019-01-06 12:52:29', '2019-01-06 12:52:29'),
(352, 31, 'Dupcheshwor', '2019-01-06 12:52:45', '2019-01-06 12:52:45'),
(353, 31, 'PanchaKanya', '2019-01-06 12:53:00', '2019-01-06 12:53:00'),
(354, 31, 'Likhu', '2019-01-06 12:53:43', '2019-01-06 12:53:43'),
(355, 31, 'Meghang', '2019-01-06 13:01:25', '2019-01-06 13:01:25'),
(356, 31, 'Shivpuri', '2019-01-06 13:01:43', '2019-01-06 13:01:43'),
(357, 31, 'Surya Gadhi', '2019-01-06 13:02:05', '2019-01-06 13:02:05'),
(358, 32, 'Uttar Gaya', '2019-01-06 13:03:08', '2019-01-06 13:03:08'),
(359, 32, 'Kalika', '2019-01-06 13:03:28', '2019-01-06 13:03:28'),
(360, 32, 'GosaiKunda', '2019-01-06 13:03:48', '2019-01-06 13:03:48'),
(361, 32, 'NauKunda', '2019-01-06 13:04:09', '2019-01-06 13:04:09'),
(362, 32, 'ParbatiKunda', '2019-01-06 13:04:29', '2019-01-06 13:04:29'),
(363, 33, 'Dhunibesi Municipality', '2019-01-06 13:05:21', '2019-01-06 13:05:21'),
(364, 33, 'Nilkantha Municipality', '2019-01-06 13:06:38', '2019-01-06 13:06:38'),
(365, 33, 'Khaniyabas', '2019-01-06 13:06:59', '2019-01-06 13:06:59'),
(366, 33, 'Gajuri', '2019-01-06 13:08:26', '2019-01-06 13:08:26'),
(367, 33, 'Galchhi', '2019-01-06 13:08:48', '2019-01-06 13:08:48'),
(368, 33, 'Ganga Jamuna', '2019-01-06 13:09:09', '2019-01-06 13:09:09'),
(369, 33, 'Jwalamukhi', '2019-01-06 13:09:28', '2019-01-06 13:09:28'),
(370, 33, 'Thakre', '2019-01-06 13:09:50', '2019-01-06 13:09:50'),
(371, 33, 'Netrawati', '2019-01-06 13:10:06', '2019-01-06 13:10:06'),
(372, 33, 'Benighat Rorang', '2019-01-06 13:10:22', '2019-01-06 13:10:22'),
(373, 33, 'Rubi Valley', '2019-01-06 13:10:36', '2019-01-06 13:10:36'),
(374, 33, 'Sidda Lekh', '2019-01-06 13:10:50', '2019-01-06 13:10:50'),
(375, 33, 'Tripura Sundari', '2019-01-06 13:11:10', '2019-01-06 13:11:10'),
(376, 34, 'Hetaunda Sub-Metropolitan', '2019-01-06 13:12:09', '2019-01-06 13:12:09'),
(377, 34, 'Thaha Municipality ', '2019-01-06 13:12:44', '2019-01-06 13:12:44'),
(378, 34, 'Indra Sarobar', '2019-01-06 13:13:01', '2019-01-06 13:13:01'),
(379, 34, 'Kailash', '2019-01-06 13:13:21', '2019-01-06 13:13:21'),
(380, 34, 'Bakaiya', '2019-01-06 13:13:37', '2019-01-06 13:13:37'),
(381, 34, 'Bagmati', '2019-01-06 13:13:55', '2019-01-06 13:13:55'),
(382, 34, 'Bhimphedi', '2019-01-06 13:14:13', '2019-01-06 13:14:13'),
(383, 34, 'Makawanpur Gadhi', '2019-01-06 13:14:36', '2019-01-06 13:14:36'),
(384, 34, 'Manahari', '2019-01-06 13:22:30', '2019-01-06 13:22:30'),
(385, 34, 'Raksirang', '2019-01-06 13:23:12', '2019-01-06 13:23:12'),
(388, 35, 'Bharatpur Metropolitan', '2019-01-06 13:25:32', '2019-01-06 13:25:32'),
(389, 35, 'Kalika Municipality', '2019-01-06 13:25:48', '2019-01-06 13:25:48'),
(390, 35, 'Khairhani Municipality', '2019-01-06 13:26:10', '2019-01-06 13:26:10'),
(391, 35, 'Madi Municipality', '2019-01-06 13:26:33', '2019-01-06 13:26:33'),
(392, 35, 'Ratna Nagar Municipality', '2019-01-06 13:27:21', '2019-01-06 13:27:21'),
(393, 35, 'Rapti Municipality', '2019-01-06 13:27:39', '2019-01-06 13:27:39'),
(394, 35, 'Ichchhakamana', '2019-01-06 13:28:09', '2019-01-06 13:28:09'),
(395, 36, 'Gorkha Municipality', '2019-01-06 13:29:01', '2019-01-06 13:29:01'),
(396, 36, 'Palungtar Municipality', '2019-01-06 13:29:24', '2019-01-06 13:29:24'),
(397, 36, 'Sulikot', '2019-01-06 13:29:43', '2019-01-06 13:29:43'),
(398, 36, 'Siranchok', '2019-01-06 13:30:08', '2019-01-06 13:30:08'),
(399, 36, 'Ajirkot', '2019-01-06 13:30:37', '2019-01-06 13:30:37'),
(400, 36, 'Aarughat', '2019-01-06 13:31:19', '2019-01-06 13:31:19'),
(401, 36, 'Gandaki', '2019-01-06 13:31:48', '2019-01-06 13:31:48'),
(402, 36, 'Chumanubri', '2019-01-06 13:33:04', '2019-01-06 13:33:04'),
(403, 36, 'Dharche', '2019-01-06 13:33:28', '2019-01-06 13:33:28'),
(404, 36, 'Bhimsen', '2019-01-06 13:33:46', '2019-01-06 13:33:46'),
(405, 36, 'Shahid Lakhan', '2019-01-06 13:34:01', '2019-01-06 13:34:01'),
(406, 37, 'Besishahar Municipality', '2019-01-06 13:35:03', '2019-01-06 13:35:03'),
(407, 37, 'Madhya Nepal Municipality', '2019-01-06 13:35:27', '2019-01-06 13:35:27'),
(408, 37, 'Rainas Municipality', '2019-01-06 13:35:45', '2019-01-06 13:35:45'),
(409, 37, 'Sundarbazar Municipality', '2019-01-06 13:36:26', '2019-01-06 13:36:26'),
(410, 37, 'Kabahola Sothar', '2019-01-06 13:36:44', '2019-01-06 13:36:44'),
(411, 37, 'Dhudh Pokhari', '2019-01-06 13:36:58', '2019-01-06 13:36:58'),
(412, 37, 'Dordi', '2019-01-06 13:37:13', '2019-01-06 13:37:13'),
(413, 37, 'Marsyangdi', '2019-01-06 13:37:26', '2019-01-06 13:37:26'),
(414, 38, 'Bhanu Municipality', '2019-01-06 18:12:44', '2019-01-06 18:12:44'),
(415, 38, 'Bhimad Minucipality', '2019-01-06 18:13:27', '2019-01-06 18:13:27'),
(416, 38, 'Byas Minucipality', '2019-01-06 18:14:05', '2019-01-06 18:14:05'),
(417, 38, 'Sukla Gandaki Municipality', '2019-01-06 18:14:37', '2019-01-06 18:14:37'),
(418, 38, 'Aanbu Khaireni', '2019-01-06 18:14:56', '2019-01-06 18:14:56'),
(419, 38, 'Rishing', '2019-01-06 18:15:16', '2019-01-06 18:15:16'),
(420, 38, 'Ghiring', '2019-01-06 18:15:37', '2019-01-06 18:15:37'),
(421, 38, 'Devghat', '2019-01-06 18:15:55', '2019-01-06 18:15:55'),
(422, 38, 'Myagde', '2019-01-06 18:16:35', '2019-01-06 18:16:35'),
(423, 38, 'Bandipur', '2019-01-06 18:16:54', '2019-01-06 18:16:54'),
(424, 39, 'Galyang Municipality', '2019-01-06 18:17:24', '2019-01-06 18:17:24'),
(425, 39, 'Chapakot Municipality', '2019-01-06 18:17:51', '2019-01-06 18:17:51'),
(426, 39, 'Putalibazar Municipality', '2019-01-06 18:18:12', '2019-01-06 18:18:12'),
(427, 39, 'Bhirkot Municipality', '2019-01-06 18:18:37', '2019-01-06 18:18:37'),
(428, 39, 'Waling Municipality', '2019-01-06 18:19:39', '2019-01-06 18:19:39'),
(429, 39, 'Arjun Chaupari', '2019-01-06 18:20:06', '2019-01-06 18:20:06'),
(430, 39, 'Aandhi Khola', '2019-01-06 18:20:28', '2019-01-06 18:20:28'),
(431, 39, 'Kali Gandaki', '2019-01-06 18:20:49', '2019-01-06 18:20:49'),
(432, 39, 'Phedi Khola', '2019-01-06 18:21:55', '2019-01-06 18:21:55'),
(433, 39, 'Biruwa', '2019-01-06 18:22:25', '2019-01-06 18:22:25'),
(434, 39, 'Harinas', '2019-01-06 18:24:18', '2019-01-06 18:24:18'),
(435, 40, 'Pokhara Lekhnath Metropolitan', '2019-01-06 18:25:21', '2019-01-06 18:25:21'),
(436, 40, 'Annapurna', '2019-01-06 18:25:39', '2019-01-06 18:25:39'),
(437, 40, 'Machhapuchhre', '2019-01-06 18:26:00', '2019-01-06 18:26:00'),
(438, 40, 'Madi', '2019-01-06 18:26:24', '2019-01-06 18:26:24'),
(439, 40, 'Rupa', '2019-01-06 18:27:17', '2019-01-06 18:27:17'),
(440, 41, 'Chame', '2019-01-06 18:27:41', '2019-01-06 18:27:41'),
(441, 41, 'Nar Phu', '2019-01-06 18:27:59', '2019-01-06 18:27:59'),
(442, 41, 'Nashong', '2019-01-06 18:28:15', '2019-01-06 18:28:15'),
(443, 41, 'Nesyang', '2019-01-06 18:28:55', '2019-01-06 18:28:55'),
(444, 42, 'Gharpajhong', '2019-01-06 18:30:11', '2019-01-06 18:30:11'),
(445, 42, 'Thasang', '2019-01-06 18:30:34', '2019-01-06 18:30:34'),
(446, 42, 'Dalome', '2019-01-06 18:30:52', '2019-01-06 18:30:52'),
(447, 42, 'Lomanthang', '2019-01-06 18:31:13', '2019-01-06 18:31:13'),
(448, 42, 'Barha Gaun Muktichhetra', '2019-01-06 18:31:30', '2019-01-06 18:31:30'),
(449, 43, 'Beni Municipality', '2019-01-06 18:32:48', '2019-01-06 18:32:48'),
(450, 43, 'Annapurna', '2019-01-06 18:33:08', '2019-01-06 18:33:08'),
(451, 43, 'Dhawalagiri', '2019-01-06 18:33:35', '2019-01-06 18:33:35'),
(452, 43, 'Mangala', '2019-01-06 18:34:31', '2019-01-06 18:34:31'),
(453, 43, 'Malika', '2019-01-06 18:34:52', '2019-01-06 18:34:52'),
(454, 43, 'Raghu Ganga', '2019-01-06 18:35:14', '2019-01-06 18:35:14'),
(455, 44, 'Kushma Municipality', '2019-01-06 18:36:51', '2019-01-06 18:36:51'),
(456, 44, 'Phalebas Municipality', '2019-01-06 18:37:20', '2019-01-06 18:37:20'),
(457, 44, 'Jaljala', '2019-01-06 18:38:03', '2019-01-06 18:38:03'),
(458, 44, 'Painyoo', '2019-01-06 18:38:29', '2019-01-06 18:38:29'),
(459, 44, 'Maha Shila', '2019-01-06 18:38:47', '2019-01-06 18:38:47'),
(460, 44, 'Modi', '2019-01-06 18:39:13', '2019-01-06 18:39:13'),
(461, 44, 'Bihadi', '2019-01-06 18:39:58', '2019-01-06 18:39:58'),
(462, 45, 'Baglung Municipality', '2019-01-06 18:40:36', '2019-01-06 18:40:36'),
(463, 45, 'Galkot Municipality', '2019-01-06 18:41:14', '2019-01-06 18:41:14'),
(464, 45, 'Jaimini Municipality', '2019-01-06 18:42:03', '2019-01-06 18:42:03'),
(465, 45, 'Dhorpatan Municipality', '2019-01-06 18:42:22', '2019-01-06 18:42:22'),
(466, 45, 'Bareng', '2019-01-06 18:42:43', '2019-01-06 18:42:43'),
(467, 45, 'Kathe Khola', '2019-01-06 18:43:05', '2019-01-06 18:43:05'),
(468, 45, 'Taman Khola', '2019-01-06 18:43:24', '2019-01-06 18:43:24'),
(469, 45, 'Tara Khola', '2019-01-06 18:43:47', '2019-01-06 18:43:47'),
(470, 45, 'Nisi Khola', '2019-01-06 18:44:07', '2019-01-06 18:44:07'),
(471, 45, 'Badi Gad', '2019-01-06 18:44:28', '2019-01-06 18:44:28'),
(472, 46, 'Kawasoti Municipality', '2019-01-06 18:45:31', '2019-01-06 18:45:31'),
(473, 46, 'Gaindakot Municipality', '2019-01-06 18:45:53', '2019-01-06 18:45:53'),
(474, 46, 'Devchuli Municipality', '2019-01-06 18:46:16', '2019-01-06 18:46:16'),
(475, 46, 'Bardaghat Municipality', '2019-01-06 18:46:56', '2019-01-06 18:46:56'),
(476, 46, 'Madhya Bindu Municipality', '2019-01-06 18:47:16', '2019-01-06 18:47:16'),
(477, 76, 'Ramgram Municipality', '2019-01-06 18:48:02', '2019-01-06 18:48:02'),
(478, 76, 'Sunwal Municipality', '2019-01-06 18:48:19', '2019-01-06 18:48:19'),
(479, 76, 'Triveni Susta', '2019-01-06 18:48:36', '2019-01-06 18:48:36'),
(480, 76, 'Palhi Nandan', '2019-01-06 18:49:08', '2019-01-06 18:49:08'),
(481, 76, 'Pratappur', '2019-01-06 18:49:29', '2019-01-06 18:49:29'),
(482, 46, 'Bungdi Kali', '2019-01-06 18:49:48', '2019-01-06 18:49:48'),
(483, 46, 'Bulingtar', '2019-01-06 18:50:09', '2019-01-06 18:50:09'),
(484, 46, 'Binayi', '2019-01-06 18:50:28', '2019-01-06 18:50:28'),
(485, 76, 'Sarawal', '2019-01-06 18:50:47', '2019-01-06 18:50:47'),
(486, 46, 'Hupsekot', '2019-01-06 18:51:06', '2019-01-06 18:51:06'),
(487, 47, 'Musikot Municipality', '2019-01-06 18:53:10', '2019-01-06 18:53:10'),
(488, 47, 'Resunga Municipality', '2019-01-06 18:53:27', '2019-01-06 18:53:27'),
(489, 47, 'Isma', '2019-01-06 18:54:26', '2019-01-06 18:54:26'),
(490, 47, 'Kali Gandaki', '2019-01-06 18:54:43', '2019-01-06 18:54:43'),
(491, 47, 'Gulmi Durbar', '2019-01-06 18:55:02', '2019-01-06 18:55:02'),
(492, 47, 'Satyawati', '2019-01-06 18:55:24', '2019-01-06 18:55:24'),
(493, 47, 'Chandrakot', '2019-01-06 18:56:40', '2019-01-06 18:56:40'),
(494, 47, 'Ruru', '2019-01-06 18:57:01', '2019-01-06 18:57:01'),
(495, 47, 'Chhatrakot', '2019-01-06 18:57:20', '2019-01-06 18:57:20'),
(496, 47, 'Dhurkot', '2019-01-06 18:57:41', '2019-01-06 18:57:41'),
(497, 47, 'Madane', '2019-01-06 18:57:59', '2019-01-06 18:57:59'),
(498, 47, 'Malika', '2019-01-06 18:58:43', '2019-01-06 18:58:43'),
(499, 48, 'Rampur Municipality', '2019-01-06 18:59:42', '2019-01-06 18:59:42'),
(500, 48, 'Tansen Municipality', '2019-01-06 19:00:26', '2019-01-06 19:00:26'),
(501, 48, 'Nisdi', '2019-01-06 19:00:43', '2019-01-06 19:00:43'),
(502, 48, 'Purba Khola', '2019-01-06 19:01:00', '2019-01-06 19:01:00'),
(503, 48, 'Rambha', '2019-01-06 19:01:24', '2019-01-06 19:01:24'),
(504, 48, 'Matha Gadhi', '2019-01-06 19:01:52', '2019-01-06 19:01:52'),
(505, 48, 'Tinau', '2019-01-06 19:03:45', '2019-01-06 19:03:45'),
(506, 48, 'Bagnaskali', '2019-01-06 19:04:51', '2019-01-06 19:04:51'),
(507, 48, 'Ribdikot', '2019-01-06 19:05:10', '2019-01-06 19:05:10'),
(508, 48, 'Raina Devi Chhahara', '2019-01-06 19:05:30', '2019-01-06 19:05:30'),
(509, 49, 'Butwal Sub-Metropolitan', '2019-01-06 19:07:35', '2019-01-06 19:07:35'),
(510, 49, 'Devdaha Municipality', '2019-01-06 19:07:55', '2019-01-06 19:07:55'),
(511, 49, 'Lumbini Sanskritik Municipality', '2019-01-06 19:08:22', '2019-01-06 19:08:22'),
(512, 49, 'Siddharthanagar Municipality', '2019-01-06 19:08:42', '2019-01-06 19:08:42'),
(513, 49, 'Saina Maina Municipality', '2019-01-06 19:09:03', '2019-01-06 19:09:03'),
(514, 49, 'Tilottama Municipality', '2019-01-06 19:09:58', '2019-01-06 19:09:58'),
(515, 49, 'Gaidahawa', '2019-01-06 19:10:17', '2019-01-06 19:10:17'),
(516, 49, 'Kanchan', '2019-01-06 19:10:35', '2019-01-06 19:10:35'),
(517, 49, 'Kotahi Mai', '2019-01-06 19:10:59', '2019-01-06 19:10:59'),
(518, 49, 'Marchawari', '2019-01-06 19:11:19', '2019-01-06 19:11:19'),
(519, 49, 'Mayadevi', '2019-01-06 19:11:41', '2019-01-06 19:11:41'),
(520, 49, 'Om Satiya', '2019-01-06 19:12:32', '2019-01-06 19:12:32'),
(521, 49, 'Rohini', '2019-01-06 19:12:50', '2019-01-06 19:12:50'),
(522, 49, 'Sammari Mai', '2019-01-06 19:13:11', '2019-01-06 19:13:11'),
(523, 49, 'Siyari', '2019-01-06 19:13:36', '2019-01-06 19:13:36'),
(524, 49, 'Suddodhana', '2019-01-06 19:14:24', '2019-01-06 19:14:24'),
(525, 50, 'Kapilbastu Municipality', '2019-01-06 19:14:58', '2019-01-06 19:14:58'),
(526, 50, 'Buddabhumi Municipality', '2019-01-06 19:15:18', '2019-01-06 19:15:18'),
(527, 50, 'Shivaraj Municipality', '2019-01-06 19:15:39', '2019-01-06 19:15:39'),
(528, 50, 'Maharajganj Municipality', '2019-01-06 19:15:59', '2019-01-06 19:15:59'),
(529, 50, 'Krishna Nagar Municipality', '2019-01-06 19:16:17', '2019-01-06 19:16:17'),
(530, 50, 'Banganga Municipality', '2019-01-06 19:16:38', '2019-01-06 19:16:38'),
(531, 50, 'Mayadevi', '2019-01-06 19:16:58', '2019-01-06 19:16:58'),
(532, 50, 'Yashodhara', '2019-01-06 19:17:17', '2019-01-06 19:17:17'),
(533, 50, 'Suddodhana', '2019-01-06 19:17:38', '2019-01-06 19:17:38'),
(534, 50, 'Bijay Nagar', '2019-01-06 19:17:59', '2019-01-06 19:17:59'),
(535, 51, 'Sandhikharka Municipality', '2019-01-06 19:19:15', '2019-01-06 19:19:15'),
(536, 51, 'Shit Ganga Municipality', '2019-01-06 19:19:35', '2019-01-06 19:19:35'),
(537, 51, 'Bhumikasthan Municipality', '2019-01-06 19:19:55', '2019-01-06 19:19:55'),
(538, 51, 'Chhatra Dev', '2019-01-06 19:20:16', '2019-01-06 19:20:16'),
(539, 51, 'Panini', '2019-01-06 19:20:35', '2019-01-06 19:20:35'),
(540, 51, 'Malarani', '2019-01-06 19:20:50', '2019-01-06 19:20:50'),
(541, 52, 'Pyuthan Municipality', '2019-01-06 19:22:13', '2019-01-06 19:22:13'),
(542, 52, 'Swargadwari Municipality', '2019-01-06 19:22:35', '2019-01-06 19:22:35'),
(543, 52, 'Gaumukhi', '2019-01-06 19:23:03', '2019-01-06 19:23:03'),
(544, 52, 'Mandavi', '2019-01-06 19:23:26', '2019-01-06 19:23:26'),
(545, 52, 'Sarumarani', '2019-01-06 19:23:49', '2019-01-06 19:23:49'),
(546, 52, 'Mallarani', '2019-01-06 19:25:01', '2019-01-06 19:25:01'),
(547, 52, 'Nau Bahini', '2019-01-06 19:25:24', '2019-01-06 19:25:24'),
(548, 52, 'Jhimaruk', '2019-01-06 19:25:44', '2019-01-06 19:25:44'),
(549, 52, 'Eairabati', '2019-01-06 19:26:18', '2019-01-06 19:26:18'),
(550, 53, 'Rolpa Municipality', '2019-01-06 19:27:09', '2019-01-06 19:27:09'),
(551, 53, 'Triveni', '2019-01-06 19:28:56', '2019-01-06 19:28:56'),
(552, 53, 'Dui Kholi', '2019-01-06 19:29:14', '2019-01-06 19:29:14'),
(553, 53, 'Madi', '2019-01-06 19:29:29', '2019-01-06 19:29:29'),
(554, 53, 'Runti Gadhi', '2019-01-06 19:29:43', '2019-01-06 19:29:43'),
(555, 53, 'Lungri', '2019-01-06 19:30:15', '2019-01-06 19:30:15'),
(556, 53, 'Sukidaha', '2019-01-06 19:30:27', '2019-01-06 19:30:27'),
(557, 53, 'Sunchhahari', '2019-01-06 19:31:16', '2019-01-06 19:31:16'),
(558, 53, 'Subarnawati', '2019-01-06 19:31:32', '2019-01-06 19:31:32'),
(559, 53, 'Thawang', '2019-01-06 19:31:50', '2019-01-06 19:31:50'),
(560, 77, 'Musikot Municipality', '2019-01-06 19:33:00', '2019-01-06 19:33:00'),
(561, 77, 'Chaurjahari Municipality', '2019-01-06 19:33:21', '2019-01-06 19:33:21'),
(562, 77, 'Aathabiskot Municipality', '2019-01-06 19:33:42', '2019-01-06 19:33:42'),
(563, 54, 'Putha Uttar Ganga', '2019-01-06 19:34:02', '2019-01-06 19:34:02'),
(564, 54, 'Bhume', '2019-01-06 19:34:20', '2019-01-06 19:34:20'),
(565, 54, 'Sisne', '2019-01-06 19:34:37', '2019-01-06 19:34:37'),
(566, 77, 'Barphikot', '2019-01-06 19:34:57', '2019-01-06 19:34:57'),
(567, 77, 'Triveni', '2019-01-06 19:35:18', '2019-01-06 19:35:18'),
(568, 77, 'Sani Bheri', '2019-01-06 19:35:35', '2019-01-06 19:35:35'),
(569, 55, 'Tulsipur Sub-Metropolitan', '2019-01-06 19:37:19', '2019-01-06 19:37:19'),
(570, 55, 'Ghorahi Sub-Metropolitan', '2019-01-06 19:37:35', '2019-01-06 19:37:35'),
(571, 55, 'Lamahi Municipality', '2019-01-06 19:37:54', '2019-01-06 19:37:54'),
(572, 55, 'Banglachuli', '2019-01-06 19:38:09', '2019-01-06 19:38:09'),
(573, 55, 'Dangi Sharan', '2019-01-06 19:38:26', '2019-01-06 19:38:26'),
(574, 55, 'Gadhawa', '2019-01-06 19:38:43', '2019-01-06 19:38:43'),
(575, 55, 'Rajpur', '2019-01-06 19:38:58', '2019-01-06 19:38:58'),
(576, 55, 'Rapti', '2019-01-06 19:39:14', '2019-01-06 19:39:14'),
(577, 55, 'Shanti Nagar', '2019-01-06 19:40:40', '2019-01-06 19:40:40'),
(578, 55, 'Babai', '2019-01-06 19:41:01', '2019-01-06 19:41:01'),
(579, 56, 'Nepalgunj Sub-Metropolitan', '2019-01-06 19:41:33', '2019-01-06 19:41:33'),
(580, 56, 'Kohalpur Municipality', '2019-01-06 19:41:50', '2019-01-06 19:41:50'),
(581, 56, 'Narainapur', '2019-01-06 19:42:09', '2019-01-06 19:42:09'),
(582, 56, 'Raptisonari', '2019-01-06 19:42:35', '2019-01-06 19:42:35'),
(583, 56, 'Baijanath', '2019-01-06 19:42:52', '2019-01-06 19:42:52'),
(584, 56, 'Khajura', '2019-01-06 19:43:08', '2019-01-06 19:43:08'),
(585, 56, 'Duduwa', '2019-01-06 19:43:24', '2019-01-06 19:43:24'),
(586, 56, 'Janaki', '2019-01-06 19:43:41', '2019-01-06 19:43:41'),
(587, 57, 'Gulariya Municipality', '2019-01-06 19:44:49', '2019-01-06 19:44:49'),
(588, 57, 'Maduvan Municipality', '2019-01-06 19:45:15', '2019-01-06 19:45:15'),
(589, 57, 'Rajapur Taratal Municipality', '2019-01-06 19:45:42', '2019-01-06 19:45:42'),
(590, 57, 'Thakura Baba Municipality', '2019-01-06 22:41:46', '2019-01-06 22:41:46'),
(591, 57, 'Bansgadhi Municipality', '2019-01-06 22:42:25', '2019-01-06 22:42:25'),
(592, 57, 'Bar Bardiya Municipality', '2019-01-06 22:42:43', '2019-01-06 22:42:43'),
(593, 57, 'Badhaiya Tal', '2019-01-06 22:43:37', '2019-01-06 22:43:37'),
(594, 57, 'Geruwa', '2019-01-06 22:44:24', '2019-01-06 22:44:24'),
(595, 58, 'Sharada Municipality', '2019-01-06 22:45:04', '2019-01-06 22:45:04'),
(596, 58, 'Bagchaur Municipality', '2019-01-06 22:45:54', '2019-01-06 22:45:54'),
(597, 58, 'Bangad Kupinde Municipality', '2019-01-06 22:46:35', '2019-01-06 22:46:35'),
(598, 58, 'Kalimati', '2019-01-06 22:47:27', '2019-01-06 22:47:27'),
(599, 58, 'Triveni', '2019-01-06 22:47:58', '2019-01-06 22:47:58'),
(600, 58, 'Kapurkot', '2019-01-06 22:48:26', '2019-01-06 22:48:26'),
(601, 58, 'Chhatreshwori', '2019-01-06 22:48:52', '2019-01-06 22:48:52'),
(602, 58, 'Dhorchaur', '2019-01-06 22:49:42', '2019-01-06 22:49:42'),
(603, 58, 'Kumakha Malika', '2019-01-06 22:50:02', '2019-01-06 22:50:02'),
(604, 58, 'Darma', '2019-01-06 22:50:22', '2019-01-06 22:50:22'),
(605, 59, 'Birendra Nagar Municipality', '2019-01-06 22:50:49', '2019-01-06 22:50:49'),
(606, 59, 'Bheri Ganga Municipality', '2019-01-06 22:51:15', '2019-01-06 22:51:15'),
(607, 59, 'Gurbhakot Municipality', '2019-01-06 22:53:32', '2019-01-06 22:53:32'),
(608, 59, 'Panchapuri Municipality', '2019-01-06 22:54:15', '2019-01-06 22:54:15'),
(609, 59, 'Lek Besi Municipality', '2019-01-06 22:54:39', '2019-01-06 22:54:39'),
(610, 59, 'Chaukune', '2019-01-06 22:55:11', '2019-01-06 22:55:11'),
(611, 59, 'Baraha Tal', '2019-01-06 22:55:34', '2019-01-06 22:55:34'),
(612, 59, 'Chingad', '2019-01-06 22:55:54', '2019-01-06 22:55:54'),
(613, 59, 'Simta', '2019-01-06 22:56:26', '2019-01-06 22:56:26'),
(614, 60, 'Narayan Municipality', '2019-01-06 22:57:25', '2019-01-06 22:57:25'),
(615, 60, 'Dullu Municipality', '2019-01-06 22:58:24', '2019-01-06 22:58:24'),
(616, 60, 'Chamunda Bindrasaini Municipality', '2019-01-06 22:58:44', '2019-01-06 22:58:44'),
(617, 60, 'Aathabis Municipality', '2019-01-06 22:59:14', '2019-01-06 22:59:14'),
(618, 60, 'Bhagawati Mai', '2019-01-06 22:59:45', '2019-01-06 22:59:45'),
(619, 60, 'Gurans', '2019-01-06 23:00:07', '2019-01-06 23:00:07'),
(620, 60, 'Dungeshwor', '2019-01-06 23:01:21', '2019-01-06 23:01:21'),
(621, 60, 'Naumule', '2019-01-06 23:01:36', '2019-01-06 23:01:36'),
(622, 60, 'Mahabu', '2019-01-06 23:01:54', '2019-01-06 23:01:54'),
(623, 60, 'Bairavi', '2019-01-06 23:02:47', '2019-01-06 23:02:47'),
(624, 60, 'Thantikandh', '2019-01-06 23:03:04', '2019-01-06 23:03:04'),
(625, 61, 'Bheri Municipality', '2019-01-06 23:04:00', '2019-01-06 23:04:00'),
(626, 61, 'Chhedagad Municipality', '2019-01-06 23:04:16', '2019-01-06 23:04:16'),
(627, 61, 'Triveni Nalgad Municipality', '2019-01-06 23:04:30', '2019-01-06 23:04:30'),
(628, 61, 'Kuse', '2019-01-06 23:04:44', '2019-01-06 23:04:44'),
(629, 61, 'Junichande', '2019-01-06 23:05:01', '2019-01-06 23:05:01'),
(630, 61, 'Barekot', '2019-01-06 23:05:25', '2019-01-06 23:05:25'),
(631, 61, 'Shivalaya', '2019-01-06 23:05:41', '2019-01-06 23:05:41'),
(632, 62, 'Thuli Bheri Municipality', '2019-01-06 23:06:47', '2019-01-06 23:06:47'),
(633, 62, 'Tripura Sundari Municipality', '2019-01-06 23:07:15', '2019-01-06 23:07:15'),
(634, 62, 'Dolpo Buddha', '2019-01-06 23:07:59', '2019-01-06 23:07:59'),
(635, 62, 'She-Phoksundo', '2019-01-06 23:08:17', '2019-01-06 23:08:17'),
(636, 62, 'Jagadulla', '2019-01-06 23:08:40', '2019-01-06 23:08:40'),
(637, 62, 'Mudke Chula gaun', '2019-01-06 23:09:00', '2019-01-06 23:09:00'),
(638, 62, 'Kaieke', '2019-01-06 23:09:34', '2019-01-06 23:09:34'),
(639, 62, 'Chharka Tongsong', '2019-01-06 23:10:09', '2019-01-06 23:10:09'),
(640, 63, 'Chandannath Municipality', '2019-01-06 23:11:34', '2019-01-06 23:11:34'),
(641, 63, 'Kanaka Sundari', '2019-01-06 23:11:54', '2019-01-06 23:11:54'),
(642, 63, 'Sinja', '2019-01-06 23:12:16', '2019-01-06 23:12:16'),
(643, 63, 'Hima', '2019-01-06 23:12:46', '2019-01-06 23:12:46'),
(644, 63, 'Tila', '2019-01-06 23:13:11', '2019-01-06 23:13:11'),
(645, 63, 'Guthichaur', '2019-01-06 23:13:40', '2019-01-06 23:13:40'),
(646, 63, 'Tatopani', '2019-01-06 23:14:00', '2019-01-06 23:14:00'),
(647, 63, 'Patarasi', '2019-01-06 23:14:28', '2019-01-06 23:14:28'),
(648, 64, 'Khandachakra Municipality', '2019-01-06 23:15:10', '2019-01-06 23:15:10'),
(649, 64, 'Raskot Municipality', '2019-01-06 23:15:33', '2019-01-06 23:15:33'),
(650, 64, 'Tila Gupha Municipality', '2019-01-06 23:17:00', '2019-01-06 23:17:00'),
(651, 64, 'Pachal Jharana', '2019-01-06 23:17:20', '2019-01-06 23:17:20'),
(652, 64, 'Sanni Triveni', '2019-01-06 23:17:41', '2019-01-06 23:17:41'),
(653, 64, 'Narhari Nath', '2019-01-06 23:18:40', '2019-01-06 23:18:40'),
(654, 64, 'Kalika', '2019-01-06 23:19:17', '2019-01-06 23:19:17'),
(655, 64, 'Mahawai', '2019-01-06 23:19:36', '2019-01-06 23:19:36'),
(656, 64, 'Palata', '2019-01-06 23:20:12', '2019-01-06 23:20:12'),
(657, 65, 'Chhaya Nath Rara Municipality', '2019-01-06 23:21:46', '2019-01-06 23:21:46'),
(658, 65, 'Mugumakarmarong', '2019-01-06 23:22:10', '2019-01-06 23:22:10'),
(659, 65, 'Soru', '2019-01-06 23:22:39', '2019-01-06 23:22:39'),
(660, 65, 'Khatyad', '2019-01-06 23:22:57', '2019-01-06 23:22:57'),
(661, 66, 'Simkot', '2019-01-06 23:24:15', '2019-01-06 23:24:15'),
(662, 66, 'Namkha', '2019-01-06 23:24:28', '2019-01-06 23:24:28'),
(663, 66, 'Kharpu Nath', '2019-01-06 23:24:46', '2019-01-06 23:24:46'),
(664, 66, 'Sarkegad', '2019-01-06 23:25:03', '2019-01-06 23:25:03'),
(665, 66, 'Chankheli', '2019-01-06 23:25:21', '2019-01-06 23:25:21'),
(666, 66, 'Adanchuli', '2019-01-06 23:25:34', '2019-01-06 23:25:34'),
(667, 66, 'Tanjakot', '2019-01-06 23:25:47', '2019-01-06 23:25:47'),
(668, 67, 'Badi Malika Municipality', '2019-01-06 23:26:42', '2019-01-06 23:26:42'),
(669, 67, 'Triveni Municipality', '2019-01-06 23:26:42', '2019-01-06 23:26:42'),
(670, 67, 'Budhi Ganga Municipality', '2019-01-06 23:27:00', '2019-01-06 23:27:00'),
(671, 67, 'Budhi Nanda Municipality', '2019-01-06 23:28:23', '2019-01-06 23:28:23'),
(672, 67, 'Gaumul', '2019-01-06 23:28:23', '2019-01-06 23:28:23'),
(673, 67, 'Pandav Gupha', '2019-01-06 23:28:45', '2019-01-06 23:28:45'),
(674, 67, 'SwamiKartik', '2019-01-06 23:29:07', '2019-01-06 23:29:07'),
(675, 67, 'Chhededaha', '2019-01-06 23:29:25', '2019-01-06 23:29:25'),
(676, 67, 'Himali', '2019-01-06 23:29:54', '2019-01-06 23:29:54'),
(677, 68, 'Jaya Prithvi Municipality', '2019-01-06 23:41:31', '2019-01-06 23:41:31'),
(678, 68, 'Bungal Municipality', '2019-01-06 23:41:52', '2019-01-06 23:41:52'),
(679, 68, 'Talkot', '2019-01-06 23:42:25', '2019-01-06 23:42:25'),
(680, 68, 'Masta', '2019-01-06 23:45:14', '2019-01-06 23:45:14'),
(681, 68, 'Khaptadchhanna', '2019-01-06 23:45:59', '2019-01-06 23:45:59'),
(682, 68, 'Thalara', '2019-01-06 23:46:22', '2019-01-06 23:46:22'),
(683, 68, 'Bitthadchir', '2019-01-06 23:46:43', '2019-01-06 23:46:43'),
(684, 68, 'Surma', '2019-01-06 23:47:03', '2019-01-06 23:47:03'),
(685, 68, 'Chhabis Pathibhera', '2019-01-06 23:47:19', '2019-01-06 23:47:19'),
(686, 68, 'Durgathali', '2019-01-06 23:47:37', '2019-01-06 23:47:37'),
(687, 68, 'Kedarsyun', '2019-01-06 23:49:01', '2019-01-06 23:49:01'),
(688, 68, 'Kanda', '2019-01-06 23:49:27', '2019-01-06 23:49:27'),
(689, 69, 'Mangalsen Municipality', '2019-01-06 23:49:46', '2019-01-06 23:49:46'),
(690, 69, 'Sanfebagar Municipality', '2019-01-06 23:50:02', '2019-01-06 23:50:02'),
(691, 69, 'Kamalbazar Municiplaity', '2019-01-06 23:50:18', '2019-01-06 23:50:18'),
(692, 69, 'Panchdeval Binayak Municiplaity', '2019-01-06 23:50:40', '2019-01-06 23:50:40'),
(693, 69, 'Chourpati', '2019-01-06 23:51:00', '2019-01-06 23:51:00'),
(694, 69, 'Mellekh', '2019-01-06 23:51:22', '2019-01-06 23:51:22'),
(695, 69, 'Bannigadhi Jayagadh', '2019-01-06 23:51:41', '2019-01-06 23:51:41'),
(696, 69, 'RamaRoshan', '2019-01-06 23:52:00', '2019-01-06 23:52:00'),
(697, 69, 'Dhakari', '2019-01-06 23:52:20', '2019-01-06 23:52:20'),
(698, 69, 'Turmakhand', '2019-01-06 23:54:18', '2019-01-06 23:54:18'),
(699, 70, 'Dipayal-Silgadi Municipality', '2019-01-06 23:55:41', '2019-01-06 23:55:41');
INSERT INTO `municipals` (`id`, `district_id`, `municipal_name`, `created_at`, `updated_at`) VALUES
(700, 70, 'Shikhar Municipality', '2019-01-06 23:56:00', '2019-01-06 23:56:00'),
(701, 70, 'Purbi Chouki', '2019-01-06 23:56:20', '2019-01-06 23:56:20'),
(702, 70, 'Badikedar', '2019-01-06 23:56:48', '2019-01-06 23:56:48'),
(703, 70, 'Jorayal', '2019-01-06 23:58:17', '2019-01-06 23:58:17'),
(704, 70, 'Sayal', '2019-01-06 23:58:42', '2019-01-06 23:58:42'),
(705, 70, 'Aadarsha', '2019-01-06 23:59:00', '2019-01-06 23:59:00'),
(706, 70, 'K.I. Singh', '2019-01-06 23:59:16', '2019-01-06 23:59:16'),
(707, 70, 'Bogtan', '2019-01-06 23:59:45', '2019-01-06 23:59:45'),
(708, 71, 'Dhangadhi Sub-Metropolitan', '2019-01-07 00:02:04', '2019-01-07 00:02:04'),
(709, 71, 'Tikapur Muncipality', '2019-01-07 00:03:45', '2019-01-07 00:03:45'),
(710, 71, 'Ghodaghodi Municipality', '2019-01-07 00:05:34', '2019-01-07 00:05:34'),
(711, 71, 'Lamki-Chuha Municipality', '2019-01-07 00:06:36', '2019-01-07 00:06:36'),
(712, 71, 'Bhajani Municipality', '2019-01-07 00:06:58', '2019-01-07 00:06:58'),
(713, 71, 'Godavari Municipality', '2019-01-07 00:07:14', '2019-01-07 00:07:14'),
(714, 71, 'Gauri Ganga Municipality', '2019-01-07 00:07:38', '2019-01-07 00:07:38'),
(715, 71, 'Janaki', '2019-01-07 00:08:05', '2019-01-07 00:08:05'),
(716, 71, 'Bardagoriya', '2019-01-07 00:08:58', '2019-01-07 00:08:58'),
(717, 71, 'Mohanyal', '2019-01-07 00:09:28', '2019-01-07 00:09:28'),
(718, 71, 'Kailari', '2019-01-07 00:10:23', '2019-01-07 00:10:23'),
(719, 71, 'Joshipur', '2019-01-07 00:11:07', '2019-01-07 00:11:07'),
(720, 71, 'Chure', '2019-01-07 00:11:37', '2019-01-07 00:11:37'),
(721, 72, 'Bhimdatta Municipality', '2019-01-07 00:13:45', '2019-01-07 00:13:45'),
(722, 72, 'Punarbas Municipality', '2019-01-07 00:14:07', '2019-01-07 00:14:07'),
(723, 72, 'Bedkot Municipality', '2019-01-07 00:14:26', '2019-01-07 00:14:26'),
(724, 72, 'Mahakali Municipality', '2019-01-07 00:14:45', '2019-01-07 00:14:45'),
(725, 72, 'Shuklaphanta Municipality', '2019-01-07 00:15:07', '2019-01-07 00:15:07'),
(726, 72, 'Belauri Municipality', '2019-01-07 00:15:25', '2019-01-07 00:15:25'),
(727, 72, 'Krishnapur Municipality', '2019-01-07 00:16:02', '2019-01-07 00:16:02'),
(728, 72, 'Beldandi', '2019-01-07 00:16:30', '2019-01-07 00:16:30'),
(729, 72, 'Laljhadi', '2019-01-07 00:17:32', '2019-01-07 00:17:32'),
(730, 73, 'Amargadhi Municipality', '2019-01-07 00:17:58', '2019-01-07 00:17:58'),
(731, 73, 'Parashuram Municipality', '2019-01-07 00:18:11', '2019-01-07 00:18:11'),
(732, 73, 'Aalitaal', '2019-01-07 00:18:30', '2019-01-07 00:18:30'),
(733, 73, 'Bhageshwor', '2019-01-07 00:18:49', '2019-01-07 00:18:49'),
(734, 73, 'Navadurga', '2019-01-07 00:19:07', '2019-01-07 00:19:07'),
(735, 73, 'Ajaymeru', '2019-01-07 00:19:22', '2019-01-07 00:19:22'),
(736, 73, 'Ganyapdhura', '2019-01-07 00:20:42', '2019-01-07 00:20:42'),
(737, 74, 'Dasharath Chanda Municipality', '2019-01-07 00:21:41', '2019-01-07 00:21:41'),
(738, 74, 'Patan Municipality', '2019-01-07 00:22:19', '2019-01-07 00:22:19'),
(739, 74, 'Melauli Municipality', '2019-01-07 00:22:33', '2019-01-07 00:22:33'),
(740, 74, 'Purchaundi Municipality', '2019-01-07 00:22:51', '2019-01-07 00:22:51'),
(741, 74, 'Surnaiya', '2019-01-07 00:23:08', '2019-01-07 00:23:08'),
(742, 74, 'Sigas', '2019-01-07 00:23:45', '2019-01-07 00:23:45'),
(743, 74, 'Shivanath', '2019-01-07 00:24:27', '2019-01-07 00:24:27'),
(744, 74, 'Pancheshwor', '2019-01-07 00:24:41', '2019-01-07 00:24:41'),
(745, 74, 'Dogada Kedar', '2019-01-07 00:25:00', '2019-01-07 00:25:00'),
(746, 74, 'Dilasaini ', '2019-01-07 00:25:00', '2019-01-07 00:25:00'),
(747, 75, 'Mahakali Municipality', '2019-01-07 00:27:31', '2019-01-07 00:27:31'),
(748, 75, 'Sailya Shikhar Municipality', '2019-01-07 00:27:50', '2019-01-07 00:27:50'),
(749, 75, 'Malikarjun', '2019-01-07 00:28:02', '2019-01-07 00:28:02'),
(750, 75, 'Api Himal', '2019-01-07 00:28:15', '2019-01-07 00:28:15'),
(751, 75, 'Duhun', '2019-01-07 00:28:27', '2019-01-07 00:28:27'),
(752, 75, 'Naugad', '2019-01-07 00:28:27', '2019-01-07 00:28:27'),
(753, 75, 'Marma', '2019-01-07 00:29:39', '2019-01-07 00:29:39'),
(754, 75, 'Lekam', '2019-01-07 00:29:59', '2019-01-07 00:29:59'),
(755, 75, 'Byans', '2019-01-07 00:30:13', '2019-01-07 00:30:13'),
(756, 76, 'Susta', '2020-01-04 18:15:00', '2020-01-04 18:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `company_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Notice about general meeting.', 'This is notice about the general meeting to be hold inside our office and this to inform all our members to attend this general meeting.', 'Active', '2020-01-13 08:26:46', '2020-01-13 08:26:46'),
(2, 2, 'Test Notice', 'weasd ydasd ufasdnx asfudy', 'Active', '2020-01-23 11:27:34', '2020-01-23 11:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-12-05 07:56:06', '2019-12-05 07:56:06'),
(2, 'role-create', 'web', '2019-12-05 07:56:07', '2019-12-05 07:56:07'),
(3, 'role-edit', 'web', '2019-12-05 07:56:07', '2019-12-05 07:56:07'),
(4, 'role-delete', 'web', '2019-12-05 07:56:09', '2019-12-05 07:56:09'),
(5, 'company-list', 'web', '2019-12-05 07:56:09', '2019-12-05 07:56:09'),
(6, 'company-create', 'web', '2019-12-05 07:56:09', '2019-12-05 07:56:09'),
(7, 'company-edit', 'web', '2019-12-05 07:56:09', '2019-12-05 07:56:09'),
(8, 'company-delete', 'web', '2019-12-05 07:56:09', '2019-12-05 07:56:09'),
(9, 'employer-list', 'web', '2019-12-05 07:56:09', '2019-12-05 07:56:09'),
(10, 'employer-create', 'web', '2019-12-05 07:56:09', '2019-12-05 07:56:09'),
(11, 'employer-edit', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(12, 'employer-delete', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(13, 'user-list', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(14, 'user-create', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(15, 'user-edit', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(16, 'user-delete', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(17, 'industry-list', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(18, 'industry-create', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(19, 'industry-edit', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(20, 'industry-delete', 'web', '2019-12-05 07:56:10', '2019-12-05 07:56:10'),
(21, 'change-settings', 'web', '2019-12-07 19:02:00', '2019-12-07 18:15:00'),
(22, 'testimonial-list', 'web', '2019-12-15 11:56:25', '2019-12-15 11:56:25'),
(23, 'testimonial-create', 'web', '2019-12-15 11:56:25', '2019-12-15 11:56:25'),
(24, 'testimonial-edit', 'web', '2019-12-15 11:56:25', '2019-12-15 11:56:25'),
(25, 'testimonial-delete', 'web', '2019-12-15 11:56:25', '2019-12-15 11:56:25'),
(26, 'blog-list', 'web', '2019-12-15 11:56:25', '2019-12-15 11:56:25'),
(27, 'blog-create', 'web', '2019-12-15 11:56:26', '2019-12-15 11:56:26'),
(28, 'blog-edit', 'web', '2019-12-15 11:56:26', '2019-12-15 11:56:26'),
(29, 'blog-delete', 'web', '2019-12-15 11:56:26', '2019-12-15 11:56:26'),
(30, 'admin-dashboard', 'web', '2019-12-16 05:30:22', '2019-12-16 05:30:22'),
(31, 'role-moderate', 'web', '2020-01-01 06:10:30', '2020-01-01 06:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `province_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `country_id`, `province_name`, `created_at`, `updated_at`) VALUES
(1, 149, 'Province 1', '2019-01-06 05:17:54', '2019-01-06 05:17:54'),
(2, 149, 'Province 2', '2019-01-06 05:18:23', '2019-01-06 05:18:23'),
(3, 149, 'Province 3', '2019-01-06 05:18:29', '2019-01-06 05:18:29'),
(4, 149, 'Province 4', '2019-01-06 05:18:38', '2019-01-06 05:18:38'),
(5, 149, 'Province 5', '2019-01-06 05:18:44', '2019-01-06 05:18:44'),
(6, 149, 'Province 6', '2019-01-06 05:18:52', '2019-01-06 05:18:52'),
(7, 149, 'Province 7', '2019-01-06 05:18:59', '2019-01-06 05:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `queue_jobs`
--

CREATE TABLE `queue_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queue_jobs`
--

INSERT INTO `queue_jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(3, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ContactCompany\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ContactCompany\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\ContactCompany\\\":10:{s:10:\\\"\\u0000*\\u0000company\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:17:\\\"App\\\\Model\\\\Company\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"name\\\";s:7:\\\"qwertyu\\\";s:5:\\\"email\\\";s:16:\\\"qwert@asdasd.asd\\\";s:7:\\\"message\\\";s:15:\\\"qwdfghj asdfghh\\\";s:10:\\\"company_id\\\";s:1:\\\"2\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-23 12:09:50.082925\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:14:\\\"Asia\\/Kathmandu\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579760690, 1579760630),
(4, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ContactCompany\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ContactCompany\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\ContactCompany\\\":10:{s:10:\\\"\\u0000*\\u0000company\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:17:\\\"App\\\\Model\\\\Company\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:7:\\\"\\u0000*\\u0000data\\\";a:4:{s:4:\\\"name\\\";s:14:\\\"Pragyan Shakya\\\";s:5:\\\"email\\\";s:24:\\\"pragyan7shakya@gmail.com\\\";s:7:\\\"message\\\";s:41:\\\"This is a test for anydesk screen sharing\\\";s:10:\\\"company_id\\\";s:1:\\\"2\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-02-25 15:19:35.340581\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:14:\\\"Asia\\/Kathmandu\\\";}s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1582623275, 1582623216);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `company_id`, `user_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 4, 'Very Good organizarion', 'Active', '2020-01-11 18:15:00', '2020-01-11 18:15:00'),
(2, 2, 1, 1, 'asdasd', 'Active', '2020-01-13 05:04:30', '2020-01-13 05:04:30'),
(3, 1, 1, 5, 'This is very good organization to work for.', 'Active', '2020-01-13 05:06:35', '2020-01-13 05:06:35'),
(4, 2, 1, 4, 'Very Nice Company', 'Active', '2020-02-25 09:20:09', '2020-02-25 09:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2019-12-05 08:07:15', '2019-12-05 08:07:15'),
(2, 'Admin', 'web', '2019-12-05 10:57:14', '2019-12-05 10:57:14'),
(6, 'User', 'web', '2019-12-06 06:08:51', '2019-12-06 06:08:51'),
(7, 'Moderator', 'web', '2020-01-01 05:59:25', '2020-01-01 05:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(5, 7),
(6, 1),
(6, 2),
(6, 7),
(7, 1),
(7, 2),
(7, 7),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 7),
(14, 1),
(14, 7),
(15, 1),
(15, 7),
(16, 1),
(17, 1),
(17, 2),
(17, 7),
(18, 1),
(18, 2),
(18, 7),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 2),
(22, 2),
(22, 7),
(23, 2),
(23, 7),
(24, 2),
(24, 7),
(25, 2),
(26, 2),
(26, 7),
(27, 2),
(27, 7),
(28, 2),
(28, 7),
(29, 2),
(30, 2),
(30, 7),
(31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `save_listings`
--

CREATE TABLE `save_listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `save_listings`
--

INSERT INTO `save_listings` (`id`, `user_id`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2020-01-16 12:07:51', '2020-01-16 12:07:51'),
(2, 1, 2, '2020-01-23 07:01:12', '2020-01-23 07:01:12'),
(3, 1, 2, '2020-01-23 07:01:19', '2020-01-23 07:01:19'),
(4, 1, 2, '2020-01-23 07:01:54', '2020-01-23 07:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(100) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa-thumbs-up',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `company_id`, `title`, `icon`, `description`, `status`, `order`, `created_at`, `updated_at`) VALUES
(2, 2, 'Designing', 'fa-apple', 'We are desinger professional. We have best designers in town.', 'Active', 3, NULL, NULL),
(3, 2, 'Developing', 'fa-thumbs-up', 'Developing is our core skill. Do you need developing work?', 'Active', 1, NULL, NULL),
(4, 2, 'Management', 'fa-caret-square-o-left', 'Some test to describe Management', 'Active', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'php', 'php', 'Active', NULL, '2018-11-19 11:36:22'),
(2, 'java', 'java', 'Active', NULL, '2018-11-19 11:36:21'),
(3, 'bootstrap', 'bootstrap', 'Active', NULL, '2018-11-19 11:36:19'),
(4, 'css', 'css', 'Active', NULL, '2018-11-19 11:36:20'),
(5, 'jquery', 'jquery', 'Active', NULL, '2018-11-19 11:36:18'),
(6, 'ajax', 'ajax', 'Active', NULL, '2018-11-19 11:36:17'),
(7, 'Interpersonal  skill', 'interpersonal-skill', 'Active', '2018-12-04 14:40:01', '2018-12-04 14:40:01'),
(8, 'Teamwork', 'teamwork', 'Active', '2018-12-04 14:40:18', '2018-12-04 14:40:18'),
(9, 'Networking', 'networking', 'Active', '2018-12-04 14:40:30', '2018-12-04 14:40:30'),
(10, 'Empathy', 'empathy', 'Active', '2018-12-04 14:40:44', '2018-12-04 14:40:44'),
(11, 'Positive Attitude', 'positive-attitude', 'Active', '2018-12-04 14:41:17', '2018-12-04 14:41:17'),
(12, 'Self confidence', 'self-confidence', 'Active', '2018-12-04 14:41:46', '2018-12-04 14:41:46'),
(13, 'Communication skill', 'communication-skill', 'Active', '2018-12-04 14:42:19', '2018-12-04 14:42:19'),
(14, 'Writing', 'writing', 'Active', '2018-12-04 14:42:52', '2018-12-04 14:42:52'),
(15, 'Reading', 'reading', 'Active', '2018-12-04 14:43:06', '2018-12-04 14:43:06'),
(16, 'Speaking', 'speaking', 'Active', '2018-12-04 14:43:26', '2018-12-04 14:43:26'),
(17, 'Listening', 'listening', 'Active', '2018-12-04 14:43:45', '2018-12-04 14:43:45'),
(18, 'leadership Skill', 'leadership-skill', 'Active', '2018-12-04 14:43:58', '2018-12-04 14:43:58'),
(19, 'People Management', 'people-management', 'Active', '2018-12-04 14:44:19', '2018-12-04 14:44:19'),
(20, 'Time Management', 'time-management', 'Active', '2018-12-04 14:44:47', '2018-12-04 14:44:47'),
(21, 'Self Management', 'self-management', 'Active', '2018-12-04 14:45:05', '2018-12-04 14:45:05'),
(22, 'Coaching Skill', 'coaching-skill', 'Active', '2018-12-04 14:45:26', '2018-12-04 14:45:26'),
(23, 'Resume writing skills', 'resume-writing-skills', 'Active', '2018-12-04 14:45:54', '2018-12-04 14:45:54'),
(24, 'Presentation', 'presentation', 'Active', '2018-12-04 14:46:14', '2018-12-04 14:46:14'),
(25, 'SQL', 'sql', 'Active', '2018-12-04 14:46:34', '2018-12-04 14:46:34'),
(26, 'C++', 'c', 'Active', '2018-12-04 14:47:04', '2018-12-04 14:47:04'),
(27, 'Python', 'python', 'Active', '2018-12-04 14:47:33', '2018-12-04 14:47:33'),
(28, 'XML', 'xml', 'Active', '2018-12-04 14:47:45', '2018-12-04 14:47:45'),
(29, 'Commuter skill', 'commuter-skill', 'Active', '2018-12-04 14:48:13', '2018-12-04 14:48:13'),
(30, 'Microsoft Office', 'microsoft-office', 'Active', '2018-12-04 14:48:23', '2018-12-04 14:48:23'),
(31, 'Microsoft Excel', 'microsoft-excel', 'Active', '2018-12-04 14:49:00', '2018-12-04 14:49:00'),
(32, 'Spreadsheet', 'spreadsheet', 'Active', '2018-12-04 14:49:42', '2018-12-04 14:49:42'),
(33, 'Microsoft  Access', 'microsoft-access', 'Active', '2018-12-04 14:50:06', '2018-12-04 14:50:06'),
(34, 'Quick book', 'quick-book', 'Active', '2018-12-04 14:50:31', '2018-12-04 14:50:31'),
(35, 'Graphics Designing', 'graphics-designing', 'Active', '2018-12-04 14:50:58', '2018-12-04 14:50:58'),
(36, 'Software & Hardware Development', 'software-hardware-development', 'Active', '2018-12-04 14:53:25', '2018-12-04 14:53:25'),
(37, 'Data Analytics', 'data-analytics', 'Active', '2018-12-04 14:53:55', '2018-12-04 14:53:55'),
(38, 'IT Troubleshooting', 'it-troubleshooting', 'Active', '2018-12-04 14:55:18', '2018-12-04 14:55:18'),
(39, 'Social Media', 'social-media', 'Active', '2018-12-04 14:55:55', '2018-12-04 14:55:55'),
(40, 'Email Marketing', 'email-marketing', 'Active', '2018-12-04 14:56:15', '2018-12-04 14:56:15'),
(41, 'Planing  Skill', 'planing-skill', 'Active', '2018-12-05 08:35:36', '2018-12-05 08:35:36'),
(42, 'Problem-Solving', 'problem-solving', 'Active', '2018-12-05 08:37:52', '2018-12-05 08:37:52'),
(43, 'Accounting', 'accounting', 'Active', '2018-12-05 08:40:41', '2018-12-05 08:40:41'),
(44, 'Event Planing', 'event-planing', 'Active', '2018-12-06 04:28:41', '2018-12-06 04:28:41'),
(45, 'Payroll Skill', 'payroll-skill', 'Active', '2018-12-06 04:31:42', '2018-12-06 04:31:42'),
(46, 'Decision Making', 'decision-making', 'Active', '2018-12-06 04:33:35', '2018-12-06 04:33:35'),
(47, 'Organizational Skill', 'organizational-skill', 'Active', '2018-12-06 04:34:14', '2018-12-06 04:34:14'),
(48, 'Tax & VAT Skill', 'tax-vat-skill', 'Active', '2018-12-06 04:41:33', '2018-12-06 04:41:33'),
(49, 'Tally', 'tally', 'Active', '2018-12-06 04:41:45', '2018-12-06 04:41:45'),
(50, 'Scheduling', 'scheduling', 'Active', '2018-12-06 04:43:24', '2018-12-06 04:43:24'),
(51, 'Applicant screening', 'applicant-screening', 'Active', '2018-12-06 05:39:03', '2018-12-06 05:39:03'),
(52, 'background Checks', 'background-checks', 'Active', '2018-12-06 05:39:32', '2018-12-06 05:39:32'),
(53, 'Candidate Search', 'candidate-search', 'Active', '2018-12-06 05:40:00', '2018-12-06 05:40:00'),
(54, 'Company Policies', 'company-policies', 'Active', '2018-12-06 05:40:19', '2018-12-06 05:40:19'),
(55, 'Comparable worth', 'comparable-worth', 'Active', '2018-12-06 05:40:52', '2018-12-06 05:40:52'),
(56, 'Interviewing', 'interviewing', 'Active', '2018-12-06 05:41:21', '2018-12-06 05:41:21'),
(57, 'Labor laws', 'labor-laws', 'Active', '2018-12-06 05:41:41', '2018-12-06 05:41:41'),
(58, 'Judgment', 'judgment', 'Active', '2018-12-06 05:41:59', '2018-12-06 05:41:59'),
(59, 'labor relations', 'labor-relations', 'Active', '2018-12-06 05:42:22', '2018-12-06 05:42:22'),
(60, 'Reporting', 'reporting', 'Active', '2018-12-06 05:42:43', '2018-12-06 05:42:43'),
(61, 'Self Confidence', 'self-confidence-1', 'Active', '2018-12-06 05:43:19', '2018-12-06 05:43:19'),
(62, 'Advance Excle', 'advance-excle', 'Active', '2018-12-09 02:44:25', '2018-12-09 02:44:25'),
(63, 'Pivot table', 'pivot-table', 'Active', '2018-12-09 02:44:40', '2018-12-09 02:44:40'),
(64, 'VLOOKUP', 'vlookup', 'Active', '2018-12-09 02:44:57', '2018-12-09 02:44:57'),
(65, 'HLOOKUP', 'hlookup', 'Active', '2018-12-09 02:45:11', '2018-12-09 02:45:11'),
(66, 'Data Management', 'data-management', 'Active', '2018-12-09 02:45:48', '2018-12-09 02:45:48'),
(67, 'bad debt', 'bad-debt', 'Active', '2019-01-19 12:10:17', '2019-01-19 12:10:17'),
(68, 'payment collection', 'payment-collection', 'Active', '2019-01-19 12:10:39', '2019-01-19 12:10:39'),
(69, 'Recovery', 'recovery', 'Active', '2019-01-19 12:11:10', '2019-01-19 12:11:10'),
(70, 'Tactful Multitasking Excellent Client Handling Skills', 'tactful-multitasking-excellent-client-handling-skills', 'Active', '2019-03-03 08:04:37', '2019-03-03 08:04:37'),
(71, 'SEO Friendly', 'seo-friendly', 'Active', '2019-04-15 11:06:30', '2019-04-15 11:06:30'),
(72, 'Vue JS', 'vue-js', 'Active', '2019-05-31 02:57:08', '2019-05-31 02:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `moderator_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive','Blocked','') COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `moderator_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `address`, `phone`, `gender`, `profession`, `education`, `avatar`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin', 'admin@admin.com', '2019-11-25 20:23:10', 'World 123', '9876543211', 'female', 'admin', 'qwertyu', 'public/assets/uploads/users/1576395815Baby.tux.sit-black-800x800.png', 'Active', '$2y$10$.xwTefrSodUf//5v93oaBu00coG/rBmWoPIMg8VWeDhiYlgNmRDFu', NULL, '2019-11-27 08:04:40', '2019-12-17 06:28:46'),
(5, 7, 'Pragyan', 'Shakya', 'pragyan7shakya@gmail.com', '2019-11-27 10:06:50', 'ktm', '0987654321', 'male', 'web developer', 'qwertyuiop asdfghjkl zxcvbnm,.', 'public/assets/uploads/users/157648191774234778_2523725104340973_8498209049928531968_n.png', '', '$2y$10$eoBo3qmhm4DO3YjQ9TvyqeejlCjlJuwRwqqKXzeC2ggAreTgmQTm6', NULL, '2019-11-27 10:05:14', '2020-01-02 04:39:51'),
(6, NULL, 'test', 'test1', 'test@test.com', NULL, 'qwertyuiop', '1234567890', 'male', 'qwdfghjgfdzx sdf asf qweqwe', 'sdf sdf       qweqwe        asfd sdf sdfsd fsdf', 'public/assets/uploads/users/157528072274234778_2523725104340973_8498209049928531968_n.png', 'Active', '$2y$10$asLKazEH3K4KfeVFcr6ZHunyJNPLQLSpFr2bd5TgcHpGkpVSGDq1C', NULL, '2019-12-02 09:58:42', '2020-01-02 04:32:20'),
(7, NULL, 'moderator', 'person', 'moderator1@notice.com', '2020-01-14 18:15:00', 'ktm', '0987654321', 'male', 'moderator', 'Bachelors', NULL, 'Active', '$2y$10$666b9i2Yi3iL1rKOZb6Mo.AnQlz5NFxG/QjtSzQLc0Lb5TSPYZtI.', NULL, '2020-01-01 06:00:52', '2020-01-01 06:00:52'),
(8, 7, 'User', 'Man', 'userman@gmail.com', NULL, 'patan', '1234567890', 'female', 'Developer', 'Masters', NULL, 'Active', '$2y$10$gkbB1z5wL/zvmBzmDF9z5.SRtyF5TTJJ3Mj/.tL10D.V5rTRcuo5a', NULL, '2020-01-02 06:55:01', '2020-01-12 03:56:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_slug_unique` (`slug`),
  ADD KEY `companies_industry_id_foreign` (`industry_id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_companies`
--
ALTER TABLE `contact_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employers_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `industries_slug_unique` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `municipals`
--
ALTER TABLE `municipals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_jobs`
--
ALTER TABLE `queue_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queue_jobs_queue_index` (`queue`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `save_listings`
--
ALTER TABLE `save_listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skills_slug_unique` (`slug`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `contact_companies`
--
ALTER TABLE `contact_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `municipals`
--
ALTER TABLE `municipals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=757;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `queue_jobs`
--
ALTER TABLE `queue_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `save_listings`
--
ALTER TABLE `save_listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`),
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
