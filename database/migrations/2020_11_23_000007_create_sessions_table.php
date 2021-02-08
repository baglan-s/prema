<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
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
            "CREATE TABLE `sessions`  (
              `id` varchar(255) NOT NULL,
              `user_id` bigint(20) NULL DEFAULT NULL,
              `ip_address` varchar(45) NULL DEFAULT NULL,
              `user_agent` text NULL DEFAULT NULL,
              `payload` text NOT NULL,
              `last_activity` int(11) NOT NULL,
              UNIQUE INDEX `sessions_id_unique`(`id`) USING BTREE
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
            "DROP TABLE IF EXISTS `sessions`;"
        );
    }

}
