<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
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
            "CREATE TABLE `roles`  (
              `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
              `name` varchar(255) NOT NULL,
              `display_name` varchar(255) NULL DEFAULT NULL,
              `description` varchar(255) NULL DEFAULT NULL,
              `removable` tinyint(1) NOT NULL DEFAULT 1,
              `created_at` timestamp(0) NULL DEFAULT NULL,
              `updated_at` timestamp(0) NULL DEFAULT NULL,
              PRIMARY KEY (`id`) USING BTREE,
              UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
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
            "DROP TABLE IF EXISTS `roles`;"
        );
    }

}
