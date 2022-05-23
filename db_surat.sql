/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100604
 Source Host           : localhost:3306
 Source Schema         : db_surat

 Target Server Type    : MySQL
 Target Server Version : 100604
 File Encoding         : 65001

 Date: 20/01/2022 11:37:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_logs
-- ----------------------------
DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE `activity_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of activity_logs
-- ----------------------------
BEGIN;
INSERT INTO `activity_logs` VALUES (1, 'admin', 1, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/admin/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.55 Safari/537.36', '2021-12-02 14:19:20', '2021-12-02 14:19:20');
INSERT INTO `activity_logs` VALUES (2, 'admin', 1, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/admin/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-12 00:09:37', '2022-01-12 00:09:37');
INSERT INTO `activity_logs` VALUES (3, 'admin', 1, 'Daftar Surat', 'Menambah Surat Baru: Peminjaman Barang', 'POST', 'https://e-surat.test/admin/letters', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-12 00:44:36', '2022-01-12 00:44:36');
INSERT INTO `activity_logs` VALUES (4, 'admin', 1, 'Warga', 'Menambah Data Warga: Palakentang', 'POST', 'https://e-surat.test/admin/users', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-12 00:48:02', '2022-01-12 00:48:02');
INSERT INTO `activity_logs` VALUES (5, 'admin', 1, 'User', 'Menmperbarui Data Warga: Palakentang', 'PATCH', 'https://e-surat.test/admin/users/1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-12 00:49:00', '2022-01-12 00:49:00');
INSERT INTO `activity_logs` VALUES (6, 'user', 1, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-12 00:49:54', '2022-01-12 00:49:54');
INSERT INTO `activity_logs` VALUES (7, 'admin', 1, 'Edit Surat', 'Memperbarui Surat: Peminjaman Barang', 'PATCH', 'https://e-surat.test/admin/letters/1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-12 00:51:05', '2022-01-12 00:51:05');
INSERT INTO `activity_logs` VALUES (8, 'user', 1, 'Pengajuan Surat', 'Mengajukan Surat Baru: Peminjaman Barang', 'POST', 'https://e-surat.test/submissions/store/1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-12 00:51:26', '2022-01-12 00:51:26');
INSERT INTO `activity_logs` VALUES (9, 'admin', 1, 'Warga', 'Berhasil Mengubah Status Pengajuan Surat: #1', 'PATCH', 'https://e-surat.test/admin/submissions/status/1/1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-12 00:53:16', '2022-01-12 00:53:16');
INSERT INTO `activity_logs` VALUES (10, 'admin', 1, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/admin/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 00:44:43', '2022-01-19 00:44:43');
INSERT INTO `activity_logs` VALUES (11, 'admin', 4, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/admin/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 00:51:19', '2022-01-19 00:51:19');
INSERT INTO `activity_logs` VALUES (12, 'admin', 4, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/admin/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:08:14', '2022-01-19 01:08:14');
INSERT INTO `activity_logs` VALUES (13, 'admin', 1, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/admin/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:14:14', '2022-01-19 01:14:14');
INSERT INTO `activity_logs` VALUES (14, 'admin', 1, 'User', 'Menmperbarui Data Warga: Palakentang', 'PATCH', 'https://e-surat.test/admin/users/1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:14:29', '2022-01-19 01:14:29');
INSERT INTO `activity_logs` VALUES (15, 'user', 1, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:14:44', '2022-01-19 01:14:44');
INSERT INTO `activity_logs` VALUES (16, 'admin', 1, 'Daftar Surat', 'Menambah Surat Baru: Pengadaan Barang', 'POST', 'https://e-surat.test/admin/letters', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:18:52', '2022-01-19 01:18:52');
INSERT INTO `activity_logs` VALUES (17, 'user', 1, 'Pengajuan Surat', 'Mengajukan Surat Baru: Pengadaan Barang', 'POST', 'https://e-surat.test/submissions/store/2', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:20:07', '2022-01-19 01:20:07');
INSERT INTO `activity_logs` VALUES (18, 'admin', 1, 'Warga', 'Berhasil Memperbarui Pengajuan Surat: #2', 'PATCH', 'https://e-surat.test/admin/submissions/update/2', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:25:12', '2022-01-19 01:25:12');
INSERT INTO `activity_logs` VALUES (19, 'admin', 1, 'Warga', 'Berhasil Mengubah Status Pengajuan Surat: #2', 'PATCH', 'https://e-surat.test/admin/submissions/status/2/1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:26:07', '2022-01-19 01:26:07');
INSERT INTO `activity_logs` VALUES (20, 'user', 1, 'Pengajuan Surat', 'Mengajukan Surat Baru: Pengadaan Barang', 'POST', 'https://e-surat.test/submissions/store/2', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 01:42:49', '2022-01-19 01:42:49');
INSERT INTO `activity_logs` VALUES (21, 'user', 1, 'Pengajuan Surat', 'Mengajukan Surat Baru: Peminjaman Barang', 'POST', 'https://e-surat.test/submissions/store/1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 02:15:14', '2022-01-19 02:15:14');
INSERT INTO `activity_logs` VALUES (22, 'admin', 4, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/admin/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-19 12:31:17', '2022-01-19 12:31:17');
INSERT INTO `activity_logs` VALUES (23, 'admin', 1, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/admin/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-20 11:36:15', '2022-01-20 11:36:15');
INSERT INTO `activity_logs` VALUES (24, 'admin', 1, 'User', 'Menmperbarui Data Warga: Palakentang', 'PATCH', 'https://e-surat.test/admin/users/1', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-20 11:42:20', '2022-01-20 11:42:20');
INSERT INTO `activity_logs` VALUES (25, 'user', 1, 'Login', 'Masuk Ke Website', 'POST', 'https://e-surat.test/login', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-20 11:42:40', '2022-01-20 11:42:40');
INSERT INTO `activity_logs` VALUES (26, 'admin', 1, 'Warga', 'Berhasil Memperbarui Pengajuan Surat: #12', 'PATCH', 'https://e-surat.test/admin/submissions/update/12', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-20 12:06:48', '2022-01-20 12:06:48');
INSERT INTO `activity_logs` VALUES (27, 'admin', 1, 'Warga', 'Berhasil Memperbarui Pengajuan Surat: #12', 'PATCH', 'https://e-surat.test/admin/submissions/update/12', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36', '2022-01-20 12:06:54', '2022-01-20 12:06:54');
COMMIT;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assets/images/users/user-1.jpg',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
BEGIN;
INSERT INTO `admins` VALUES (1, 'assets/images/users/user-1.jpg', 'Administrator', 'admin', '$2y$10$ykkxmMk6Ww26QiZO/5Z.r.q960UkyW7sX3saCjMty/yGPYe5N50iq', NULL, '2021-12-02 14:06:00', '2021-12-02 14:06:00', NULL);
INSERT INTO `admins` VALUES (4, 'assets/images/users/user-1.jpg', 'Dir', 'dir', '$2y$10$wk0lE7qvL0NcT9ywqNAI7uXq6rWEJGbOaN03KmQsA.r3nELwymWi.', NULL, '2022-01-19 00:50:06', '2022-01-19 00:50:06', NULL);
INSERT INTO `admins` VALUES (5, 'assets/images/users/user-1.jpg', 'Sekertaris', 'sekertaris', '$2y$10$hU7hJvfmb2vyjNjNFXyfoOYvHtSfYYXvkpSU7E45RuO/DImgoAsgW', NULL, '2022-01-19 00:50:06', '2022-01-19 00:50:06', NULL);
INSERT INTO `admins` VALUES (6, 'assets/images/users/user-1.jpg', 'Dirjen', 'dirjen', '$2y$10$b4jREMukg37Ciz2BDFGBvu6PMgXz8.g0o49kOaybjvC.85Wm56ASC', NULL, '2022-01-19 00:50:06', '2022-01-19 00:50:06', NULL);
INSERT INTO `admins` VALUES (7, 'assets/images/users/user-1.jpg', 'PT', 'pt', '$2y$10$VgASKExdPe1FifOrHj4a7eT742gHZAIwqIBejZHVrSfam6zIWYkSu', NULL, '2022-01-19 00:50:06', '2022-01-19 00:50:06', NULL);
INSERT INTO `admins` VALUES (8, 'assets/images/users/user-1.jpg', 'PN', 'pn', '$2y$10$VR50e0Ax8P0buiGO/4is1O1akLdjYlHOm4J.wsZ6pEO1Dk0.iQRzG', NULL, '2022-01-19 00:50:06', '2022-01-19 00:50:06', NULL);
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for letters
-- ----------------------------
DROP TABLE IF EXISTS `letters`;
CREATE TABLE `letters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `status` enum('On','Off') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of letters
-- ----------------------------
BEGIN;
INSERT INTO `letters` VALUES (1, 'Peminjaman Barang', '<p>Template surat peminjaman Barang</p>', '[{\"input_label\":\"kepada\",\"input_name\":\"kepada\",\"input_type\":\"text\"},{\"input_label\":\"perihal\",\"input_name\":\"perihal\",\"input_type\":\"text\"}]', 'On', '2022-01-12 00:44:36', '2022-01-12 00:51:05', NULL);
INSERT INTO `letters` VALUES (2, 'Pengadaan Barang', '<p>Template Surat Pengadaan Barang</p>', '[{\"input_label\":\"Editor\",\"input_name\":\"Editor\",\"input_type\":\"editor\"},{\"input_label\":\"Number\",\"input_name\":\"Number\",\"input_type\":\"number\"},{\"input_label\":\"String\",\"input_name\":\"String\",\"input_type\":\"text\"},{\"input_label\":\"Textarea\",\"input_name\":\"Textarea\",\"input_type\":\"textarea\"}]', 'On', '2022-01-19 01:18:52', '2022-01-19 01:18:52', NULL);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2017_08_24_000000_create_settings_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_07_01_125340_create_admins_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_07_01_125612_create_letters_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_07_01_125717_create_submissions_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_07_02_073751_create_activity_logs_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_07_11_233445_create_signatories_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_08_08_225641_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (11, '2020_08_22_131035_add_field_phone_number_to_users_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
BEGIN;
INSERT INTO `settings` VALUES (1, 'leftlogo', 'assets/images/letter/badilum.png');
INSERT INTO `settings` VALUES (2, 'rightlogo', 'assets/images/letter/right.png');
INSERT INTO `settings` VALUES (3, 'districts', 'GIANYAR');
INSERT INTO `settings` VALUES (4, 'sub-districts', 'PAYANGAN');
INSERT INTO `settings` VALUES (5, 'village', 'BRESELA');
INSERT INTO `settings` VALUES (6, 'address', 'Jalan Amertha');
INSERT INTO `settings` VALUES (7, 'postal_code', '81154');
INSERT INTO `settings` VALUES (8, 'website', 'http://Busungbiu-buleleng.desa.id');
INSERT INTO `settings` VALUES (9, 'signatory_active', '1');
INSERT INTO `settings` VALUES (10, 'whatsapp', '6285777727179');
COMMIT;

-- ----------------------------
-- Table structure for signatories
-- ----------------------------
DROP TABLE IF EXISTS `signatories`;
CREATE TABLE `signatories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of signatories
-- ----------------------------
BEGIN;
INSERT INTO `signatories` VALUES (1, 'Joko Widodo', 'Kepala Desa', '2021-12-02 14:06:01', '2021-12-02 14:06:01', NULL);
COMMIT;

-- ----------------------------
-- Table structure for submissions
-- ----------------------------
DROP TABLE IF EXISTS `submissions`;
CREATE TABLE `submissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `letter_id` bigint(20) unsigned NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `approval_status` tinyint(4) NOT NULL,
  `approval_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of submissions
-- ----------------------------
BEGIN;
INSERT INTO `submissions` VALUES (2, 1, 2, '123', '{\"header\":\"<p>a<\\/p>\",\"body\":\"<table style=\\\"border-collapse: collapse; width: 100%; border-style: none;\\\" border=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 12.8169%;\\\">Lampiran<\\/td>\\r\\n<td style=\\\"width: 1.14254%;\\\">:<\\/td>\\r\\n<td style=\\\"width: 82.7885%;\\\">&nbsp;<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"width: 12.8169%;\\\">Hal<\\/td>\\r\\n<td style=\\\"width: 1.14254%;\\\">:<\\/td>\\r\\n<td style=\\\"width: 82.7885%;\\\">&nbsp;<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<p>Kepada Yth, <br \\/>??<br \\/>[Alamat] <br \\/>[Kota]<\\/p>\",\"footer\":\"<table style=\\\"border-collapse: collapse; width: 100%; border-style: none;\\\" border=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 12.8169%;\\\">Lampiran<\\/td>\\r\\n<td style=\\\"width: 1.14254%;\\\">:<\\/td>\\r\\n<td style=\\\"width: 82.7885%;\\\">&nbsp;<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"width: 12.8169%;\\\">Hal<\\/td>\\r\\n<td style=\\\"width: 1.14254%;\\\">:<\\/td>\\r\\n<td style=\\\"width: 82.7885%;\\\">&nbsp;<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<p>Kepada Yth, <br \\/>??<br \\/>[Alamat] <br \\/>[Kota]<\\/p>\"}', 0, '2022-01-19 01:26:07', 1, '2022-01-19 01:20:06', '2022-01-20 11:58:14');
INSERT INTO `submissions` VALUES (3, 1, 2, NULL, '{\"header\":\"<p>a<\\/p>\",\"body\":\"<table style=\\\"border-collapse: collapse; width: 100%; border-style: none;\\\" border=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 12.8169%;\\\">Lampiran<\\/td>\\r\\n<td style=\\\"width: 1.14254%;\\\">:<\\/td>\\r\\n<td style=\\\"width: 82.7885%;\\\">&nbsp;<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"width: 12.8169%;\\\">Hal<\\/td>\\r\\n<td style=\\\"width: 1.14254%;\\\">:<\\/td>\\r\\n<td style=\\\"width: 82.7885%;\\\">&nbsp;<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<p>Kepada Yth, <br \\/>??<br \\/>[Alamat] <br \\/>[Kota]<\\/p>\",\"footer\":\"<table style=\\\"border-collapse: collapse; width: 100%; border-style: none;\\\" border=\\\"0\\\">\\r\\n<tbody>\\r\\n<tr>\\r\\n<td style=\\\"width: 12.8169%;\\\">Lampiran<\\/td>\\r\\n<td style=\\\"width: 1.14254%;\\\">:<\\/td>\\r\\n<td style=\\\"width: 82.7885%;\\\">&nbsp;<\\/td>\\r\\n<\\/tr>\\r\\n<tr>\\r\\n<td style=\\\"width: 12.8169%;\\\">Hal<\\/td>\\r\\n<td style=\\\"width: 1.14254%;\\\">:<\\/td>\\r\\n<td style=\\\"width: 82.7885%;\\\">&nbsp;<\\/td>\\r\\n<\\/tr>\\r\\n<\\/tbody>\\r\\n<\\/table>\\r\\n<p>Kepada Yth, <br \\/>??<br \\/>[Alamat] <br \\/>[Kota]<\\/p>\"}', 0, NULL, NULL, '2022-01-19 01:42:48', '2022-01-19 01:42:48');
INSERT INTO `submissions` VALUES (12, 1, 1, '200122123', '[]', 0, NULL, NULL, '2022-01-19 02:42:00', '2022-01-20 12:06:54');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assets/images/users/user-1.jpg',
  `sin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('Laki - Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` enum('Islam','Protestan','Katolik','Hindu','Buddha','Konghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` enum('Belum Kawin','Kawin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_sin_unique` (`sin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'assets/images/users/user-1.jpg', '123123123123123123', 'Palakentang', '$2y$10$evfsqcSD8ZXxXVtnGtjFs.1JuNLY2PJqXIgKsI2UzFHWuLld9Ahre', 'Palakentang', '2022-01-01', 'Laki - Laki', 'ditinggal', 'Islam', 'Belum Kawin', 'Ngarit', '6281215022816', NULL, '2022-01-12 00:48:02', '2022-01-20 11:42:20', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
