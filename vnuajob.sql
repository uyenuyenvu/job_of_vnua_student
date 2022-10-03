-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 05:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vnuajob`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên danh mục',
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mô tả',
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'id danh mục cha',
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT 'trạng thái',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `categorizable_id` int(11) DEFAULT NULL COMMENT 'id người tạo',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorizable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'bảng người tạo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `descriptions`, `parent_id`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `categorizable_id`, `slug`, `categorizable_type`) VALUES
(1, 'Developer', 'Lập trình viên', NULL, '1', '2022-10-02 19:46:58', '2022-10-02 19:46:58', NULL, NULL, 'developer1664765218', 'users');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tên công ty',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'email công ty',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'số điện thoại công ty',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'địa chỉ công ty',
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'trang web công ty',
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mô tả công ty',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ảnh logo',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:chưa kích hoạt - 1:Đã kích hoạt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `phone`, `address`, `website`, `descriptions`, `logo`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ZentSoft', 'zent@gmail.com', '(+84) 961130648', 'Tầng 6, số 2 ngõ 118 Trương Định, Hai Bà Trưng, Hà Nội', 'https://zent.edu.vn/', 'ZENT EDUCATION được thành lập với triết lý “Không cứ phải là thần đồng, không cứ phải là giàu có chỉ cần có phương pháp giáo dục đúng đắn, tích cực mọi đứa trẻ đều sẽ trở thành nhân tài” được viết trong cuốn sách nổi tiếng “Em phải đến Harvard học kinh tế”.', 'companies/1664765263.png', 1, '2022-10-02 19:47:43', '2022-10-02 19:47:43', NULL),
(2, 'VNP Group', 'vnp@gmail.com', '0961130649', '112,114 Đơn nguyên 3, tòa CT4 KĐT, Mỹ Đình, Từ Liêm, Hà Nội, Vietnam', 'http://vnpgroup.vn/categories/1/gioi-thieu.html', 'Công Ty Cổ phần VNP GROUP - Viet Nam Price Joint Stock Company (VNP)- được thành lập ngày 21 tháng 8 năm 2006, tọa lạc tại số 102, phố Thái Thịnh, phường Trung Liệt, quận Đống Đa, thành phố Hà Nội.', 'companies/1664765311.png', 1, '2022-10-02 19:48:31', '2022-10-02 19:48:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tên người tuyển dụng',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'số điện thoại',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email người dùng',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'chức vụ',
  `birthday` date DEFAULT NULL COMMENT 'ngày sinh',
  `company_id` bigint(20) DEFAULT NULL COMMENT 'id bảng công ty',
  `is_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:ngừng kích hoạt - 1:kích hoạt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `title`, `birthday`, `company_id`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'employer', NULL, 'employer@gmail.com', NULL, '$2y$10$tIjL6ptUaHKPw6jCHvn67eefi5ORAR2hLuK/c0Z25JLbM4D6rpUii', 'Tuyển dụng', NULL, 1, 1, '2022-10-02 19:46:33', '2022-10-02 19:46:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facuties`
--

CREATE TABLE `facuties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facuty_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã khoa',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên khoa',
  `descriptions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mô tả',
  `is_active` tinyint(4) NOT NULL COMMENT '0:chưa kích hoạt - 1:Đã kích hoạt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_23_081003_create_table_employers_table', 1),
