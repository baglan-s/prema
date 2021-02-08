<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
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
            "CREATE TABLE `permission_role`  (
              `permission_id` bigint(20) UNSIGNED NOT NULL,
              `role_id` bigint(20) UNSIGNED NOT NULL,
              PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
              INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE,
              CONSTRAINT `permission_role_permission_idfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
              CONSTRAINT `permission_role_role_idfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
            "DROP TABLE IF EXISTS `permission_role`;"
        );
    }

}
