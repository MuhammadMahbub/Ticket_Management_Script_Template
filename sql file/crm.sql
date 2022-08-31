-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 06:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `color_settings`
--

CREATE TABLE `color_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_settings`
--

INSERT INTO `color_settings` (`id`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, '#472696', '2022-08-06 23:11:33', '2022-08-06 23:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_char_country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `three_char_country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `two_char_country_name`, `three_char_country_name`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(2, 'Aland Islands', 'AX', 'ALA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(3, 'Albania', 'AL', 'ALB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(4, 'Algeria', 'DZ', 'DZA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(5, 'American Samoa', 'AS', 'ASM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(6, 'Andorra', 'AD', 'AND', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(7, 'Angola', 'AO', 'AGO', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(8, 'Anguilla', 'AI', 'AIA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(9, 'Antarctica', 'AQ', 'ATA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(10, 'Antigua and Barbuda', 'AG', 'ATG', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(11, 'Argentina', 'AR', 'ARG', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(12, 'Armenia', 'AM', 'ARM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(13, 'Aruba', 'AW', 'ABW', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(14, 'Australia', 'AU', 'AUS', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(15, 'Austria', 'AT', 'AUT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(16, 'Azerbaijan', 'AZ', 'AZE', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(17, 'Bahamas', 'BS', 'BHS', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(18, 'Bahrain', 'BH', 'BHR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(19, 'Bangladesh', 'BD', 'BGD', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(20, 'Barbados', 'BB', 'BRB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(21, 'Belarus', 'BY', 'BLR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(22, 'Belgium', 'BE', 'BEL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(23, 'Belize', 'BZ', 'BLZ', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(24, 'Benin', 'BJ', 'BEN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(25, 'Bermuda', 'BM', 'BMU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(26, 'Bhutan', 'BT', 'BTN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(27, 'Bolivia', 'BO', 'BOL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(29, 'Bosnia and Herzegovina', 'BA', 'BIH', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(30, 'Botswana', 'BW', 'BWA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(31, 'Bouvet Island', 'BV', 'BVT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(32, 'Brazil', 'BR', 'BRA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(33, 'British Indian Ocean Territory', 'IO', 'IOT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(34, 'Brunei', 'BN', 'BRN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(35, 'Bulgaria', 'BG', 'BGR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(36, 'Burkina Faso', 'BF', 'BFA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(37, 'Burundi', 'BI', 'BDI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(38, 'Cambodia', 'KH', 'KHM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(39, 'Cameroon', 'CM', 'CMR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(40, 'Canada', 'CA', 'CAN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(41, 'Cape Verde', 'CV', 'CPV', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(42, 'Cayman Islands', 'KY', 'CYM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(43, 'Central African Republic', 'CF', 'CAF', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(44, 'Chad', 'TD', 'TCD', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(45, 'Chile', 'CL', 'CHL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(46, 'China', 'CN', 'CHN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(47, 'Christmas Island', 'CX', 'CXR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(48, 'Cocos (Keeling) Islands', 'CC', 'CCK', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(49, 'Colombia', 'CO', 'COL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(50, 'Comoros', 'KM', 'COM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(51, 'Congo', 'CG', 'COG', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(52, 'Cook Islands', 'CK', 'COK', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(53, 'Costa Rica', 'CR', 'CRI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(54, 'Ivory Coast', 'CI', 'CIV', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(55, 'Croatia', 'HR', 'HRV', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(56, 'Cuba', 'CU', 'CUB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(57, 'Curacao', 'CW', 'CUW', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(58, 'Cyprus', 'CY', 'CYP', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(59, 'Czech Republic', 'CZ', 'CZE', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(60, 'Democratic Republic of the Congo', 'CD', 'COD', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(61, 'Denmark', 'DK', 'DNK', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(62, 'Djibouti', 'DJ', 'DJI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(63, 'Dominica', 'DM', 'DMA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(64, 'Dominican Republic', 'DO', 'DOM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(65, 'Ecuador', 'EC', 'ECU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(66, 'Egypt', 'EG', 'EGY', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(67, 'El Salvador', 'SV', 'SLV', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(68, 'Equatorial Guinea', 'GQ', 'GNQ', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(69, 'Eritrea', 'ER', 'ERI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(70, 'Estonia', 'EE', 'EST', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(71, 'Ethiopia', 'ET', 'ETH', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(72, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(73, 'Faroe Islands', 'FO', 'FRO', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(74, 'Fiji', 'FJ', 'FJI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(75, 'Finland', 'FI', 'FIN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(76, 'France', 'FR', 'FRA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(77, 'French Guiana', 'GF', 'GUF', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(78, 'French Polynesia', 'PF', 'PYF', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(79, 'French Southern Territories', 'TF', 'ATF', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(80, 'Gabon', 'GA', 'GAB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(81, 'Gambia', 'GM', 'GMB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(82, 'Georgia', 'GE', 'GEO', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(83, 'Germany', 'DE', 'DEU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(84, 'Ghana', 'GH', 'GHA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(85, 'Gibraltar', 'GI', 'GIB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(86, 'Greece', 'GR', 'GRC', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(87, 'Greenland', 'GL', 'GRL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(88, 'Grenada', 'GD', 'GRD', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(89, 'Guadaloupe', 'GP', 'GLP', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(90, 'Guam', 'GU', 'GUM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(91, 'Guatemala', 'GT', 'GTM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(92, 'Guernsey', 'GG', 'GGY', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(93, 'Guinea', 'GN', 'GIN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(94, 'Guinea-Bissau', 'GW', 'GNB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(95, 'Guyana', 'GY', 'GUY', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(96, 'Haiti', 'HT', 'HTI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(97, 'Heard Island and McDonald Islands', 'HM', 'HMD', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(98, 'Honduras', 'HN', 'HND', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(99, 'Hong Kong', 'HK', 'HKG', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(100, 'Hungary', 'HU', 'HUN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(101, 'Iceland', 'IS', 'ISL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(102, 'India', 'IN', 'IND', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(103, 'Indonesia', 'ID', 'IDN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(104, 'Iran', 'IR', 'IRN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(105, 'Iraq', 'IQ', 'IRQ', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(106, 'Ireland', 'IE', 'IRL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(107, 'Isle of Man', 'IM', 'IMN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(108, 'Israel', 'IL', 'ISR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(109, 'Italy', 'IT', 'ITA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(110, 'Jamaica', 'JM', 'JAM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(111, 'Japan', 'JP', 'JPN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(112, 'Jersey', 'JE', 'JEY', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(113, 'Jordan', 'JO', 'JOR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(114, 'Kazakhstan', 'KZ', 'KAZ', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(115, 'Kenya', 'KE', 'KEN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(116, 'Kiribati', 'KI', 'KIR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(117, 'Kosovo', 'XK', '---', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(118, 'Kuwait', 'KW', 'KWT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(119, 'Kyrgyzstan', 'KG', 'KGZ', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(120, 'Laos', 'LA', 'LAO', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(121, 'Latvia', 'LV', 'LVA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(122, 'Lebanon', 'LB', 'LBN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(123, 'Lesotho', 'LS', 'LSO', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(124, 'Liberia', 'LR', 'LBR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(125, 'Libya', 'LY', 'LBY', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(126, 'Liechtenstein', 'LI', 'LIE', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(127, 'Lithuania', 'LT', 'LTU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(128, 'Luxembourg', 'LU', 'LUX', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(129, 'Macao', 'MO', 'MAC', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(130, 'Macedonia', 'MK', 'MKD', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(131, 'Madagascar', 'MG', 'MDG', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(132, 'Malawi', 'MW', 'MWI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(133, 'Malaysia', 'MY', 'MYS', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(134, 'Maldives', 'MV', 'MDV', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(135, 'Mali', 'ML', 'MLI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(136, 'Malta', 'MT', 'MLT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(137, 'Marshall Islands', 'MH', 'MHL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(138, 'Martinique', 'MQ', 'MTQ', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(139, 'Mauritania', 'MR', 'MRT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(140, 'Mauritius', 'MU', 'MUS', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(141, 'Mayotte', 'YT', 'MYT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(142, 'Mexico', 'MX', 'MEX', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(143, 'Micronesia', 'FM', 'FSM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(144, 'Moldava', 'MD', 'MDA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(145, 'Monaco', 'MC', 'MCO', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(146, 'Mongolia', 'MN', 'MNG', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(147, 'Montenegro', 'ME', 'MNE', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(148, 'Montserrat', 'MS', 'MSR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(149, 'Morocco', 'MA', 'MAR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(150, 'Mozambique', 'MZ', 'MOZ', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(151, 'Myanmar (Burma)', 'MM', 'MMR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(152, 'Namibia', 'NA', 'NAM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(153, 'Nauru', 'NR', 'NRU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(154, 'Nepal', 'NP', 'NPL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(155, 'Netherlands', 'NL', 'NLD', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(156, 'New Caledonia', 'NC', 'NCL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(157, 'New Zealand', 'NZ', 'NZL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(158, 'Nicaragua', 'NI', 'NIC', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(159, 'Niger', 'NE', 'NER', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(160, 'Nigeria', 'NG', 'NGA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(161, 'Niue', 'NU', 'NIU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(162, 'Norfolk Island', 'NF', 'NFK', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(163, 'North Korea', 'KP', 'PRK', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(164, 'Northern Mariana Islands', 'MP', 'MNP', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(165, 'Norway', 'NO', 'NOR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(166, 'Oman', 'OM', 'OMN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(167, 'Pakistan', 'PK', 'PAK', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(168, 'Palau', 'PW', 'PLW', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(169, 'Palestine', 'PS', 'PSE', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(170, 'Panama', 'PA', 'PAN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(171, 'Papua New Guinea', 'PG', 'PNG', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(172, 'Paraguay', 'PY', 'PRY', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(173, 'Peru', 'PE', 'PER', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(174, 'Phillipines', 'PH', 'PHL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(175, 'Pitcairn', 'PN', 'PCN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(176, 'Poland', 'PL', 'POL', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(177, 'Portugal', 'PT', 'PRT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(178, 'Puerto Rico', 'PR', 'PRI', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(179, 'Qatar', 'QA', 'QAT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(180, 'Reunion', 'RE', 'REU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(181, 'Romania', 'RO', 'ROU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(182, 'Russia', 'RU', 'RUS', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(183, 'Rwanda', 'RW', 'RWA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(184, 'Saint Barthelemy', 'BL', 'BLM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(185, 'Saint Helena', 'SH', 'SHN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(186, 'Saint Kitts and Nevis', 'KN', 'KNA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(187, 'Saint Lucia', 'LC', 'LCA', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(188, 'Saint Martin', 'MF', 'MAF', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(189, 'Saint Pierre and Miquelon', 'PM', 'SPM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(190, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(191, 'Samoa', 'WS', 'WSM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(192, 'San Marino', 'SM', 'SMR', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(193, 'Sao Tome and Principe', 'ST', 'STP', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(194, 'Saudi Arabia', 'SA', 'SAU', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(195, 'Senegal', 'SN', 'SEN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(196, 'Serbia', 'RS', 'SRB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(197, 'Seychelles', 'SC', 'SYC', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(198, 'Sierra Leone', 'SL', 'SLE', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(199, 'Singapore', 'SG', 'SGP', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(200, 'Sint Maarten', 'SX', 'SXM', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(201, 'Slovakia', 'SK', 'SVK', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(202, 'Slovenia', 'SI', 'SVN', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(203, 'Solomon Islands', 'SB', 'SLB', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(204, 'Somalia', 'SO', 'SOM', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(205, 'South Africa', 'ZA', 'ZAF', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(206, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(207, 'South Korea', 'KR', 'KOR', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(208, 'South Sudan', 'SS', 'SSD', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(209, 'Spain', 'ES', 'ESP', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(210, 'Sri Lanka', 'LK', 'LKA', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(211, 'Sudan', 'SD', 'SDN', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(212, 'Suriname', 'SR', 'SUR', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(213, 'Svalbard and Jan Mayen', 'SJ', 'SJM', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(214, 'Swaziland', 'SZ', 'SWZ', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(215, 'Sweden', 'SE', 'SWE', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(216, 'Switzerland', 'CH', 'CHE', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(217, 'Syria', 'SY', 'SYR', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(218, 'Taiwan', 'TW', 'TWN', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(219, 'Tajikistan', 'TJ', 'TJK', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(220, 'Tanzania', 'TZ', 'TZA', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(221, 'Thailand', 'TH', 'THA', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(222, 'Timor-Leste (East Timor)', 'TL', 'TLS', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(223, 'Togo', 'TG', 'TGO', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(224, 'Tokelau', 'TK', 'TKL', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(225, 'Tonga', 'TO', 'TON', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(226, 'Trinidad and Tobago', 'TT', 'TTO', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(227, 'Tunisia', 'TN', 'TUN', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(228, 'Turkey', 'TR', 'TUR', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(229, 'Turkmenistan', 'TM', 'TKM', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(230, 'Turks and Caicos Islands', 'TC', 'TCA', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(231, 'Tuvalu', 'TV', 'TUV', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(232, 'Uganda', 'UG', 'UGA', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(233, 'Ukraine', 'UA', 'UKR', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(234, 'United Arab Emirates', 'AE', 'ARE', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(235, 'United Kingdom', 'GB', 'GBR', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(236, 'United States', 'US', 'USA', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(237, 'United States Minor Outlying Islands', 'UM', 'UMI', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(238, 'Uruguay', 'UY', 'URY', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(239, 'Uzbekistan', 'UZ', 'UZB', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(240, 'Vanuatu', 'VU', 'VUT', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(241, 'Vatican City', 'VA', 'VAT', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(242, 'Venezuela', 'VE', 'VEN', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(243, 'Vietnam', 'VN', 'VNM', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(244, 'Virgin Islands, British', 'VG', 'VGB', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(245, 'Virgin Islands, US', 'VI', 'VIR', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(246, 'Wallis and Futuna', 'WF', 'WLF', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(247, 'Western Sahara', 'EH', 'ESH', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(248, 'Yemen', 'YE', 'YEM', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(249, 'Zambia', 'ZM', 'ZMB', '2022-08-06 23:11:34', '2022-08-06 23:11:34'),
(250, 'Zimbabwe', 'ZW', 'ZWE', '2022-08-06 23:11:34', '2022-08-06 23:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', '[\"2\"]', 2, '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(2, 'Web Development', '[\"2\"]', 2, '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(3, 'Graphics Design', NULL, NULL, '2022-08-06 23:11:32', '2022-08-06 23:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', '2022-08-06 23:11:33', '2022-08-06 23:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `login_pages`
--

CREATE TABLE `login_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_subtitle` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_pages`
--

INSERT INTO `login_pages` (`id`, `title`, `subtitle`, `img_title`, `img_subtitle`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Login to Support Ticket System', 'if you are registered user, then press your valid email address and password.', 'WelCome To Support Ticketing System', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'login.svg', '2022-08-06 23:11:33', '2022-08-06 23:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_02_015444_create_sessions_table', 1),
(7, '2022_06_03_120408_create_user_roles_table', 1),
(8, '2022_06_03_123206_create_priorities_table', 1),
(9, '2022_06_03_132114_create_statuses_table', 1),
(10, '2022_06_04_091028_create_tickets_table', 1),
(11, '2022_06_04_091228_create_departments_table', 1),
(12, '2022_06_07_071339_create_navigations_table', 1),
(13, '2022_06_10_123323_create_ticket_replies_table', 1),
(14, '2022_06_25_113555_create_socialites_table', 1),
(15, '2022_06_27_111048_create_login_pages_table', 1),
(16, '2022_06_27_111707_create_register_pages_table', 1),
(17, '2022_06_29_132728_create_color_settings_table', 1),
(18, '2022_06_29_153837_create_general_settings_table', 1),
(19, '2022_07_02_091108_create_notifications_table', 1),
(20, '2022_08_04_231859_create_countries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`id`, `name`, `icon`, `route`, `created_at`, `updated_at`) VALUES
(1, 'Tickets', '<i class=\"fa-solid fa-ticket\"></i>', 'ticket.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(2, 'User Role', '<i class=\"fa-solid fa-person-circle-plus\"></i>', 'user_role.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(3, 'Users', '<i class=\"fa-solid fa-users\"></i>', 'users.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(4, 'Priority', '<i class=\"fa-solid fa-ranking-star\"></i>', 'priority.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(5, 'Status', '<i class=\"fa-solid fa-signal\"></i>', 'status.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(6, 'Departments', '<i class=\"fa-solid fa-building-user\"></i>', 'department.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(7, 'Update Language', '<i class=\"fa-solid fa-edit\"></i>', 'lang_edit', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(8, 'Download Json File', '<i class=\"fa-solid fa-download\"></i>', 'json_file_download', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(9, 'Register Page', '<i class=\"fa-solid fa-registered\"></i>', 'register_page.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(10, 'Login Page', '<i class=\"fa-solid fa-arrow-right-to-bracket\"></i>', 'login_page.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(11, 'Navigation', '<i class=\"fa-solid fa-bars\"></i>', 'navigation.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(12, 'Color Settings', '<i class=\"fa-solid fa-fill-drip\"></i>', 'colorSettings.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(13, 'General Settings', '<i class=\"fa-solid fa-font-awesome\"></i>', 'generalSettings.index', '2022-08-06 23:11:33', '2022-08-06 23:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `assign_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `notify_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'High', '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(2, 'Medium', '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(3, 'Low', '2022-08-06 23:11:32', '2022-08-06 23:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `register_pages`
--

CREATE TABLE `register_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_subtitle` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_pages`
--

INSERT INTO `register_pages` (`id`, `title`, `subtitle`, `img_title`, `img_subtitle`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Register to Support Ticket System', 'if you are not registerd user, then please enter your valid information for registration.', 'WelCome To Support Ticketing System', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'register.svg', '2022-08-06 23:11:33', '2022-08-06 23:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Pd5IT9ek3WUUQ9E956e65G6a4AfM8j0errVcCp4D', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.108 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZVN5RVlZNVhHVzNTOXBPNmhVelVUQnRBUGlkZ2g5cTRNSUcwQ01VWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1659933794),
('xEvd78uEBfFxXW7QotvZGvyzxQQnqZtqKrSPqkeM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.108 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNGMzU2dlQk5QdDY4VGJXSWlLcFN5QlhYVml5aTBnZThxNWJsQVJOaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1659933677);

-- --------------------------------------------------------

--
-- Table structure for table `socialites`
--

CREATE TABLE `socialites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialites`
--

INSERT INTO `socialites` (`id`, `client_id`, `client_secret`, `redirect`, `created_at`, `updated_at`) VALUES
(1, '336697325185-ekp18n4juphj2g8ksg444mbi9b79q7ns.apps.googleusercontent.com', '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', 'http://localhost:8000/google/callback', '2022-08-06 23:11:33', '2022-08-06 23:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Open\"}', '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(2, '{\"en\":\"Pending\"}', '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(3, '{\"en\":\"Closed\"}', '2022-08-06 23:11:32', '2022-08-06 23:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` int(11) DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `ticket_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `customer`, `subject`, `department`, `status`, `priority`, `ticket_body`, `agent_id`, `creator`, `expire_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'seeder problem', NULL, 1, NULL, 'seeder not working! fixed this issue as soon as possible mahabub vai!', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(2, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(3, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(4, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(5, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(6, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(7, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(8, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(9, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(10, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(11, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(12, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(13, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(14, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(15, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(16, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(17, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 3, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(18, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(19, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:15', '2022-08-06 23:51:15', NULL),
(20, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(21, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(22, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(23, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(24, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(25, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(26, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(27, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(28, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:15', NULL),
(29, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:15', '2022-08-06 23:51:16', NULL),
(30, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:16', '2022-08-06 23:51:16', NULL),
(31, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:16', '2022-08-06 23:51:16', NULL),
(32, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:16', '2022-08-06 23:51:16', NULL),
(33, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:16', '2022-08-06 23:51:16', NULL),
(34, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-07 23:51:16', '2022-08-06 23:51:16', NULL),
(35, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(36, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(37, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(38, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(39, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(40, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(41, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(42, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(43, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(44, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(45, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(46, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(47, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(48, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(49, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-08 23:51:16', '2022-08-06 23:51:16', NULL),
(50, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(51, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(52, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(53, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(54, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(55, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(56, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(57, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(58, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(59, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(60, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(61, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(62, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(63, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(64, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(65, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(66, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(67, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-09 23:51:16', '2022-08-06 23:51:16', NULL),
(68, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(69, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(70, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(71, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(72, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(73, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(74, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(75, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(76, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(77, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(78, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(79, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(80, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(81, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(82, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-10 23:51:16', '2022-08-06 23:51:16', NULL),
(83, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(84, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(85, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(86, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(87, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(88, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(89, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(90, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(91, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(92, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(93, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(94, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(95, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(96, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(97, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(98, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(99, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(100, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-11 23:51:16', '2022-08-06 23:51:16', NULL),
(101, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(102, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(103, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(104, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(105, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(106, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(107, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(108, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(109, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(110, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(111, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(112, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(113, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(114, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(115, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(116, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(117, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(118, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(119, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-12 23:51:16', '2022-08-06 23:51:16', NULL),
(120, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(121, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(122, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(123, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(124, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(125, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(126, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(127, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(128, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(129, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(130, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-13 23:51:16', '2022-08-06 23:51:16', NULL),
(131, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(132, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(133, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(134, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(135, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(136, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(137, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(138, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(139, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(140, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(141, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(142, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(143, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-14 23:51:16', '2022-08-06 23:51:16', NULL),
(144, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(145, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(146, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(147, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(148, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(149, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(150, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(151, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(152, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(153, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(154, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(155, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(156, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(157, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(158, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(159, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(160, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(161, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(162, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(163, 3, 'design issue', NULL, 1, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(164, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(165, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(166, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(167, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(168, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(169, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(170, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(171, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(172, 3, 'design issue', NULL, 3, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-16 23:51:16', '2022-08-06 23:51:16', NULL),
(173, 3, 'design issue', NULL, 2, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:16', '2022-08-06 23:51:16', NULL),
(174, 3, 'design issue', NULL, 2, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:16', '2022-08-06 23:51:16', NULL),
(175, 3, 'design issue', NULL, 2, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:16', '2022-08-06 23:51:16', NULL),
(176, 3, 'design issue', NULL, 2, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:16', '2022-08-06 23:51:16', NULL),
(177, 3, 'design issue', NULL, 2, NULL, 'solve this issue', NULL, 2, NULL, '2022-08-06 23:51:16', '2022-08-06 23:51:16', NULL),
(178, 3, 'rrrrr', NULL, 2, NULL, 'Aaaaaa', NULL, 2, NULL, '2022-08-05 23:51:16', '2022-08-06 23:51:16', NULL),
(179, 3, 'rrrrr', NULL, 2, NULL, 'Aaaaaa', NULL, 2, NULL, '2022-08-05 23:51:16', '2022-08-06 23:51:16', NULL),
(180, 3, 'rrrrr', NULL, 2, NULL, 'Aaaaaa', NULL, 2, NULL, '2022-08-05 23:51:16', '2022-08-06 23:51:16', NULL),
(181, 3, 'rrrrr', NULL, 2, NULL, 'Aaaaaa', NULL, 2, NULL, '2022-08-05 23:51:16', '2022-08-06 23:51:16', NULL),
(182, 3, 'rrrrr', NULL, 2, NULL, 'Aaaaaa', NULL, 2, NULL, '2022-08-05 23:51:16', '2022-08-06 23:51:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Laravel bug fixing problem please fix it!', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(2, 1, 1, 'it\'s ok! Your problem is very important to us! Will be transferred to an agent very soon. Thanks!', '2022-08-06 23:11:33', '2022-08-06 23:11:33'),
(3, 1, 2, 'Your problem is solved! ticket is closed...', '2022-08-06 23:11:33', '2022-08-06 23:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT 3,
  `permission` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `country_id`, `phone`, `role_id`, `permission`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `google_id`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 19, '01868752464', 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\"]', 'admin@admin.com', NULL, '$2y$10$8sY.Qw2STBLyAlczh6v5beCdnvu/.A1HyBy0y.MMd6oFFlwkKpdMe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(2, 'Agent', 19, '01868752464', 2, '[\"1\"]', 'agent@agent.com', NULL, '$2y$10$bGt1zLJRCuhHdeQqrZbUxOJ4mUbpn8ri96pzWiEZ3IGGeuXrJIn2C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(3, 'Customer', 19, '01868752464', 3, '[\"1\"]', 'customer@customer.com', NULL, '$2y$10$JOMCXHst9.1bZhcEjNsuvemVrht8.S2ITl8/VX/L/Gy33rwkyLoCi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-06 23:11:32', '2022-08-06 23:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\"]', '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(2, 'Agent', '[\"1\"]', '2022-08-06 23:11:32', '2022-08-06 23:11:32'),
(3, 'Customer', '[\"1\"]', '2022-08-06 23:11:32', '2022-08-06 23:11:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color_settings`
--
ALTER TABLE `color_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_pages`
--
ALTER TABLE `login_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_pages`
--
ALTER TABLE `register_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `socialites`
--
ALTER TABLE `socialites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color_settings`
--
ALTER TABLE `color_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_pages`
--
ALTER TABLE `login_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register_pages`
--
ALTER TABLE `register_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socialites`
--
ALTER TABLE `socialites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
