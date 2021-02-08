<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            "CREATE TABLE `users` (
              `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
              `email` varchar(255) NOT NULL,
              `name` varchar(255) NULL DEFAULT NULL,
              `password` varchar(255) NOT NULL,
              `first_name` varchar(255) NULL DEFAULT NULL,
              `last_name` varchar(255) NULL DEFAULT NULL,
              `phone` varchar(255) NULL DEFAULT NULL,
              `avatar` varchar(255) NULL DEFAULT NULL,
              `address` varchar(255) NULL DEFAULT NULL,
              `role_id` bigint(20) unsigned NOT NULL DEFAULT 2,
              `team_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
              `last_login` timestamp(0) NULL DEFAULT NULL,
              `status` varchar(20) NOT NULL DEFAULT 'Unconfirmed',
              `email_verified_at` timestamp(0) NULL DEFAULT NULL,
              `remember_token` varchar(100) NULL DEFAULT NULL,
              `created_at` timestamp(0) NULL DEFAULT NULL,
              `updated_at` timestamp(0) NULL DEFAULT NULL,
              PRIMARY KEY (`id`) USING BTREE,
              UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
              UNIQUE INDEX `users_name_index`(`name`) USING BTREE,
              UNIQUE INDEX `users_phone_index`(`phone`) USING BTREE,
              INDEX `users_status_index`(`status`) USING BTREE,
              INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
              CONSTRAINT `users_role_idfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
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
            "DROP TABLE IF EXISTS `users`;"
        );
    }

}
