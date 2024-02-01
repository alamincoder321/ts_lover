-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2024 at 05:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saif`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_coin` int NOT NULL,
  `package_days` int NOT NULL,
  `package_percentage` double(8,2) NOT NULL,
  `limit_gain_coin` double NOT NULL,
  `total_gain_coin` double NOT NULL,
  `last_day_gain_coin` double NOT NULL,
  `have_days` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `referral_number` int DEFAULT NULL,
  `invest_coin` int NOT NULL DEFAULT '0',
  `referral_account_id` bigint DEFAULT NULL,
  `withdrawable_balance` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `first_name`, `last_name`, `image`, `username`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Leonard', 'Bourne', '65b0b2b4cfa6d.png', 'admin', 'leonardbourne@com.com', '$2y$10$7rcuMv8LG9adF09JnRjt.O35YL/3dkFWA7EBhBT.LOZvS07OaeDFm', 1, NULL, '2024-01-24 00:48:20'),
(8, 4, 'Tallulah', 'admin', '65b0b212253b1.png', 'admin55', 'saif109152@gmail.com', '$2y$10$SjwwOH5c7NNMT.hzzAfNJe3ZyRIwIbhSdFfcbut8V1H.b2Yo/4WeG', 1, '2024-01-24 00:45:38', '2024-01-24 00:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `uniqid` int UNSIGNED NOT NULL DEFAULT '12345',
  `favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `theme_version` smallint UNSIGNED NOT NULL,
  `base_currency_symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `base_currency_symbol_position` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `base_currency_text` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `base_currency_text_position` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `base_currency_rate` decimal(8,2) DEFAULT NULL,
  `primary_color` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `secondary_color` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `breadcrumb_overlay_color` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `breadcrumb_overlay_opacity` decimal(4,2) DEFAULT NULL,
  `smtp_status` tinyint DEFAULT NULL,
  `smtp_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `smtp_port` int DEFAULT NULL,
  `encryption` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `smtp_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `smtp_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `from_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `from_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `to_mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `breadcrumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `disqus_status` tinyint UNSIGNED DEFAULT NULL,
  `disqus_short_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_recaptcha_status` tinyint DEFAULT NULL,
  `google_recaptcha_site_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_recaptcha_secret_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `whatsapp_status` tinyint UNSIGNED DEFAULT NULL,
  `whatsapp_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `whatsapp_header_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `whatsapp_popup_status` tinyint UNSIGNED DEFAULT NULL,
  `whatsapp_popup_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `maintenance_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `maintenance_status` tinyint DEFAULT NULL,
  `maintenance_msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `bypass_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `footer_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `footer_background_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `admin_theme_version` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'light',
  `notification_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hero_section_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_section_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `counter_section_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `call_to_action_section_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_adsense_publisher_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `equipment_tax_amount` decimal(5,2) UNSIGNED DEFAULT NULL,
  `product_tax_amount` decimal(5,2) UNSIGNED DEFAULT NULL,
  `self_pickup_status` tinyint UNSIGNED DEFAULT NULL,
  `two_way_delivery_status` tinyint UNSIGNED DEFAULT NULL,
  `guest_checkout_status` tinyint UNSIGNED NOT NULL,
  `facebook_login_status` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '1 -> enable, 0 -> disable',
  `facebook_app_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook_app_secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_login_status` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '1 -> enable, 0 -> disable',
  `google_client_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_client_secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tawkto_status` tinyint UNSIGNED NOT NULL COMMENT '1 -> enable, 0 -> disable',
  `tawkto_direct_chat_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vendor_admin_approval` int NOT NULL DEFAULT '0' COMMENT '1 active, 2 deactive',
  `vendor_email_verification` int NOT NULL DEFAULT '0' COMMENT '1 active, 2 deactive',
  `admin_approval_notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `today_gain` double NOT NULL DEFAULT '0',
  `minimum_withdraw` double NOT NULL DEFAULT '1',
  `referral_doller` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `uniqid`, `favicon`, `logo`, `website_title`, `email_address`, `contact_number`, `address`, `theme_version`, `base_currency_symbol`, `base_currency_symbol_position`, `base_currency_text`, `base_currency_text_position`, `base_currency_rate`, `primary_color`, `secondary_color`, `breadcrumb_overlay_color`, `breadcrumb_overlay_opacity`, `smtp_status`, `smtp_host`, `smtp_port`, `encryption`, `smtp_username`, `smtp_password`, `from_mail`, `from_name`, `to_mail`, `breadcrumb`, `disqus_status`, `disqus_short_name`, `google_recaptcha_status`, `google_recaptcha_site_key`, `google_recaptcha_secret_key`, `whatsapp_status`, `whatsapp_number`, `whatsapp_header_title`, `whatsapp_popup_status`, `whatsapp_popup_message`, `maintenance_img`, `maintenance_status`, `maintenance_msg`, `bypass_token`, `footer_logo`, `footer_background_image`, `admin_theme_version`, `notification_image`, `hero_section_image`, `about_section_image`, `counter_section_image`, `call_to_action_section_image`, `google_adsense_publisher_id`, `equipment_tax_amount`, `product_tax_amount`, `self_pickup_status`, `two_way_delivery_status`, `guest_checkout_status`, `facebook_login_status`, `facebook_app_id`, `facebook_app_secret`, `google_login_status`, `google_client_id`, `google_client_secret`, `tawkto_status`, `tawkto_direct_chat_link`, `vendor_admin_approval`, `vendor_email_verification`, `admin_approval_notice`, `today_gain`, `minimum_withdraw`, `referral_doller`) VALUES
