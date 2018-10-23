-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.19-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Membuang data untuk tabel ecommerce.addresses: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.admins: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `username`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Superadministrator', 'superadmin@app.com', '$2y$10$v6Y59s/NZ89DwIxqMYXnFurt6RenfQcGVUIku4ItzUTdxPhkPuegG', 'superadmin', 'HjJpRfPgv0ZIh3ldWUGOq95J0kUYr0obwYAXkQhbmDxK6ykNm0XWYY11DsWz', '2018-09-07 15:39:55', '2018-09-07 15:39:55');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.banners: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.carts: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`customer_id`, `product_id`, `order_id`, `order_qty`, `created_at`, `updated_at`) VALUES
	(5, 2, NULL, 1, '2018-10-23 03:32:00', '2018-10-23 03:36:41'),
	(5, 1, NULL, 1, '2018-10-23 03:32:12', '2018-10-23 03:36:35');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.images: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`product_id`, `file_name`, `file_type`, `created_at`, `updated_at`) VALUES
	(1, '1_Kick Denim Shirt.jpg', 'Main', '2018-10-22 13:39:52', '2018-10-22 13:39:52'),
	(2, '2_Bravo Shirt.jpg', 'Main', '2018-10-22 13:55:50', '2018-10-22 13:55:50'),
	(3, '3_Jam Tangan Gucci.jpg', 'Main', '2018-10-22 14:33:59', '2018-10-22 14:33:59');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.migrations: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_09_07_102656_create_admins_table', 1),
	(4, '2018_09_13_033547_create_table_addresses', 2),
	(5, '2018_09_13_033953_create_products_table', 3),
	(6, '2018_09_13_035810_create_stocks_table', 4),
	(7, '2018_10_15_111224_create_table_offer', 5),
	(8, '2018_10_16_121304_remove_product_images', 6),
	(11, '2018_10_16_121647_create_images_table', 7),
	(12, '2018_10_16_181953_create_banners_table', 8),
	(13, '2018_10_22_110621_create_orders_table', 9),
	(14, '2018_10_22_133116_products_table_fix', 10),
	(15, '2018_10_23_031839_fix_carts_table', 11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.orders: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.products: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `product_type_id`, `product_name`, `product_price`, `product_desc`, `other_product_desc`, `created_at`, `updated_at`) VALUES
	(1, 15, 'Kick Denim Shirt', '120000', 'Nice Cloth From Kick Denim Production', '100% Fine Clothing, for everyone who loves challenges.', '2018-10-22 13:39:26', '2018-10-22 13:39:26'),
	(2, 15, 'Bravo Shirt', '100000', 'None', 'None', '2018-10-22 13:55:38', '2018-10-22 13:55:38'),
	(3, 17, 'Jam Tangan Gucci', '300000', 'None', 'None', '2018-10-22 14:33:42', '2018-10-22 14:33:42');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.product_types: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `product_types` DISABLE KEYS */;
INSERT INTO `product_types` (`product_type_id`, `product_type_desc`) VALUES
	(15, 'Shirt'),
	(16, 'Jacket'),
	(17, 'Watch');
/*!40000 ALTER TABLE `product_types` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.stocks: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` (`product_id`, `product_qty`) VALUES
	(1, 30),
	(2, 40),
	(3, 12);
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;

-- Membuang data untuk tabel ecommerce.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
	(5, 'Raffi', 'Ramdhani', 'raffi@app.com', '$2y$10$PSNJ0pu5bXGYz3RCXeNLDePvaA5a3pRh1W7DOSStsQX1v2MfAa2H6', 'Male', '08970710895', '2eQFQYdw4o6Pac4qr400U6180JpUxDwvK88gKj3K67fgpQQyCvbdip99Jksm', '2018-10-16 14:26:11', '2018-10-16 14:26:11'),
	(6, 'Fawwaz', 'Baachir', 'fawwaz@app.com', '$2y$10$A730wfL.hTb4yyopQLjGqumPSUHbgA/HJFROlYwI9oR3eG4Z4ucm.', 'Male', '0897123657', 'ybbzxxBkejv8J1hVRwE88MYWfNxG6ogT647GmKixgtab4P0caxFHK6WpoSTh', '2018-10-17 23:47:25', '2018-10-17 23:47:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
