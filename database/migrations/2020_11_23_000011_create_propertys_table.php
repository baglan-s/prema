<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePropertysTable extends Migration
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
            "CREATE TABLE `propertys` (
              `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Уникальный идентификатоор записи',
              `offer_id` bigint(20) unsigned NOT NULL COMMENT 'Идентификатор принадлежности к предложению',
              `internal_id` varchar(32) NOT NULL COMMENT 'Внутренний идентификатор объекта',
              `last_update_date` varchar(32) NOT NULL COMMENT 'Дата последнего обновления',
              `name` varchar(32) NOT NULL DEFAULT 'office' COMMENT 'Название объекта',
              `area` float(5,1) unsigned NOT NULL COMMENT 'Площадь объекта',
              `status` varchar(5) NOT NULL DEFAULT 'rent' COMMENT 'Статус объекта (sale|rent)',
              `price_sale` int(10) unsigned DEFAULT NULL COMMENT 'Цена продажи объекта',
              `price_rent` int(10) unsigned DEFAULT NULL COMMENT 'Цена аренды бъекта',
              `price_unit` varchar(3) DEFAULT 'RUB' COMMENT 'Ценовая денежная единица',
              `price_period` varchar(6) DEFAULT 'month' COMMENT 'Ценовой период аренды',
              `current_tenant` varchar(255) DEFAULT NULL COMMENT 'Текущий арендатор',
              `for_sale` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Объект на продажу (0|1)',
              `description` text DEFAULT NULL COMMENT 'Текстовое описание',
              `images` longtext DEFAULT NULL COMMENT 'Изображения объекта (json)',
              `features` longtext DEFAULT NULL COMMENT 'Дополнительные особенности объекта (json)',
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`) USING BTREE,
              KEY `offer_id` (`offer_id`) USING BTREE,
              KEY `last_update_date` (`last_update_date`) USING BTREE,
              KEY `internal_id` (`internal_id`) USING BTREE,
              CONSTRAINT `propertys_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
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
            "DROP TABLE IF EXISTS `propertys`;"
        );
    }

}