(2, 12345, '63b179e50da26.png', '63b166ec32c45.png', 'MultiRent', 'multirent@example.com', '+701 - 1111 - 2222 - 3333', '450 Young Road, New York, USA', 1, '$', 'left', 'USD', 'right', 1.00, '2', '1', '1', 1.00, 1, 'smtp.gmail.com', 587, 'TLS', 'geniustest11@gmail.com', 'jvpdiafcjhrznkbm', 'geniustest11@gmail.com', 'MultiRent', 'dd@gmail.com', '63b1770c9a255.png', 0, 'coursela', 1, '6LeJdwEbAAAAAMTYn_I2GN0iLSa25ja1GG30YZsZ', '6LeJdwEbAAAAAOG9wjJGyLk6BVh-X513O6GNtqLb', 0, '18046101470', 'Hi, there!', 1, 'If you have any issues, let us know.', '65b0e2363191c.png', 1, 'We are upgrading our site. We will come back soon. \r\nPlease stay with us.\r\nThank you.', 'fahad', '63b1670a68e5e.png', '61d28294c1b35.jpg', 'dark', '65b0ed9fb5b5a.png', '63b17947d2ed5.png', '63b178e72080d.png', '61cc4638ddd1e.jpg', '61cda1a624896.jpg', NULL, 10.00, 5.00, 1, 1, 1, 0, '997931780909470', '1e682e69883190ba4e0a1e2eda634c2e', 0, '820299140458-4dojqiuq0seg72417f31pb34jdku95e2.apps.googleusercontent.com', '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', 1, 'https://tawk.to/chat/6304bda537898912e964a4b5/1gb589l4i', 1, 0, 'Your account is deactivated or pending now please get in touch with admin.', 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cookie_alerts`
--

CREATE TABLE `cookie_alerts` (
  `id` bigint UNSIGNED NOT NULL,
  `cookie_alert_status` tinyint UNSIGNED NOT NULL,
  `cookie_alert_btn_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_alert_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cookie_alerts`
--

INSERT INTO `cookie_alerts` (`id`, `cookie_alert_status`, `cookie_alert_btn_text`, `cookie_alert_text`, `created_at`, `updated_at`) VALUES
(1, 1, 'ss', 'lorem', '2021-06-02 06:25:54', '2024-01-24 04:21:14'),
(2, 1, 'I Agree', 'We use cookies to give you the best online experience.\r\nBy continuing to browse the site you are agreeing to our use of cookies.', '2021-08-29 04:20:43', '2022-10-04 05:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `gain_histroys`
--

CREATE TABLE `gain_histroys` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` bigint NOT NULL,
  `previous_gain_coin` double NOT NULL,
  `today_gain_coin` double NOT NULL,
  `present_gain_coin` double NOT NULL,
  `today_interest_rate` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint UNSIGNED NOT NULL,
  `endpoint` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` tinyint NOT NULL,
  `is_default` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `direction`, `is_default`, `created_at`, `updated_at`) VALUES
(8, 'English', 'en', 0, 1, '2021-05-31 05:58:22', '2022-08-01 00:57:24'),
(13, 'Japani', 'jp', 0, 0, '2024-01-16 12:33:54', '2024-01-16 12:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE `mail_templates` (
  `id` bigint NOT NULL,
  `mail_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail_subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail_body` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mail_templates`
--

INSERT INTO `mail_templates` (`id`, `mail_type`, `mail_subject`, `mail_body`) VALUES
(4, 'verify_email', 'Verify Your Email Address', 0x3c703e4869c2a07b757365726e616d657d2c3c2f703e3c703e5765206e65656420746f2076657269667920796f757220656d61696c2061646472657373206265666f726520796f752063616e2061636365737320796f75722064617368626f6172642e3c2f703e3c703e506c656173652076657269667920796f757220656d61696c2061646472657373206279207669736974696e6720746865206c696e6b2062656c6f773a203c6272202f3e7b766572696669636174696f6e5f6c696e6b7d2e3c2f703e3c703e5468616e6b20796f752e3c6272202f3e7b776562736974655f7469746c657d3c2f703e),
(5, 'reset_password', 'Recover Password of Your Account', 0x3c703e4869207b637573746f6d65725f6e616d657d2c3c2f703e3c703e576520686176652072656365697665642061207265717565737420746f20726573657420796f75722070617373776f72642e20496620796f7520646964206e6f74206d616b652074686520726571756573742c2069676e6f7265207468697320656d61696c2e204f74686572776973652c20796f752063616e20726573657420796f75722070617373776f7264207573696e67207468652062656c6f77206c696e6b2e3c2f703e3c703e7b70617373776f72645f72657365745f6c696e6b7d3c2f703e3c703e5468616e6b732c3c6272202f3e7b776562736974655f7469746c657d3c2f703e),
(9, 'product_order', 'Product Order Has Been Placed', 0x3c703e4869c2a07b637573746f6d65725f6e616d657d2c3c2f703e3c703e596f7572206f7264657220686173206265656e20706c61636564207375636365737366756c6c792e205765206861766520617474616368656420616e20696e766f69636520746f2074686973206d61696c2e3c6272202f3e4f72646572204e6f3a20237b6f726465725f6e756d6265727d2e20546865207472616e73616374696f6e2069642069733a207b7472616e73616374696f6e5f69647d2e3c2f703e3c703e7b6f726465725f6c696e6b7d3c6272202f3e3c2f703e3c703e4265737420726567617264732e3c6272202f3e7b776562736974655f7469746c657d3c2f703e),
(10, 'equipment_booking', 'Confirmation of Equipment Booking', 0x3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e4869207b637573746f6d65725f6e616d657d2c3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e5468697320656d61696c20697320746f20636f6e6669726d20796f757220626f6f6b696e6720237b626f6f6b696e675f6e756d6265727d206f6e207b626f6f6b696e675f646174657d20666f72c2a0207b65717569706d656e745f6e616d657d2e2054686520626f6f6b696e672073746172742064617465207368616c6c206265206f6e207b73746172745f646174657d20616e642074686520626f6f6b696e6720656e642064617465207368616c6c206265206f6e207b656e645f646174657d2e20546865207472616e73616374696f6e206964206973207b7472616e73616374696f6e5f69647d2e3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e7b626f6f6b696e675f6c696e6b7d3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e7b76656e646f725f64657461696c735f6c696e6b7d3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e5765206861766520616c736f20617474616368656420616e20696e766f69636520746f2074686973206d61696c2e20496620796f75206861766520616e7920696e717569726965732c20706c6561736520646f6e277420686573697461746520746f20636f6e746163742075732e3c6272202f3e3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e4265737420526567617264732e3c6272202f3e7b776562736974655f7469746c657d3c2f703e),
(11, 'withdraw_approve', 'Confirmation of Withdraw Approve', 0x3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e4869207b76656e646f725f757365726e616d657d2c3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e5468697320656d61696c20636f6e6669726d73207468617420796f7572207769746864726177616c2072657175657374c2a0207b77697468647261775f69647d20697320617070726f7665642ec2a03c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e596f75722063757272656e742062616c616e6365206973207b63757272656e745f62616c616e63657d2c20776974686472617720616d6f756e74207b77697468647261775f616d6f756e747d2c20636861726765203a207b6368617267657d2c70617961626c6520616d6f756e74207b70617961626c655f616d6f756e747d3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e7769746864726177206d6574686f64203ac2a07b77697468647261775f6d6574686f647d2e20546865207472616e73616374696f6e206964206973207b7472616e73616374696f6e5f69647d2e3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e3c6272202f3e3c2f703e3c70207374796c653d22666f6e742d66616d696c793a4c61746f2c2073616e732d73657269663b666f6e742d73697a653a313470783b6c696e652d6865696768743a312e38323b636f6c6f723a72676228302c302c30293b666f6e742d7374796c653a6e6f726d616c3b666f6e742d7765696768743a3430303b746578742d616c69676e3a6c6566743b223e4265737420526567617264732e3c6272202f3e7b776562736974655f7469746c657d3c2f703e),
(13, 'withdraw_rejected', 'Withdraw Request Rejected', 0x3c703e4869207b76656e646f725f757365726e616d657d2c3c2f703e3c703e5468697320656d61696c20636f6e6669726d73207468617420796f7572207769746864726177616c2072657175657374c2a0207b77697468647261775f69647d2069732072656a656374656420616e64207468652062616c616e636520616464656420746f20796f7572206163636f756e742ec2a03c2f703e3c703e596f75722063757272656e742062616c616e6365206973207b63757272656e745f62616c616e63657d3c2f703e3c703e3c6272202f3e3c2f703e3c703e4265737420526567617264732e3c6272202f3e7b776562736974655f7469746c657d3c2f703e),
(14, 'balance_add', 'Balance Add', 0x3c703e4869207b757365726e616d657d3c2f703e3c703e7b616d6f756e747d20616464656420746f20796f7572206163636f756e742e3c2f703e3c703e596f75722063757272656e742062616c616e6365206973207b63757272656e745f62616c616e63657d2ec2a03c2f703e3c703e546865207472616e73616374696f6e206964206973207b7472616e73616374696f6e5f69647d2e3c6272202f3e3c2f703e3c703e3c6272202f3e3c2f703e3c703e4265737420526567617264732e3c6272202f3e7b776562736974655f7469746c657d3c6272202f3e3c2f703e),
(15, 'balance_subtract', 'Balance Subtract', 0x3c703e4869207b757365726e616d657d3c2f703e3c703e7b616d6f756e747d2073756274726163742066726f6d20796f7572206163636f756e742e3c2f703e3c703e596f75722063757272656e742062616c616e6365206973207b63757272656e745f62616c616e63657d2e3c2f703e3c703e546865207472616e73616374696f6e206964206973207b7472616e73616374696f6e5f69647d2e3c6272202f3e3c2f703e3c703e3c6272202f3e3c2f703e3c703e4265737420526567617264732e3c6272202f3e7b776562736974655f7469746c657d3c2f703e),
(16, 'security_deposit_refund', 'Security Deposit Refund', 0x3c703e3c7370616e207374796c653d22636f6c6f723a7267622833342c33342c3334293b666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b666f6e742d73697a653a736d616c6c3b223e4869207b757365726e616d657d2c3c2f7370616e3e3c6272202f3e3c6272202f3e3c7370616e207374796c653d22636f6c6f723a7267622833342c33342c3334293b666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b666f6e742d73697a653a736d616c6c3b223e5468697320656d61696c20697320746f206e6f7469667920746865207365637572697479206465706f73697420726566756e6420737461747573206f6620796f75722065717569706d656e7420626f6f6b696e672e3c2f7370616e3e3c2f703e3c70207374796c653d22636f6c6f723a7267622833342c33342c3334293b666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b666f6e742d73697a653a736d616c6c3b223e45717569706d656e74204e616d653a207b65717569706d656e745f6e616d657d3c2f703e3c70207374796c653d22636f6c6f723a7267622833342c33342c3334293b666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b666f6e742d73697a653a736d616c6c3b223e426f6f6b696e672049643a207b626f6f6b696e675f6e756d6265727d3c2f703e3c70207374796c653d22636f6c6f723a7267622833342c33342c3334293b666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b666f6e742d73697a653a736d616c6c3b223e5365637572697479204465706f73697420526566756e6420547970653a207b726566756e645f747970657d3c2f703e3c70207374796c653d22636f6c6f723a7267622833342c33342c3334293b666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b666f6e742d73697a653a736d616c6c3b223e54686520726566756e6420616d6f756e742069733a207b616d6f756e747d2e3c2f703e3c70207374796c653d22636f6c6f723a7267622833342c33342c3334293b666f6e742d66616d696c793a417269616c2c2048656c7665746963612c2073616e732d73657269663b666f6e742d73697a653a736d616c6c3b223e41637475616c205365637572697479204465706f73697420416d6f756e74203a207b61637475616c5f73656375726974795f6465706f7369745f616d6f756e747d3c6272202f3e3c2f703e);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_10_30_171446_create_packages_table', 1),
(2, '2023_11_02_180347_add_coloumn_to_user', 1),
(3, '2023_11_02_185504_create_accounts_table', 2),
(4, '2023_11_02_191322_create_gain_histroys_table', 2),
(5, '2023_11_05_161829_add_column_to_accounts', 2),
(6, '2023_11_05_174940_change_column_accounts', 2),
(7, '2023_11_07_125424_create_with_draw_money_table', 2),
(8, '2023_11_09_161843_add_column_to_user_besic_settings', 2),
(9, '2023_11_12_162708_add_column_refferal_number', 2),
(10, '2023_11_12_184728_add_colun_to_invest_coin', 2),
(11, '2023_11_17_050558_add_column_to_withdrawable_balance', 3),
(12, '2023_11_17_054942_create_payment_requests_table', 3),
(13, '2024_01_26_140016_create_package_contents_table', 4),
(14, '2024_01_27_165415_create_recharge_packages_table', 5),
(15, '2024_01_27_170241_create_recharge_package_contents_table', 5),
(16, '2024_01_28_184228_add_column_to_users', 6);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `doller` int NOT NULL,
  `days` int NOT NULL,
  `percentage` double(10,2) NOT NULL,
  `serial_number` int NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `doller`, `days`, `percentage`, `serial_number`, `featured`, `status`, `icon`, `created_at`, `updated_at`) VALUES
