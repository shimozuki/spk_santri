/*
 Navicat Premium Data Transfer

 Source Server         : my_local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : spk_profmacth

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 03/07/2025 17:29:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alternatifs
-- ----------------------------
DROP TABLE IF EXISTS `alternatifs`;
CREATE TABLE `alternatifs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `nisn` int NOT NULL,
  `nilai_akhir` double NULL DEFAULT NULL,
  `keterangan_lulus` enum('Lulus','Tidak Lulus') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `alternatifs_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `alternatifs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alternatifs
-- ----------------------------
INSERT INTO `alternatifs` VALUES (8, 'Ahmad Faiz', NULL, 123456, NULL, NULL, '2025-07-03 15:57:15', '2025-07-03 15:57:15');
INSERT INTO `alternatifs` VALUES (9, 'Siti Rohmah', NULL, 98765, NULL, NULL, '2025-07-03 15:57:15', '2025-07-03 15:57:15');
INSERT INTO `alternatifs` VALUES (10, 'Ali Akbar', NULL, 1122, NULL, NULL, '2025-07-03 15:57:15', '2025-07-03 15:57:15');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for hasils
-- ----------------------------
DROP TABLE IF EXISTS `hasils`;
CREATE TABLE `hasils`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `alternatif_id` bigint UNSIGNED NOT NULL,
  `nilai` double(8, 2) NOT NULL,
  `tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Belum Disetujui','Disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Disetujui',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `hasils_alternatif_id_foreign`(`alternatif_id` ASC) USING BTREE,
  CONSTRAINT `hasils_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasils
-- ----------------------------
INSERT INTO `hasils` VALUES (1, 8, 3.80, '2025', 'Disetujui', '2025-07-03 08:15:36', '2025-07-03 08:39:22');
INSERT INTO `hasils` VALUES (2, 9, 4.80, '2025', 'Disetujui', '2025-07-03 08:15:36', '2025-07-03 08:39:22');
INSERT INTO `hasils` VALUES (3, 10, 4.70, '2025', 'Disetujui', '2025-07-03 08:15:36', '2025-07-03 08:39:22');

-- ----------------------------
-- Table structure for kriterias
-- ----------------------------
DROP TABLE IF EXISTS `kriterias`;
CREATE TABLE `kriterias`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Core Factor','Secondary Factor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriterias
-- ----------------------------
INSERT INTO `kriterias` VALUES (7, 'C1', 'Ujian Tulis', 'Core Factor', 5.00, '2025-07-03 15:59:26', '2025-07-03 15:59:26');
INSERT INTO `kriterias` VALUES (8, 'C2', 'Ujian Praktik', 'Core Factor', 5.00, '2025-07-03 15:59:26', '2025-07-03 15:59:26');
INSERT INTO `kriterias` VALUES (9, 'C3', 'Hafalan Qur\'an', 'Core Factor', 3.00, '2025-07-03 15:59:26', '2025-07-03 15:59:26');
INSERT INTO `kriterias` VALUES (10, 'C4', 'Sikap dan Adab', 'Secondary Factor', 3.00, '2025-07-03 15:59:26', '2025-07-03 15:59:26');
INSERT INTO `kriterias` VALUES (11, 'C5', 'Wawancara', 'Secondary Factor', 4.00, '2025-07-03 15:59:26', '2025-07-03 15:59:26');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_01_21_172638_create_alternatifs_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_01_22_121514_create_kriterias_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_01_22_122823_create_sub_kriterias_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_01_22_181133_create_penilaians_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_01_25_054842_create_hasils_table', 1);
INSERT INTO `migrations` VALUES (11, '2025_07_03_072440_update_alternatifs_table_for_spk', 2);
INSERT INTO `migrations` VALUES (12, '2025_07_03_072713_revise_alternatifs_table_for_santri', 3);
INSERT INTO `migrations` VALUES (13, '2025_07_03_074146_alter_user_id_nullable_on_alternatifs', 4);
INSERT INTO `migrations` VALUES (14, '2025_07_03_083213_add_tahun_and_status_to_hasils_table', 5);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for penilaians
-- ----------------------------
DROP TABLE IF EXISTS `penilaians`;
CREATE TABLE `penilaians`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `alternatif_id` bigint UNSIGNED NOT NULL,
  `kriteria_id` bigint UNSIGNED NOT NULL,
  `subkriteria_id` bigint UNSIGNED NOT NULL,
  `nilai` double(8, 2) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penilaians_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `penilaians_alternatif_id_foreign`(`alternatif_id` ASC) USING BTREE,
  INDEX `penilaians_kriteria_id_foreign`(`kriteria_id` ASC) USING BTREE,
  INDEX `penilaians_subkriteria_id_foreign`(`subkriteria_id` ASC) USING BTREE,
  CONSTRAINT `penilaians_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penilaians_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penilaians_subkriteria_id_foreign` FOREIGN KEY (`subkriteria_id`) REFERENCES `sub_kriterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penilaians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penilaians
-- ----------------------------
INSERT INTO `penilaians` VALUES (1, 1, 8, 7, 15, 5.00, '2025-07-03 08:04:47', '2025-07-03 08:04:47');
INSERT INTO `penilaians` VALUES (2, 1, 8, 8, 18, 5.00, '2025-07-03 08:04:47', '2025-07-03 08:04:47');
INSERT INTO `penilaians` VALUES (3, 1, 8, 9, 20, 1.00, '2025-07-03 08:04:47', '2025-07-03 08:04:47');
INSERT INTO `penilaians` VALUES (4, 1, 8, 10, 26, 2.00, '2025-07-03 08:04:47', '2025-07-03 08:04:47');
INSERT INTO `penilaians` VALUES (5, 1, 8, 11, 30, 1.00, '2025-07-03 08:04:47', '2025-07-03 08:04:47');
INSERT INTO `penilaians` VALUES (6, 1, 9, 7, 15, 5.00, '2025-07-03 08:05:09', '2025-07-03 08:05:09');
INSERT INTO `penilaians` VALUES (7, 1, 9, 8, 19, 5.00, '2025-07-03 08:05:09', '2025-07-03 08:05:09');
INSERT INTO `penilaians` VALUES (8, 1, 9, 9, 21, 2.00, '2025-07-03 08:05:09', '2025-07-03 08:05:09');
INSERT INTO `penilaians` VALUES (9, 1, 9, 10, 27, 3.00, '2025-07-03 08:05:09', '2025-07-03 08:05:09');
INSERT INTO `penilaians` VALUES (10, 1, 9, 11, 33, 4.00, '2025-07-03 08:05:09', '2025-07-03 08:05:09');
INSERT INTO `penilaians` VALUES (11, 1, 10, 7, 16, 5.00, '2025-07-03 08:05:22', '2025-07-03 08:05:22');
INSERT INTO `penilaians` VALUES (12, 1, 10, 8, 19, 5.00, '2025-07-03 08:05:22', '2025-07-03 08:05:22');
INSERT INTO `penilaians` VALUES (13, 1, 10, 9, 22, 3.00, '2025-07-03 08:05:22', '2025-07-03 08:05:22');
INSERT INTO `penilaians` VALUES (14, 1, 10, 10, 29, 5.00, '2025-07-03 08:05:22', '2025-07-03 08:05:22');
INSERT INTO `penilaians` VALUES (15, 1, 10, 11, 33, 4.00, '2025-07-03 08:05:22', '2025-07-03 08:05:22');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for sub_kriterias
-- ----------------------------
DROP TABLE IF EXISTS `sub_kriterias`;
CREATE TABLE `sub_kriterias`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kriteria_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sub_kriterias_kriteria_id_foreign`(`kriteria_id` ASC) USING BTREE,
  CONSTRAINT `sub_kriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_kriterias
-- ----------------------------
INSERT INTO `sub_kriterias` VALUES (14, 7, 'Matematika', 5.00, '2025-07-03 16:00:41', '2025-07-03 16:00:41');
INSERT INTO `sub_kriterias` VALUES (15, 7, 'Bahasa Indonesia', 5.00, '2025-07-03 16:00:41', '2025-07-03 16:00:41');
INSERT INTO `sub_kriterias` VALUES (16, 7, 'Fiqih', 5.00, '2025-07-03 16:00:41', '2025-07-03 16:00:41');
INSERT INTO `sub_kriterias` VALUES (17, 7, 'Aqidah Akhlak', 5.00, '2025-07-03 16:00:41', '2025-07-03 16:00:41');
INSERT INTO `sub_kriterias` VALUES (18, 8, 'Praktek Ibadah', 5.00, '2025-07-03 16:00:56', '2025-07-03 16:00:56');
INSERT INTO `sub_kriterias` VALUES (19, 8, 'Membaca Qur\'an', 5.00, '2025-07-03 16:00:56', '2025-07-03 16:00:56');
INSERT INTO `sub_kriterias` VALUES (20, 9, 'Sangat Kurang', 1.00, '2025-07-03 16:01:43', '2025-07-03 16:01:43');
INSERT INTO `sub_kriterias` VALUES (21, 9, 'Kurang', 2.00, '2025-07-03 16:01:43', '2025-07-03 16:01:43');
INSERT INTO `sub_kriterias` VALUES (22, 9, 'Cukup', 3.00, '2025-07-03 16:01:43', '2025-07-03 16:01:43');
INSERT INTO `sub_kriterias` VALUES (23, 9, 'Baik', 4.00, '2025-07-03 16:01:43', '2025-07-03 16:01:43');
INSERT INTO `sub_kriterias` VALUES (24, 9, 'Sangat Baik', 5.00, '2025-07-03 16:01:43', '2025-07-03 16:01:43');
INSERT INTO `sub_kriterias` VALUES (25, 10, 'Sangat Kurang', 1.00, '2025-07-03 16:02:19', '2025-07-03 16:02:19');
INSERT INTO `sub_kriterias` VALUES (26, 10, 'Kurang', 2.00, '2025-07-03 16:02:19', '2025-07-03 16:02:19');
INSERT INTO `sub_kriterias` VALUES (27, 10, 'Cukup', 3.00, '2025-07-03 16:02:19', '2025-07-03 16:02:19');
INSERT INTO `sub_kriterias` VALUES (28, 10, 'Baik', 4.00, '2025-07-03 16:02:19', '2025-07-03 16:02:19');
INSERT INTO `sub_kriterias` VALUES (29, 10, 'Sangat Baik', 5.00, '2025-07-03 16:02:19', '2025-07-03 16:02:19');
INSERT INTO `sub_kriterias` VALUES (30, 11, 'Sangat Kurang', 1.00, '2025-07-03 16:02:35', '2025-07-03 16:02:35');
INSERT INTO `sub_kriterias` VALUES (31, 11, 'Kurang', 2.00, '2025-07-03 16:02:35', '2025-07-03 16:02:35');
INSERT INTO `sub_kriterias` VALUES (32, 11, 'Cukup', 3.00, '2025-07-03 16:02:35', '2025-07-03 16:02:35');
INSERT INTO `sub_kriterias` VALUES (33, 11, 'Baik', 4.00, '2025-07-03 16:02:35', '2025-07-03 16:02:35');
INSERT INTO `sub_kriterias` VALUES (34, 11, 'Sangat Baik', 5.00, '2025-07-03 16:02:35', '2025-07-03 16:02:35');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` enum('Admin','Kepsek','Guru') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'Admin',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$vUR8J/gseUGcCDn8wU439.O6dWPiIBvvWjshDR9DtabacckB2aBFO', NULL, NULL, NULL, 'Admin', NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 'Kepala Sekolah', 'kepsek@example.com', NULL, '$2y$12$Eb2iBTTabWyNpVrPBufY9eYfb2gR6kux02tGgbrTtEbaczIT0WrxK', NULL, NULL, NULL, 'Kepsek', NULL, '2025-07-03 16:24:02', '2025-07-03 16:24:02');
INSERT INTO `users` VALUES (8, 'Guru Penguji', 'guru@example.com', NULL, '$2y$12$Eb2iBTTabWyNpVrPBufY9eYfb2gR6kux02tGgbrTtEbaczIT0WrxK', NULL, NULL, NULL, 'Guru', NULL, '2025-07-03 16:40:02', '2025-07-03 16:40:02');

SET FOREIGN_KEY_CHECKS = 1;
