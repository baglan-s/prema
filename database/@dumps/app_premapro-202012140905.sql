/*
 Navicat Premium Data Transfer

 Source Server         : AppServ
 Source Server Type    : MariaDB
 Source Server Version : 100412
 Source Host           : localhost:3306
 Source Schema         : app_premapro

 Target Server Type    : MariaDB
 Target Server Version : 100412
 File Encoding         : 65001

 Date: 14/12/2020 09:06:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for feeds
-- ----------------------------
DROP TABLE IF EXISTS `feeds`;
CREATE TABLE `feeds`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `long_start` timestamp(0) NULL DEFAULT NULL,
  `long_end` timestamp(0) NULL DEFAULT NULL,
  `short` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `short_start` timestamp(0) NULL DEFAULT NULL,
  `short_end` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `team_id`(`team_id`) USING BTREE,
  CONSTRAINT `feeds_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of feeds
-- ----------------------------
INSERT INTO `feeds` VALUES (1, 1, '', NULL, NULL, 'https://woodspect.com/offers.xml', '2020-12-14 09:22:16', '2020-12-14 09:22:17', '2020-12-09 16:42:58', '2020-12-11 13:02:10');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2020_11_23_000001_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (2, '2020_11_23_000002_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_11_23_000003_create_roles_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_11_23_000004_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_11_23_000005_create_permission_role_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_11_23_000006_create_users_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_11_23_000007_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_11_23_000008_create_teams_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_11_23_000009_create_feeds_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_11_23_000010_create_offers_table', 1);

-- ----------------------------
-- Table structure for offers
-- ----------------------------
DROP TABLE IF EXISTS `offers`;
CREATE TABLE `offers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатоор записи',
  `team_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Идентификатор организации',
  `internal_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Внутренний идентификатор объекта',
  `last_update_date` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Дата последнего обновления',
  `creation_date` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Дата создания предложения',
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Название объекта (Улица + дом)',
  `area` float(6, 1) NOT NULL COMMENT 'Площадь объекта',
  `status` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Статус объекта (sale|rent)',
  `sale_entire` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Продажа всего объекта (0|1)',
  `rent_entire` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Аренда всего объекта (0|1)',
  `price_sale` int(10) UNSIGNED NULL DEFAULT NULL COMMENT 'Цена продажи всего объекта',
  `price_rent` int(10) NULL DEFAULT NULL COMMENT 'Цена аренды всего объекта',
  `price_unit` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ценовая денежная единица',
  `price_period` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ценовой период аренды',
  `location` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Местоположение объекта (json)',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Текстовое описание',
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Изображения объекта (json)',
  `building` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Характеристики здания объекта (json)',
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Дополнительные особенности объекта (json)',
  `sales_agent` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Информация о продавце/арендодателе (json)',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `internal_id`(`internal_id`) USING BTREE,
  INDEX `last_update_date`(`last_update_date`) USING BTREE,
  INDEX `team_id`(`team_id`) USING BTREE,
  CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of offers
-- ----------------------------
INSERT INTO `offers` VALUES (2, 1, '2739245180604', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Лаборатория', 148.0, 'rent', 0, 1, NULL, 117155, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"Полюстровский пр., д. 59, литер Ф\",\"metro\":[\"Выборгская\",\"ПлощадьЛенина\",\"Лесная\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"4\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (3, 1, '2532635180604', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Мельник', 1330.0, 'rent', 0, 1, NULL, 1729000, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"ул. Проф. Качалова, д. 7, Лит. А, Лит. Б\",\"metro\":[\"ПлощадьАлександраНевского\",\"Новочеркасская\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"11\",\"lift\":\"yes\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (4, 1, '2583287201116', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Урал-Плаза', 175.0, 'rent', 0, 1, NULL, 122552, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"ул. Уральская, д. 19 корпус 10\",\"metro\":[\"Приморская\",\"Спортивная\",\"Василеостровская\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"6\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (5, 1, '2490761201111', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Потапов', 241.0, 'rent', 0, 1, NULL, 215008, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"ш. Революции, д. 69, корп. 102\",\"metro\":[\"Ладожская\",\"ПроспектБольшевиков\",\"Новочеркасская\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"4\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (6, 1, '2164659200803', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Троицкий', 348.0, 'rent', 0, 1, NULL, 662492, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"ул. Мира, д. 3\",\"metro\":[\"Горьковская\",\"Петроградская\",\"Чкаловская\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"5\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (7, 1, '2369169201117', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Радуга', 95.0, 'rent', 0, 1, NULL, 81000, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"6 линия В.О., д. 63\",\"metro\":[\"Василеостровская\",\"Спортивная\",\"Адмиралтейская\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"5\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (8, 1, '2730017200803', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Кондратьевский 2', 187.0, 'rent', 0, 1, NULL, 177893, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"Кондратьевский пр., д. 2 к. 4\",\"metro\":[\"ПлощадьЛенин\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"7\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (9, 1, '2397979200803', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Кантемировский', 75.0, 'rent', 0, 1, NULL, 63580, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"Аптекарская наб., д.12\",\"metro\":[\"Петроградская\",\"Выборгская\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"5\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (10, 1, '2681827200803', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Бухарестская 8', 238.0, 'rent', 0, 1, NULL, 143280, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"ул. Бухарестская, д. 8\",\"metro\":[\"Волковская\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"6\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `offers` VALUES (11, 1, '2731526200619', '2020-11-23T10:23:08+03:00', '2020-11-23T08:00:00+03:00', 'Эврика', 455.0, 'rent', 0, 1, NULL, 455000, 'RUB', 'month', '{\"country\":\"Россия\",\"city\":\"Санкт-Петербург\",\"address\":\"Седова ул., 11, литер А\",\"metro\":[\"Елизаровская\"],\"lat\":[],\"lon\":[]}', 'Описание бизнес-центра...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/building-image-03.jpg\",\"\"]', '{\"type\":\"business center\",\"storeys\":\"10\",\"lift\":\"no\"}', '{\"car-place\":\"parking\"}', '{\"phone\":\"+7 (812) 409-43-85\",\"organization\":\"Биз-цен\",\"photo\":\"http:\\/\\/www.biz-cen.ru\\/spam\\/images\\/logo.jpg\",\"url\":\"https:\\/\\/www.biz-cen.ru\\/\",\"category\":\"agency\"}', '2020-12-12 01:04:08', '2020-12-12 01:04:08');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_idfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_idfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for propertys
-- ----------------------------
DROP TABLE IF EXISTS `propertys`;
CREATE TABLE `propertys`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатоор записи',
  `offer_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Идентификатор принадлежности к предложению',
  `internal_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Внутренний идентификатор объекта',
  `last_update_date` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Дата последнего обновления',
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'office' COMMENT 'Название объекта',
  `area` float(5, 1) UNSIGNED NOT NULL COMMENT 'Площадь объекта',
  `status` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rent' COMMENT 'Статус объекта (sale|rent)',
  `price_sale` int(10) UNSIGNED NULL DEFAULT NULL COMMENT 'Цена продажи объекта',
  `price_rent` int(10) UNSIGNED NULL DEFAULT NULL COMMENT 'Цена аренды бъекта',
  `price_unit` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'RUB' COMMENT 'Ценовая денежная единица',
  `price_period` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'month' COMMENT 'Ценовой период аренды',
  `current_tenant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Текущий арендатор',
  `for_sale` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Объект на продажу (0|1)',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Текстовое описание',
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Изображения объекта (json)',
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Дополнительные особенности объекта (json)',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `internal_id`(`internal_id`) USING BTREE,
  INDEX `offer_id`(`offer_id`) USING BTREE,
  INDEX `last_update_date`(`last_update_date`) USING BTREE,
  CONSTRAINT `propertys_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of propertys
-- ----------------------------
INSERT INTO `propertys` VALUES (4, 2, '2739295180604', '2020-11-23T10:23:08+03:00', 'office', 14.0, 'rent', NULL, 14000, 'RUB', 'month', 'Tenant Name', 0, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"4\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (5, 2, '2738459180604', '2020-11-23T10:23:08+03:00', 'office', 40.0, 'rent', NULL, 60000, 'RUB', 'month', 'Tenant Name', 0, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"4\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (6, 3, '2532633180604', '2020-11-23T10:23:08+03:00', 'office', 76.5, 'rent', NULL, 99450, 'RUB', 'month', 'Tenant Name', 0, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"11\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (7, 3, '2532616180604', '2020-11-23T10:23:08+03:00', 'office', 72.5, 'rent', NULL, 94250, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"11\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (8, 3, '2532622180604', '2020-11-23T10:23:08+03:00', 'office', 71.9, 'rent', NULL, 93470, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"11\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (9, 3, '2532630180604', '2020-11-23T10:23:08+03:00', 'office', 48.6, 'rent', NULL, 63180, 'RUB', 'month', 'Tenant Name', 0, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"11\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (10, 4, '2583297201116', '2020-11-23T10:23:08+03:00', 'office', 53.0, 'rent', NULL, 37116, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"1\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (11, 4, '2583272201116', '2020-11-23T10:23:08+03:00', 'office', 45.7, 'rent', NULL, 43510, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"1\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (12, 4, '2729860201116', '2020-11-23T10:23:08+03:00', 'office', 70.0, 'rent', NULL, 41930, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"1\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (13, 5, '2490785201111', '2020-11-23T10:23:08+03:00', 'office', 40.0, 'rent', NULL, 36000, 'RUB', 'month', 'Tenant Name', 0, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"4\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (14, 5, '2490710201111', '2020-11-23T10:23:08+03:00', 'office', 59.0, 'rent', NULL, 53100, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"4\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (15, 6, '2164655200803', '2020-11-23T10:23:08+03:00', 'office', 161.4, 'rent', NULL, 306498, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"1\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (16, 7, '2369168201117', '2020-11-23T10:23:08+03:00', 'office', 48.2, 'rent', NULL, 25064, 'RUB', 'month', 'Tenant Name', 0, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"2\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (17, 8, '2730016200803', '2020-11-23T10:23:08+03:00', 'office', 73.0, 'rent', NULL, 69445, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"7\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (18, 9, '2397959200803', '2020-11-23T10:23:08+03:00', 'office', 57.8, 'rent', NULL, 49130, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"-1\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (19, 9, '2397962200803', '2020-11-23T10:23:08+03:00', 'office', 17.0, 'rent', NULL, 14450, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"-1\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (20, 10, '2617687200803', '2020-11-23T10:23:08+03:00', 'office', 40.0, 'rent', NULL, 22800, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"6\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (21, 10, '2697376200803', '2020-11-23T10:23:08+03:00', 'office', 36.0, 'rent', NULL, 20520, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"6\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (22, 10, '2738487200803', '2020-11-23T10:23:08+03:00', 'office', 27.0, 'rent', NULL, 15390, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"6\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (23, 10, '21579599617200803', '2020-11-23T10:23:08+03:00', 'office', 34.0, 'rent', NULL, 19380, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"6\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (24, 10, '2157967200803', '2020-11-23T10:23:08+03:00', 'office', 42.0, 'rent', NULL, 24168, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"6\"}', '2020-12-12 00:31:41', '2020-12-12 00:31:41');
INSERT INTO `propertys` VALUES (27, 11, '2367882200619', '2020-11-23T10:23:08+03:00', 'office', 76.0, 'rent', NULL, 91200, 'RUB', 'month', 'Tenant Name', 0, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"3\"}', '2020-12-12 01:04:09', '2020-12-12 01:04:09');
INSERT INTO `propertys` VALUES (28, 11, '2664843200619', '2020-11-23T10:23:08+03:00', 'office', 37.0, 'rent', NULL, 37000, 'RUB', 'month', 'Tenant Name', 0, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"4\"}', '2020-12-12 01:04:09', '2020-12-12 01:04:09');
INSERT INTO `propertys` VALUES (29, 11, '449077200619', '2020-11-23T10:23:08+03:00', 'office', 39.0, 'rent', NULL, 46800, 'RUB', 'month', 'Tenant Name', 1, 'Описание офиса...', '[\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-01.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-02.jpg\",\"https:\\/\\/www.biz-cen.ru\\/photos\\/office-image-03.jpg\",\"\"]', '{\"floor\":\"5\"}', '2020-12-12 01:04:09', '2020-12-12 01:04:09');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'Administrator', 'Site administrator', 0, '2020-12-07 09:28:02', '2020-12-07 09:28:02');
INSERT INTO `roles` VALUES (2, 'guest', 'Guest', 'Unverified user', 1, '2020-12-07 09:28:02', '2020-12-07 09:28:02');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE INDEX `sessions_id_unique`(`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `teams_user_id_index`(`user_id`) USING BTREE,
  CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES (1, 1, 'Test Company', NULL, 1, '2020-12-07 09:28:02', '2020-12-07 09:28:02');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `team_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `last_login` timestamp(0) NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unconfirmed',
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `users_name_index`(`name`) USING BTREE,
  UNIQUE INDEX `users_phone_index`(`phone`) USING BTREE,
  INDEX `users_status_index`(`status`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_idfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin@admin.com', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Active', '2020-12-07 09:28:02', NULL, '2020-12-07 09:28:02', '2020-12-07 09:28:02');

SET FOREIGN_KEY_CHECKS = 1;
