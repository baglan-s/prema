<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
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
            "CREATE TABLE `teams`  (
              `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
              `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
              `name` varchar(255) NOT NULL,
              `description` text NULL DEFAULT NULL,
			  `status` tinyint(1) unsigned DEFAULT 1,
              `created_at` timestamp(0) NULL DEFAULT NULL,
              `updated_at` timestamp(0) NULL DEFAULT NULL,
              PRIMARY KEY (`id`) USING BTREE,
              KEY `teams_user_id_index` (`user_id`) USING BTREE,
              CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
            ) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;"
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
            "DROP TABLE IF EXISTS `teams`;"
        );
    }

}