(5, '2020_09_23_082445_create_table_students_table', 1),
(6, '2020_09_23_083231_create_table_companies_table', 1),
(7, '2020_09_23_084519_create_table_facuties_table', 1),
(8, '2020_09_23_084927_create_table_posts_table', 1),
(9, '2020_09_23_085934_create_table_categories_table', 1),
(10, '2020_09_26_081020_add_column_user_id_in_categories', 1),
(11, '2020_09_26_081746_add_column_user_id_in_posts', 1),
(12, '2020_09_26_091552_edit_clolumn_descriptions_to_categories', 1),
(13, '2020_10_20_055839_change_user_id_post_table', 1),
(14, '2020_10_20_061557_change_user_created_id_categories_table', 1),
(15, '2021_04_26_153736_delete_column-user_in_post_table', 1),
(16, '2021_04_26_163857_create_cv_students', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tiêu đề bài đăng',
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mô tả',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nội dung',
  `date_public` date DEFAULT NULL COMMENT 'Ngày tuyển dụng công khai',
  `vacancy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'số lượng tuyển dụng',
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tiền lương',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'địa chỉ làm việc',
  `job_nature` int(11) DEFAULT NULL COMMENT 'tính chất công việc 1: partime, 2 fulltime, 3 cả 2',
  `category_id` bigint(20) NOT NULL COMMENT 'id bảng category',
  `company_id` bigint(20) DEFAULT NULL COMMENT 'id bảng company',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:chưa đủ số lượng tuyển dụng - 1:đã đủ số lượng tuyển dụng',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:chưa kích hoạt - 1:đã kích hoạt',
  `salart_start` int(11) DEFAULT NULL COMMENT 'tiền lương bắt đầu, bằng số, đơn vị vnd',
  `salart_end` int(11) DEFAULT NULL COMMENT 'tiền lương kết thúc, bằng số, đơn vị vnd',
  `request_degree` int(11) DEFAULT 0 COMMENT 'yêu cầu bằng cấp. 1 là có, 0 là không',
  `request_old` int(11) DEFAULT 0 COMMENT 'yêu cầu độ tuổi. 1 là có, 0 là không',
  `request_experience` int(11) DEFAULT 0 COMMENT 'yêu cầu kinh nghiệm',
  `request_sex` int(11) DEFAULT 0 COMMENT 'yêu cầu giới tính. 1 là nam, 2 là nữ, 0 là không',
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Nhân viên' COMMENT 'chức vụ',
  `deadline` timestamp NULL DEFAULT NULL COMMENT 'hạn nộp hồ sơ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `postable_id` int(11) DEFAULT NULL COMMENT 'id người tạo',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'bảng người tạo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `descriptions`, `content`, `date_public`, `vacancy`, `salary`, `location`, `job_nature`, `category_id`, `company_id`, `status`, `is_active`, `salart_start`, `salart_end`, `request_degree`, `request_old`, `request_experience`, `request_sex`, `position`, `deadline`, `created_at`, `updated_at`, `deleted_at`, `postable_id`, `slug`, `postable_type`) VALUES
(1, 'Senior PHP Developer (Drupal, Wordpress)', '<h2 class=\"job-details__second-title\" style=\"font-size: 23px; margin: 30px 0px 0px; font-weight: 400; color: rgb(53, 53, 53); font-family: Roboto, sans-serif;\">Job Description</h2><div class=\"job-details__paragraph\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 690px; font-family: Roboto, sans-serif;\"><p style=\"margin: 1em 0px;\">Bouygues Construction Information Technologies (BYCN IT) is the IT branch of Bouygues Construction, a global player in the building, civil works, energies and services sectors. Bouygues Construction&nbsp;operates at all points of the value chain of projects: finance, design, construction and facilities management (operation and maintenance). On every continent, our employees devise and develop solutions that help improve the environment and everybody\'s lives.&nbsp;&nbsp;</p><p style=\"margin: 1em 0px;\">As part of Bouygues Construction, the mission of BYCN IT is to provide the members of Bouygues Construction with IT services of high quality fitting with their businesses and to deploy solutions to improve communication and people collaboration through worldwide network. BYCN IT has offices in France, Morocco and Vietnam.</p><p style=\"margin: 1em 0px;\">We are looking forward to cooperating with talented and motivated people.</p></div>', '<div class=\"job-details__paragraph\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 690px; font-family: Roboto, sans-serif;\"><p style=\"margin: 1em 0px;\"><span style=\"font-weight: bolder;\">Job Description:</span></p><ul style=\"padding: 0px 0px 0px 2rem; margin-right: 0px; margin-left: 0px;\"><li>Maintain and develop applications/websites for clients using PHP.&nbsp;</li><li>Analyze client requirements, master development framework, perform design and coding.&nbsp;</li><li>Troubleshoot and fix any issues relating to PHP programs.&nbsp;</li><li>Writing technical document as well as non-technical specifications along with record all procedures.&nbsp;</li><li>Research and provide technical solution per request.&nbsp;</li><li>Work closely with PMs and testers in completing projects.&nbsp;</li><li>Produce results effectively and within the deadlines set.</li></ul></div><h2 class=\"job-details__second-title\" style=\"font-size: 23px; margin: 30px 0px 0px; font-weight: 400; color: rgb(53, 53, 53); font-family: Roboto, sans-serif;\">Your Skills and Experience</h2><div class=\"job-details__paragraph\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 690px; font-family: Roboto, sans-serif;\"><ul style=\"padding: 0px 0px 0px 2rem; margin-right: 0px; margin-left: 0px;\"><li>At least 4 years of experience as web application developer.&nbsp;</li><li>Strong experience in&nbsp;<span style=\"font-weight: bolder;\">PHP&nbsp;</span>development and architecture related.&nbsp;</li><li>Strong knowledge of object-oriented design and related concepts.&nbsp;</li><li>Having experience with framework like&nbsp;<span style=\"font-weight: bolder;\">Drupal, WordPress or Symfony</span>.&nbsp;</li><li>Strong knowledge in HTML5, CSS, JavaScript.&nbsp;</li><li>Good knowledge in MySQL or other relational database MSSQL, POSTGRESQL&nbsp;</li><li>Good experience in debugging, performance test, security scan tools.&nbsp;</li></ul><p style=\"margin: 1em 0px;\"><span style=\"font-weight: bolder;\">Language Skills&nbsp;</span></p><ul style=\"padding: 0px 0px 0px 2rem; margin-right: 0px; margin-left: 0px;\"><li>Fluent in English&nbsp;</li></ul><p style=\"margin: 1em 0px;\"><span style=\"font-weight: bolder;\">General Skills&nbsp;</span></p><ul style=\"padding: 0px 0px 0px 2rem; margin-right: 0px; margin-left: 0px;\"><li>Good communication skills&nbsp;</li><li>Good problem-solving and researching skills&nbsp;</li><li>Well-organized&nbsp;</li><li>Can-do attitude&nbsp;</li><li>Responsibility and proactive&nbsp;</li><li>Teamwork</li><li>Positive thinking</li></ul></div><h2 class=\"job-details__second-title\" style=\"font-size: 23px; margin: 30px 0px 0px; font-weight: 400; color: rgb(53, 53, 53); font-family: Roboto, sans-serif;\">Why You\'ll Love Working Here</h2><div class=\"job-details__paragraph\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 690px; font-family: Roboto, sans-serif;\"><ul style=\"padding: 0px 0px 0px 2rem; margin-right: 0px; margin-left: 0px;\"><li>Great Teamwork&nbsp;</li><li>International, friendly, proactive, supportive workplace&nbsp;</li><li>Extensive coaching and training&nbsp;</li><li>In-depth knowledge sharing sessions&nbsp;</li><li>Career growth opportunities&nbsp;</li><li>Agile mindset&nbsp;</li><li>Annual teambuilding activities - Company trip&nbsp;</li><li>Sport, personal activities sponsor&nbsp;</li><li>Compulsory Insurance and Premium health insurance&nbsp;</li><li>Annual health check-up&nbsp;</li><li>15 annual leave days + 6 sick leave days&nbsp;</li><li>1 additional leave days for 3-year working&nbsp;</li><li>100% salary, full insurances on probationary period&nbsp;</li><li>Up to 2-month performance bonus&nbsp;</li><li>Dell laptop and external monitor for your work&nbsp;</li><li>Work from home 2 days/ week&nbsp;</li><li>Nice open office with free cake – candy – coffee – tea…&nbsp;</li></ul></div>', '2022-10-01', '10', '20-25', 'số 2, ngõ 118, đường Trương Định, HN', 3, 1, 1, 0, 1, 1, 1, 0, 18, 0, 0, 'Nhân viên', '2022-10-04 17:00:00', '2022-10-02 19:50:55', '2022-10-02 19:50:55', NULL, 1, NULL, 'users'),
(2, 'PHP Developer (Laravel, VueJS)', '<h2 class=\"job-details__second-title\" style=\"margin: 30px 0px 0px; font-weight: 400; font-size: 23px; color: rgb(53, 53, 53); font-family: Roboto, sans-serif;\">Job Description</h2><h2 class=\"job-details__second-title\" style=\"font-size: 23px; margin: 30px 0px 0px; font-weight: 400; color: rgb(53, 53, 53); font-family: Roboto, sans-serif;\"><div class=\"job-details__paragraph\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 690px;\"><p style=\"margin: 1em 0px;\">Bouygues Construction Information Technologies (BYCN IT) is the IT branch of Bouygues Construction, a global player in the building, civil works, energies and services sectors. Bouygues Construction&nbsp;operates at all points of the value chain of projects: finance, design, construction and facilities management (operation and maintenance). On every continent, our employees devise and develop solutions that help improve the environment and everybody\'s lives.&nbsp;&nbsp;</p><p style=\"margin: 1em 0px;\">As part of Bouygues Construction, the mission of BYCN IT is to provide the members of Bouygues Construction with IT services of high quality fitting with their businesses and to deploy solutions to improve communication and people collaboration through worldwide network. BYCN IT has offices in France, Morocco and Vietnam.</p><p style=\"margin: 1em 0px;\">We are looking forward to cooperating with talented and motivated people.</p></div></h2>', '<div class=\"job-details__paragraph\" style=\"color: rgb(58, 58, 58); font-size: 16px; line-height: 1.7em; width: 690px; font-family: Roboto, sans-serif;\"><div class=\"job-details__paragraph\" style=\"line-height: 1.7em; width: 690px;\"><p style=\"margin: 1em 0px;\"><span style=\"font-weight: bolder;\">Job Description:</span></p><ul style=\"margin-right: 0px; margin-left: 0px; padding: 0px 0px 0px 2rem;\"><li>Maintain and develop applications/websites for clients using PHP.&nbsp;</li><li>Analyze client requirements, master development framework, perform design and coding.&nbsp;</li><li>Troubleshoot and fix any issues relating to PHP programs.&nbsp;</li><li>Writing technical document as well as non-technical specifications along with record all procedures.&nbsp;</li><li>Research and provide technical solution per request.&nbsp;</li><li>Work closely with PMs and testers in completing projects.&nbsp;</li><li>Produce results effectively and within the deadlines set.</li></ul></div><h2 class=\"job-details__second-title\" style=\"margin: 30px 0px 0px; font-weight: 400; font-size: 23px; color: rgb(53, 53, 53);\">Your Skills and Experience</h2><div class=\"job-details__paragraph\" style=\"line-height: 1.7em; width: 690px;\"><ul style=\"margin-right: 0px; margin-left: 0px; padding: 0px 0px 0px 2rem;\"><li>At least 4 years of experience as web application developer.&nbsp;</li><li>Strong experience in&nbsp;<span style=\"font-weight: bolder;\">PHP&nbsp;</span>development and architecture related.&nbsp;</li><li>Strong knowledge of object-oriented design and related concepts.&nbsp;</li><li>Having experience with framework like&nbsp;<span style=\"font-weight: bolder;\">Drupal, WordPress or Symfony</span>.&nbsp;</li><li>Strong knowledge in HTML5, CSS, JavaScript.&nbsp;</li><li>Good knowledge in MySQL or other relational database MSSQL, POSTGRESQL&nbsp;</li><li>Good experience in debugging, performance test, security scan tools.&nbsp;</li></ul><p style=\"margin: 1em 0px;\"><span style=\"font-weight: bolder;\">Language Skills&nbsp;</span></p><ul style=\"margin-right: 0px; margin-left: 0px; padding: 0px 0px 0px 2rem;\"><li>Fluent in English&nbsp;</li></ul><p style=\"margin: 1em 0px;\"><span style=\"font-weight: bolder;\">General Skills&nbsp;</span></p><ul style=\"margin-right: 0px; margin-left: 0px; padding: 0px 0px 0px 2rem;\"><li>Good communication skills&nbsp;</li><li>Good problem-solving and researching skills&nbsp;</li><li>Well-organized&nbsp;</li><li>Can-do attitude&nbsp;</li><li>Responsibility and proactive&nbsp;</li><li>Teamwork</li><li>Positive thinking</li></ul></div><h2 class=\"job-details__second-title\" style=\"margin: 30px 0px 0px; font-weight: 400; font-size: 23px; color: rgb(53, 53, 53);\">Why You\'ll Love Working Here</h2><div class=\"job-details__paragraph\" style=\"line-height: 1.7em; width: 690px;\"><ul style=\"margin-right: 0px; margin-left: 0px; padding: 0px 0px 0px 2rem;\"><li>Great Teamwork&nbsp;</li><li>International, friendly, proactive, supportive workplace&nbsp;</li><li>Extensive coaching and training&nbsp;</li><li>In-depth knowledge sharing sessions&nbsp;</li><li>Career growth opportunities&nbsp;</li><li>Agile mindset&nbsp;</li><li>Annual teambuilding activities - Company trip&nbsp;</li><li>Sport, personal activities sponsor&nbsp;</li><li>Compulsory Insurance and Premium health insurance&nbsp;</li><li>Annual health check-up&nbsp;</li><li>15 annual leave days + 6 sick leave days&nbsp;</li><li>1 additional leave days for 3-year working&nbsp;</li><li>100% salary, full insurances on probationary period&nbsp;</li><li>Up to 2-month performance bonus&nbsp;</li><li>Dell laptop and external monitor for your work&nbsp;</li><li>Work from home 2 days/ week&nbsp;</li><li>Nice open office with free cake – candy – coffee – tea…&nbsp;</li></ul></div></div>', '2022-10-01', '20', '20-25', 'số 2, ngõ 118, đường Trương Định, HN', 3, 1, 2, 0, 1, 1, 1, 0, 18, 0, 0, 'Nhân viên', '2022-10-04 17:00:00', '2022-10-02 19:57:48', '2022-10-02 19:57:48', NULL, 1, NULL, 'users');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tên sinh viên',
  `student_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'mã sinh viên',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'số điện thoại',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email người dùng',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_town` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'quê quán',
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'lớp',
  `facuty_id` bigint(20) DEFAULT NULL COMMENT 'id bảng người dùng',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Trạng thái việc làm sinh viên: 0:chưa tìm được - 1:đã tìm được việc',
  `is_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:ngừng kích hoạt - 1:kích hoạt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `curriculum_vitae` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_code`, `phone`, `email`, `email_verified_at`, `password`, `home_town`, `class`, `facuty_id`, `status`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `curriculum_vitae`) VALUES
(1, 'Vũ Thị Uyên', '637673', NULL, '637673@gmail.com', NULL, '$2y$10$O2HONs4EP4rUcF3bATyZyuh.4Z/Jll3RSmfKC7AGApahyU/IGKFCO', NULL, NULL, 1, 0, 1, '2022-10-02 19:46:14', '2022-10-02 19:46:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên người dùng',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email người dùng',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'số điện thoại',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'chức vụ',
  `is_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:ngừng kích hoạt - 1:kích hoạt',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `title`, `is_active`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$5aZIOtU8kuUwGUb2qpJuZui7KTHxTont.mK8Yx/t1IDZQOohv/fzi', NULL, 'Quản trị viên', 1, NULL, '2022-10-02 19:46:24', '2022-10-02 19:46:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employers_email_unique` (`email`);

--
-- Indexes for table `facuties`
--
ALTER TABLE `facuties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facuties`
--
ALTER TABLE `facuties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
