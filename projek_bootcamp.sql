-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 03:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_bootcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `cover_image`) VALUES
(1, 'News', 'News Post', '2019-05-21 16:00:00', NULL, 'news.jpg'),
(2, 'Tips', 'Tips & Trick Post', '2019-05-19 16:00:00', NULL, 'tips.jpg'),
(3, 'Lifestyle', 'Lifestyle & Health Post', '2019-05-14 16:00:00', '2019-05-30 01:54:26', 'lifestyle.jpg'),
(4, 'Technology', 'Technology post', '2019-05-21 16:00:00', NULL, 'technology.jpg'),
(5, 'Fashion', 'Fashion Category', '2019-05-21 16:00:00', NULL, 'fashion.jpg'),
(6, 'Art', 'Art Post', '2019-05-29 16:00:00', NULL, 'art.jpg'),
(7, 'Food', 'Food Post', '2019-05-29 16:00:00', NULL, 'food.jpg'),
(8, 'Adventure', 'Adventure Post', '2019-05-29 16:00:00', NULL, 'adventure.jpg');

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
(3, '2019_05_24_031842_create_posts_table', 1),
(4, '2019_05_25_020128_create_categories_table', 1),
(5, '2019_05_29_055517_create_post_categories_table', 1);

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
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_cover` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_draft` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `content`, `image_cover`, `is_draft`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dadi Winarno', 'Harum aut placeat error ut. Accusantium non recusandae corporis voluptas voluptatem suscipit totam. Porro eum ad quia quia rerum commodi. Unde temporibus et aut.', NULL, 0, '2019-05-14 16:00:00', NULL),
(2, 1, 'Digdaya Purwadi Maryadi', 'Et accusamus facilis ad quam reprehenderit. Qui illum nam et incidunt. At enim facere unde explicabo vel enim quia. Ad aut et voluptatibus rerum.', NULL, 0, '2019-05-22 16:00:00', NULL),
(3, 1, 'Viktor Kuswoyo', 'Animi adipisci et nam neque et impedit. Veniam deleniti dolorem dicta quas commodi aut. Est aliquam explicabo et nobis aut.', NULL, 0, '2019-05-13 16:00:00', NULL),
(4, 1, 'Cecep Dongoran', 'Ratione excepturi perferendis exercitationem quo minus tempora praesentium. At hic eveniet aspernatur tempora iusto dolorem. Nostrum delectus et numquam est inventore sapiente dolores.', NULL, 0, '2019-05-20 16:00:00', NULL),
(5, 1, 'Ulya Riyanti S.Pt', 'Quia consequatur voluptatem excepturi laboriosam quidem. Dolorem nostrum numquam nam. Est et et est error. Voluptatem qui et corporis quo quod. Enim et dolores nihil eveniet ut.', NULL, 0, '2019-05-15 16:00:00', NULL),
(6, 1, 'Ibun Siregar S.Kom', 'Ut expedita animi illum quas reprehenderit. Facere magni vero omnis vel molestiae. Suscipit nemo debitis officiis. In omnis ut laboriosam aliquid vero molestiae aliquam.', NULL, 0, '2019-05-22 16:00:00', NULL),
(7, 1, 'Hamzah Yosef Habibi S.E.', 'Sit voluptatem sequi et quis. Rerum ut nostrum est minima sint expedita. Et architecto vitae et. Earum nemo et veritatis voluptatum architecto.', NULL, 0, '2019-05-27 16:00:00', NULL),
(8, 1, 'Ilsa Melani M.M.', 'Ut exercitationem earum provident dolor tempore sunt. Laudantium consequatur ab alias aperiam autem quis id deserunt. Necessitatibus non autem iste modi cupiditate distinctio.', NULL, 0, '2019-05-21 16:00:00', NULL),
(9, 1, 'Harsanto Harjasa Prayoga S.IP', 'Voluptas qui rerum id aut aut dolorem culpa. Maiores et adipisci ea tenetur inventore harum sit aut. Rerum dolores tempore nesciunt fugiat nostrum cumque tempore. Eum quia quis et numquam.', NULL, 0, '2019-05-21 16:00:00', NULL),
(10, 1, 'Kania Oktaviani', 'Quaerat est corrupti sed et. Consequatur eligendi a praesentium debitis. Est quas dolore assumenda quia. Iste voluptas esse in dicta maiores aut fugiat.', NULL, 0, '2019-05-16 16:00:00', NULL),
(11, 4, 'Beloved Cat', '<h1><b>Cute Cat</b></h1><p>Aku panggil dia twini, kucingku sudah punya 3 anak, lucu2 banget, pokoknya kalian harus liat !!<br>aku kasih nama ke-3 anak kucing ini</p><ol><li>&nbsp;Batman</li><li>Embun</li><li>Embul</li></ol><p>karena mereka lucu2 aku suka <span style=\"color: rgb(255, 0, 0); font-weight: bold;\">bangett</span> !!!!!</p>', 'post-1559207718.jpg', 0, '2019-05-30 01:15:18', '2019-05-30 01:15:18'),
(12, 9, 'The Best Salmon Ever !!', '<h1 style=\"font-family: georgia; margin-right: 0px; margin-bottom: 24px; margin-left: 0px; font-size: 19px; color: rgb(34, 34, 34); line-height: 29px; letter-spacing: -0.01em;\"><b>When</b> you’re trying to eat healthier but want something more substantial than a leafy green salad, broccoli salad is there for you. I love the crunch and heft of broccoli, especially when it’s cut up into bite size spoonable pieces.</h1><p style=\"font-family: georgia; margin-right: 0px; margin-bottom: 24px; margin-left: 0px; font-size: 19px; color: rgb(34, 34, 34); line-height: 29px; letter-spacing: -0.01em;\"><span id=\"more-27929\"></span></p><h2 style=\"font-family: georgia; margin-right: 0px; margin-bottom: 24px; margin-left: 0px; font-size: 19px; color: rgb(34, 34, 34); line-height: 29px; letter-spacing: -0.01em;\"><b>Some </b>people aren’t into raw broccoli, but I love it! I always go for the raw broccoli on those vegetable platters that seem to be at every potluck/party you go to.</h2><p style=\"font-family: georgia; margin-right: 0px; margin-bottom: 24px; margin-left: 0px; font-size: 19px; color: rgb(34, 34, 34); line-height: 29px; letter-spacing: -0.01em;\">This is a simple broccoli salad: you have the bulk of it, raw broccoli; crunchy red onions for a bit of acidity and raw crunch, craisins for sweetness, almonds for a nutty counter point; and a sweet and tangy soy-rice vinegar-sesame dressing.</p><p style=\"font-family: georgia; margin-right: 0px; margin-bottom: 24px; margin-left: 0px; font-size: 19px; line-height: 29px; letter-spacing: -0.01em;\"><span style=\"color: rgb(34, 34, 34);\">Make it for dinner and eat it with a </span><span style=\"background-color: rgb(255, 255, 0);\">spoon</span><font color=\"#222222\">. So satisfying. !!!</font></p>', 'post-1559213168.jpg', 0, '2019-05-30 02:46:08', '2019-05-30 02:46:08'),
(13, 8, 'How To Become Lifestyle Blogger', '<p style=\"margin: 5px 0px 10px; padding: 0px; color: rgb(89, 89, 89); font-family: muli, &quot;helvetica neue&quot;, sans-serif; font-size: 17px; letter-spacing: 0.5px;\">A lifestyle blog is simply a blog where you write about things going on in your life! It can be very general, or can focus on one aspect of your life (like motherhood or fashion) with some other content mixed in every now and then. It’s really a wide-open option, which is why I recommend it!</p><p style=\"margin: 5px 0px 10px; padding: 0px; color: rgb(89, 89, 89); font-family: muli, &quot;helvetica neue&quot;, sans-serif; font-size: 17px; letter-spacing: 0.5px;\">This step-by-step tutorial will show you how to&nbsp;<a href=\"https://partners.hostgator.com/c/214575/177309/3094?u=https://www.hostgator.com/promo/katiedidwhat\" target=\"_blank\" rel=\"nofollow\" style=\"transition: all 0.1s ease-in-out 0s; color: rgb(255, 102, 196);\">launch your own blog</a>.</p>', 'post-1559213308.jpg', 0, '2019-05-30 02:48:28', '2019-05-30 02:48:28'),
(14, 10, 'Twitter wants help deciding whether to keep white supremacists or not', '<p class=\"jsx-1279085685 textBeforeButton\" style=\"box-sizing: inherit; margin-right: 5px; margin-bottom: 14px; margin-left: 0px; color: rgb(48, 48, 48); font-family: NeueHaas, sans-serif; font-size: 18px;\">The social media firm is asking researchers to help it work out whether they should kick racists off the platform—or keep them on to help change their mind,&nbsp;<span class=\"jsx-2473920458 storyLink\" style=\"box-sizing: inherit;\"><a class=\"\" href=\"https://www.vice.com/en_us/article/ywy5nx/twitter-researching-white-supremacism-nationalism-ban-deplatform?utm_source=vicenewstwitter\" style=\"box-sizing: inherit; color: inherit; text-decoration-line: underline;\">Motherboard reports</a></span>.</p><div class=\"jsx-1279085685 mainCopyContainer\" style=\"box-sizing: inherit; height: 819px; overflow: hidden; color: rgb(48, 48, 48); font-family: NeueHaas, sans-serif; font-size: 18px; transition: height 250ms ease-out 0s;\"><div class=\"jsx-1279085685 mainCopy\" style=\"box-sizing: inherit;\"><p class=\"jsx-1279085685\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 14px; margin-left: 0px;\"><strong style=\"box-sizing: inherit;\">Errrr:</strong>&nbsp;Twitter’s argument is that “conversation and counter-speech” can work to de-radicalise extremists online. It is now working with academics to see if that is actually the case.</p><p class=\"jsx-1279085685\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 14px; margin-left: 0px;\"><strong style=\"box-sizing: inherit;\">Reaction:</strong>&nbsp;Many experts are skeptical of the idea that you can just talk someone into not being a racist in this way. And Becca Lewis at the nonprofit Data &amp; Society, told Motherboard: \"It has a ring of being too little too late in terms of launching into research projects right now. People have been raising the alarm about this for literally years now.\"</p><p class=\"jsx-1279085685\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 14px; margin-left: 0px;\"><strong style=\"box-sizing: inherit;\">Catchup:</strong>&nbsp;If you spend&nbsp;much time on Twitter you\'ll know it can be an absolute hellhole, especially for women or minorities. Trolling, racism and mob attacks are a regular occurrence. While Twitter bans abusive content and lets users report posts, its policy often seems to be applied pretty unevenly. Facebook and Instagram&nbsp;<span class=\"jsx-2473920458 storyLink\" style=\"box-sizing: inherit;\"><a class=\"\" href=\"https://www.technologyreview.com/f/613491/facebook-has-banned-a-list-of-dangerous-extremist-celebrities/\" style=\"box-sizing: inherit; color: inherit; text-decoration-line: underline;\">have already taken the step</a></span>&nbsp;of banning prominent white supremacists. Twitter has been resistant, until now (former KKK leader David Duke is still on there, for example.) That might be the first step.</p><p class=\"jsx-1279085685\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 14px; margin-left: 0px;\"><strong style=\"box-sizing: inherit;\">Twitter says</strong>: A Twitter spokesperson said that working with academics was a\"critical part of building effective policies.\" They said: \"We will always have more to do, and collaboration with outside researchers is critical to helping us effectively address issues like radicalization in all its forms.\"</p></div></div>', 'post-1559213550.jpg', 0, '2019-05-30 02:52:30', '2019-05-30 02:52:30'),
(15, 3, 'Kawi, From Momofuku, Takes Korean Food Head On', '<p class=\"css-18icg9x evys1bk0\" style=\"margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; border: 0px; text-size-adjust: 100%; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 1.1875rem; line-height: 1.8125rem; font-family: nyt-imperial, georgia, &quot;times new roman&quot;, times, serif; vertical-align: baseline; width: 600px; max-width: 100%; color: rgb(51, 51, 51);\">You will find&nbsp;<a class=\"css-1g7m0tk\" href=\"https://kawi.momofuku.com/\" title=\"\" rel=\"noopener noreferrer\" target=\"_blank\" style=\"margin: 0px; padding: 0px; border: 0px; text-size-adjust: 100%; font: inherit; vertical-align: baseline; text-decoration-line: underline; color: rgb(50, 104, 145);\">Kawi</a>, the latest Momofuku restaurant, on the fifth floor of 20 Hudson Yards, assuming you stay determined and swallow back the urge to run for the exits that may grip you as you negotiate escalators that don’t connect to one another, elevators that are hidden out of sight like somebody’s crazy grandfather and shiny retail windows that seem to be trying to provoke a class war.</p><p class=\"css-18icg9x evys1bk0\" style=\"margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; border: 0px; text-size-adjust: 100%; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 1.1875rem; line-height: 1.8125rem; font-family: nyt-imperial, georgia, &quot;times new roman&quot;, times, serif; vertical-align: baseline; width: 600px; max-width: 100%; color: rgb(51, 51, 51);\">By the time people reach Kawi they tend to look rattled; New Yorkers who will easily weave their way around broken sidewalks, potholes, garbage piles and al fresco rat conventions come undone when faced with the interior of a shopping mall.</p><p class=\"css-18icg9x evys1bk0\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; text-size-adjust: 100%; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 1.1875rem; line-height: 1.8125rem; font-family: nyt-imperial, georgia, &quot;times new roman&quot;, times, serif; vertical-align: baseline; width: 600px; max-width: 100%; color: rgb(51, 51, 51);\">Kawi, now two months old, can be disorienting in its own way, but at least you can have a seat and a drink while you get your bearings. Space there is used, or not used, the way it is in Las Vegas. There’s a very long bar behind a line of black, geometric bar stools receding toward the vanishing point; low lounge tables; taller, square wood tables; round wood tables; black-leather booths; red-leather booths; red-leather banquettes; and a row of chairs facing a kitchen counter. Between all this furniture are aisles wide enough for a Zamboni.</p>', 'post-1559213742.jpg', 0, '2019-05-30 02:55:42', '2019-05-30 02:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`) VALUES
(1, 11, 2),
(2, 12, 6),
(3, 12, 7),
(4, 13, 2),
(5, 13, 3),
(6, 14, 1),
(7, 14, 4),
(8, 15, 1),
(9, 15, 3),
(10, 15, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Graciela VonRueden', 'devante.krajcik@example.org', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7mwBhEil1zNtABbfwQSFgSLyQeEprXJBM5AFQ80jhVYASLWedIPgY4FjOaKX', '2019-05-30 00:27:45', '2019-05-30 00:27:45'),
(2, 'Jane Kessler', 'brooks.kuhic@example.com', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jHgjmnZzDY', '2019-05-30 00:27:45', '2019-05-30 00:27:45'),
(3, 'Judah Glover DVM', 'kailey22@example.org', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FH8QIUc6Xo', '2019-05-30 00:27:45', '2019-05-30 00:27:45'),
(4, 'Loy Jones', 'gina65@example.org', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U19btgZIVs', '2019-05-30 00:27:45', '2019-05-30 00:27:45'),
(5, 'Mr. Urban Mueller Jr.', 'smayert@example.net', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jOLxBDdacaxzADHruV2EcOuJnRLO660Lj3ZmPWJGwOQCxg8DAnN2xCkIu1WR', '2019-05-30 00:27:46', '2019-05-30 00:27:46'),
(6, 'Jodie Feest MD', 'mandy68@example.org', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ndgEhwn1VR', '2019-05-30 00:27:46', '2019-05-30 00:27:46'),
(7, 'Oran Jacobs', 'marley59@example.com', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KlmuSPMexo', '2019-05-30 00:27:46', '2019-05-30 00:27:46'),
(8, 'Destiny Shanahan', 'ashlee20@example.net', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6PJp9Eq76KfrnHbJdE8ylYzcpnPoN7cHvGpzUyJEqzP1EAErcEo9ASomlqUy', '2019-05-30 00:27:46', '2019-05-30 00:27:46'),
(9, 'Sofia Ferry', 'roberts.emmitt@example.org', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6I2jNAEovM', '2019-05-30 00:27:46', '2019-05-30 00:27:46'),
(10, 'Elwin Oberbrunner', 'nader.maverick@example.com', '2019-05-30 00:27:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RbA05qFiil', '2019-05-30 00:27:46', '2019-05-30 00:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_categories_post_id_foreign` (`post_id`),
  ADD KEY `post_categories_category_id_foreign` (`category_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `post_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