(7, 33, 22, 22.00, 1, 0, 1, 'fas fa-air-freshener', '2024-01-27 11:53:34', '2024-01-27 11:57:13'),
(8, 292, 843, 42.00, 662, 0, 1, 'fab fa-algolia', '2024-01-27 11:58:21', '2024-01-27 11:58:21'),
(9, 292, 843, 42.00, 662, 0, 1, 'fab fa-algolia', '2024-01-27 11:58:23', '2024-01-27 11:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `package_contents`
--

CREATE TABLE `package_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `language_id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_contents`
--

INSERT INTO `package_contents` (`id`, `language_id`, `package_id`, `title`, `created_at`, `updated_at`) VALUES
(5, 8, 7, 'ddd', '2024-01-27 11:53:34', '2024-01-27 11:53:34'),
(6, 8, 8, '294', '2024-01-27 11:58:21', '2024-01-27 11:58:21'),
(7, 8, 9, '294', '2024-01-27 11:58:23', '2024-01-27 11:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `page_headings`
--

CREATE TABLE `page_headings` (
  `id` bigint UNSIGNED NOT NULL,
  `language_id` bigint UNSIGNED NOT NULL,
  `blog_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_details_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `error_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `forget_password_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_forget_password_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `signup_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_login_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_signup_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipment_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipment_details_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_headings`
--

INSERT INTO `page_headings` (`id`, `language_id`, `blog_page_title`, `blog_details_page_title`, `contact_page_title`, `products_page_title`, `product_details_page_title`, `error_page_title`, `faq_page_title`, `forget_password_page_title`, `vendor_forget_password_page_title`, `login_page_title`, `signup_page_title`, `vendor_login_page_title`, `vendor_signup_page_title`, `cart_page_title`, `checkout_page_title`, `equipment_page_title`, `equipment_details_page_title`, `vendor_page_title`, `created_at`, `updated_at`) VALUES
(8, 8, 'Blog', 'Post Details', 'Contact', 'Products', 'Product Details', '404', 'FAQ', 'Forget Password', 'Vendor Forget Password', 'Login', 'Signup', 'Vendor Login', 'Vendor Signup', 'Cart', 'Checkout', 'Equipment', 'Equipment Details', 'Vendors', '2022-01-10 05:21:48', '2022-10-22 04:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `payment_requests`
--

CREATE TABLE `payment_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `request_balance` double NOT NULL DEFAULT '0',
  `payment_status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recharge_packages`
--

CREATE TABLE `recharge_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `doller` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recharge_packages`
--

INSERT INTO `recharge_packages` (`id`, `doller`, `status`, `featured`, `created_at`, `updated_at`, `icon`, `serial_number`) VALUES
(6, 845, 1, 0, '2024-01-27 11:36:49', '2024-01-27 11:52:44', 'far fa-address-book', 3);

-- --------------------------------------------------------

--
-- Table structure for table `recharge_package_contents`
--

CREATE TABLE `recharge_package_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recharge_package_id` bigint UNSIGNED NOT NULL,
  `language_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recharge_package_contents`
--

INSERT INTO `recharge_package_contents` (`id`, `title`, `recharge_package_id`, `language_id`, `created_at`, `updated_at`) VALUES
(3, '739', 4, 13, '2024-01-27 11:34:42', '2024-01-27 11:34:42'),
(4, '690', 5, 13, '2024-01-27 11:35:59', '2024-01-27 11:35:59'),
(5, '143', 6, 13, '2024-01-27 11:36:49', '2024-01-27 11:36:49'),
(6, 'ddss', 6, 8, '2024-01-27 11:38:10', '2024-01-27 11:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(4, 'Admin', '[\"Language Management\",\"Basic Settings\",\"Announcement Popups\",\"Home Page\",\"Footer\"]', '2021-08-06 22:42:38', '2024-01-24 02:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` int NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 -> banned or deactive, 1 -> active',
  `verification_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `wallet_balance` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `referral_id`, `unique_id`, `full_name`, `image`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `country`, `status`, `verification_token`, `remember_token`, `created_at`, `updated_at`, `wallet_balance`) VALUES
(28, 'bowuko', 'Labore tenetur autem', 104265, 'Pascale Garrison', NULL, 'lafehumiwo@mailinator.com', NULL, '$2y$10$G4vyiM0KvyZfrxFxW3QJ/.VV7PWSVeQ6c8jZR/sXYMo0jw8AyNHOq', 'jurabanu@mailinator.com', NULL, '176', 0, '41389fb81fa3744fe9f22a9c684ac3f7', NULL, '2024-01-29 13:38:30', '2024-01-29 13:38:30', 0),
(29, 'saifislamfci', '23546', 100232, 'saif islam', NULL, 'saifislamfci@gmail.com', '2024-01-30 10:48:07', '$2y$10$4.QyeLOTwQho93ExuqwVQe5CRuEwB4vBD9DPvQmlP2yq8IET/ekpu', '01872330757', NULL, '17', 1, '89dd2a628382d41ada6a47cf0b83e0c0', NULL, '2024-01-29 13:43:59', '2024-01-30 10:48:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `with_draw_money`
--

CREATE TABLE `with_draw_money` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` bigint NOT NULL,
  `was_account_balance` double NOT NULL,
  `withdraw_balance` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_role_id_foreign` (`role_id`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie_alerts`
--
ALTER TABLE `cookie_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gain_histroys`
--
ALTER TABLE `gain_histroys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_templates`
--
ALTER TABLE `mail_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_contents`
--
ALTER TABLE `package_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_headings`
--
ALTER TABLE `page_headings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_headings_language_id_foreign` (`language_id`);

--
-- Indexes for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recharge_packages`
--
ALTER TABLE `recharge_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recharge_package_contents`
--
ALTER TABLE `recharge_package_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_unique_id_unique` (`username`);

--
-- Indexes for table `with_draw_money`
--
ALTER TABLE `with_draw_money`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cookie_alerts`
--
ALTER TABLE `cookie_alerts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gain_histroys`
--
ALTER TABLE `gain_histroys`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mail_templates`
--
ALTER TABLE `mail_templates`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_contents`
--
ALTER TABLE `package_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page_headings`
--
ALTER TABLE `page_headings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_requests`
--
ALTER TABLE `payment_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recharge_packages`
--
ALTER TABLE `recharge_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recharge_package_contents`
--
ALTER TABLE `recharge_package_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `with_draw_money`
--
ALTER TABLE `with_draw_money`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_permissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
