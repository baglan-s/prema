<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::getConnection()->statement
        (
            "CREATE TABLE `offers` (
              `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатоор записи',
              `team_id` bigint(20) unsigned NOT NULL COMMENT 'Идентификатор организации',
              `internal_id` varchar(32) NOT NULL COMMENT 'Внутренний идентификатор объекта',
              `last_update_date` varchar(32) NOT NULL COMMENT 'Дата последнего обновления',
              `creation_date` varchar(32) NOT NULL COMMENT 'Дата создания предложения',
              `name` varchar(128) NOT NULL COMMENT 'Название объекта (Улица + дом)',
              `area` float(6,1) NOT NULL COMMENT 'Площадь объекта',
              `area_free` float(6,1) NOT NULL COMMENT 'Свободная площадь объекта',
              `status` varchar(5) NOT NULL COMMENT 'Статус объекта (sale|rent)',
              `sale_entire` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Продажа всего объекта (0|1)',
              `rent_entire` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Аренда всего объекта (0|1)',
              `price_sale` int(10) unsigned DEFAULT NULL COMMENT 'Цена продажи всего объекта',
              `price_rent` int(10) DEFAULT NULL COMMENT 'Цена аренды всего объекта',
              `price_unit` varchar(3) DEFAULT NULL COMMENT 'Ценовая денежная единица',
              `price_period` varchar(6) DEFAULT NULL COMMENT 'Ценовой период аренды',
              `location` longtext NOT NULL COMMENT 'Местоположение объекта (json)',
              `description` text DEFAULT NULL COMMENT 'Текстовое описание',
              `images` longtext DEFAULT NULL COMMENT 'Изображения объекта (json)',
              `building` longtext DEFAULT NULL COMMENT 'Характеристики здания объекта (json)',
              `features` longtext DEFAULT NULL COMMENT 'Дополнительные особенности объекта (json)',
              `sales_agent` longtext NOT NULL COMMENT 'Информация о продавце/арендодателе (json)',
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`) USING BTREE,
              KEY `last_update_date` (`last_update_date`) USING BTREE,
              KEY `team_id` (`team_id`) USING BTREE,
              KEY `internal_id` (`internal_id`) USING BTREE,
              CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::getConnection()->statement
        (
            "DROP TABLE IF EXISTS `offers`;"
        );
    }

}
