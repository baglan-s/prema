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

 Date: 29/11/2020 22:06:17
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
  `long_date` timestamp(0) NULL DEFAULT NULL,
  `short` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `short_date` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `team_id`(`team_id`) USING BTREE,
  CONSTRAINT `feeds_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of feeds
-- ----------------------------
INSERT INTO `feeds` VALUES (1, 1, '', NULL, 'https://biz-cen.ru/spam/feed_demo.php', '2020-11-29 22:32:13', '2020-11-27 19:12:48', '2020-11-29 22:32:13');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2020_11_23_100000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (2, '2020_11_23_200000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_11_23_300000_create_roles_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_11_23_400000_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_11_23_500000_create_permission_role_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_11_23_600000_create_users_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_11_23_700000_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_11_23_800000_create_teams_table', 1);

-- ----------------------------
-- Table structure for offers
-- ----------------------------
DROP TABLE IF EXISTS `offers`;
CREATE TABLE `offers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатоор записи',
  `team_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Идентификатор организации',
  `parent_id` bigint(20) NULL DEFAULT NULL COMMENT 'Идентификатор родительского объекта',
  `internal_id` bigint(20) NULL DEFAULT NULL COMMENT 'Внутренний идентификатор',
  `creation_date` timestamp(0) NULL DEFAULT NULL COMMENT 'Дата создания объявления',
  `last_update_date` timestamp(0) NULL DEFAULT NULL COMMENT 'Дата последнего обновления',
  `type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Тип сделки (продажа | аренда)',
  `category` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Категория объекта (коммерческая | commercial)',
  `commercial_type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Категория объекта (auto repair | business | free purpose | hotel | land | legal address | manufacturing | office | public catering | retail | warehouse)',
  `commercial_building_type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Тип здания объекта (business center | detached building | residential building | shopping center | warehouse)',
  `purpose` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'Назначение объекта <multiple> (bank | beauty shop | food store | medical center | show room | touragency)',
  `purpose_warehouse` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'Назначение склада <multiple> (alcohol | pharmaceutical storehouse | vegetable storehouse)',
  `lot_number` bigint(20) NULL DEFAULT NULL COMMENT 'Номер лота',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'URL страницы с объявлением',
  `cadastral_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Кадастровый номер объекта',
  `location` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'Местоположение объекта <element set>',
  `sales_agent` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'Инфо о продавце/арендодателе <element set> ',
  `price` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'Цена объекта <element set>',
  `commission` tinyint(4) NULL DEFAULT NULL COMMENT 'Размер комиссии для клиента в процентах (без знака %)',
  `prepayment` tinyint(4) NULL DEFAULT NULL COMMENT 'Размер предоплатв в процентах (без знака %)',
  `security_payment` tinyint(4) NULL DEFAULT NULL COMMENT 'Размер обеспечительного платежа в процентах',
  `rent_pledge` tinyint(1) NULL DEFAULT NULL COMMENT 'Залог (bool)',
  `deal_status` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Тип сделки (direct rent | subrent | sale of lease rights)',
  `cleaning_included` tinyint(1) NULL DEFAULT NULL COMMENT 'Клининг входит в договор аренды (да/нет | true/false | 1/0 | +/-)',
  `utilities_included` tinyint(1) NULL DEFAULT NULL COMMENT 'Коммунальные услуги включены (да/нет | true/false | 1/0 | +/-)',
  `electricity_included` tinyint(1) NULL DEFAULT NULL COMMENT 'Электроэнергия включена (да/нет | true/false | 1/0 | +/-)',
  `area` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'Общая площадь <element set>',
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'Фотография <multiple>',
  `renovation` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ремонт (дизайнерский | евро | с отделкой | требует ремонта | хороший | частичный ремонт | черновая отделка)',
  `quality` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Состояние объекта (отличное | хорошее | нормальное | плохое)',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Дополнительная информация',
  `video_review` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT 'Видео объекта с YouTube и возможность онлайн-показа <element set>',
  `floor` tinyint(3) NULL DEFAULT NULL COMMENT 'Этаж',
  `floors_total` tinyint(3) NULL DEFAULT NULL COMMENT 'Общее количество этажей в здании',
  `entrance_type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Вход в помещение (common | separate)',
  `phone_lines` tinyint(3) NULL DEFAULT NULL COMMENT '	\r\nКоличество телефонных линий',
  `adding_phone_on_request` tinyint(1) NULL DEFAULT NULL COMMENT 'Возможность добавления телефонных линий (да/нет | true/false | 1/0 | +/-)',
  `internet` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие интернета (да/нет | true/false | 1/0 | +/-)',
  `self_selection_telecom` tinyint(1) NULL DEFAULT NULL COMMENT 'Возможность выбора оператора (да/нет | true/false | 1/0 | +/-)',
  `room_furniture` tinyint(1) NULL DEFAULT NULL COMMENT '	\r\nНаличие мебели (bool)',
  `air_conditioner` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие системы кондиционирования (да/нет | true/false | 1/0 | +/-)',
  `ventilation` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие вентиляции (да/нет | true/false | 1/0 | +/-)',
  `fire_alarm` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие пожарной сигнализации (да/нет | true/false | 1/0 | +/-)',
  `water_supply` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие водопровода (да/нет | true/false | 1/0 | +/-)',
  `sewerage_supply` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие канализации (да/нет | true/false | 1/0 | +/-)',
  `electricity_supply` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие электроснабжения (да/нет | true/false | 1/0 | +/-)',
  `electric_capacity` int(10) NULL DEFAULT NULL COMMENT 'Выделенная электрическая мощность',
  `gas_supply` tinyint(1) NULL DEFAULT NULL COMMENT 'Подключение к газовым сетям (да/нет | true/false | 1/0 | +/-)',
  `floor_covering` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Покрытие пола (ковролин | ламинат | линолеум | паркет)',
  `heating_supply` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие отопления (да/нет | true/false | 1/0 | +/-)',
  `window_type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Тип окон (витринные | маленькие | обычные)',
  `window_view` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Вид из окон (во двор | на улицу)',
  `building_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Название строения (если нет - улица + номер дома)',
  `office_class` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Класс бизнес-центра (A | A+ | B | B+ | C | C+)',
  `ceiling_height` float(4, 2) UNSIGNED ZEROFILL NULL DEFAULT NULL COMMENT 'Высота потолков в метрах',
  `guarded_building` tinyint(1) NULL DEFAULT NULL COMMENT 'Закрытая территория (да/нет | true/false | 1/0 | +/-)',
  `access_control_system` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие пропускной системы (да/нет | true/false | 1/0 | +/-)',
  `twenty_four_seven` tinyint(1) NULL DEFAULT NULL COMMENT 'Круглосуточный доступ 7 дней в неделю (да/нет | true/false | 1/0 | +/-)',
  `lift` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие лифта (bool)',
  `parking` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие охраняемой парковки (bool)',
  `parking_places` int(4) NULL DEFAULT NULL COMMENT 'Количество предоставляемых парковочных мест',
  `parking_place_price` int(8) NULL DEFAULT NULL COMMENT 'Стоимость парковочного места',
  `parking_guest` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие гостевых парковочных мест (bool)',
  `parking_guest_places` int(4) NULL DEFAULT NULL COMMENT 'Количество гостевых парковочных мест',
  `security` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие охраны (bool)',
  `eating_facilities` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие предприятий общепита в здании (bool)',
  `is_elite` tinyint(1) NULL DEFAULT NULL COMMENT 'Элитная недвижимость (bool)',
  `yandex_building_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Идентификатор жилого комплекса в базе Яндекса',
  `responsible_storage` tinyint(1) NULL DEFAULT NULL COMMENT 'Ответственное хранение (bool)',
  `pallet_price` int(5) NULL DEFAULT NULL COMMENT 'Стоимость палето-места в месяц в рублях',
  `freight_elevator` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие грузового лифта (bool)',
  `truck_entrance` tinyint(1) NULL DEFAULT NULL COMMENT 'Возможность подъезда фуры (bool)',
  `ramp` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие пандуса (bool)',
  `railway` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие ветки железной дороги (bool)',
  `office_warehouse` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие офиса на складе (bool)',
  `open_area` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие открытой площадки (bool)',
  `service_three_pl` tinyint(1) NULL DEFAULT NULL COMMENT 'Наличие 3PL (логистических) услуг (bool)',
  `temperature_comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Комментарий про температурный режим на складе',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of offers
-- ----------------------------

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
INSERT INTO `roles` VALUES (1, 'admin', 'Administrator', 'Site administrator', 0, '2020-11-23 14:47:25', '2020-11-23 14:47:30');
INSERT INTO `roles` VALUES (2, 'guest', 'Guest', 'No verified user', 1, '2020-11-23 14:47:33', '2020-11-23 14:47:37');

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
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `teams_user_id_index`(`user_id`) USING BTREE,
  CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES (1, 1, 'Test', NULL, '2020-11-27 10:32:53', '2020-11-27 10:32:55');

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
  UNIQUE INDEX `users_phone_index`(`phone`) USING BTREE,
  UNIQUE INDEX `users_name_index`(`name`) USING BTREE,
  INDEX `users_status_index`(`status`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `users_role_idfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'sezarbox@gmail.com', 'admin', '$2y$10$VQquaWXDDy76v/yLUpTsf.05NUkKVimBGfST70DZFvc0yTfNKdwa2', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Unconfirmed', NULL, NULL, '2020-11-23 12:55:48', '2020-11-23 12:55:48');

SET FOREIGN_KEY_CHECKS = 1;
