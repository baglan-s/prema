<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateFeedsTable extends Migration
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
            "CREATE TABLE `feeds` (
              `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
              `team_id` bigint(20) UNSIGNED NOT NULL,
              `long` varchar(255) NULL DEFAULT NULL,
              `long_start` timestamp(0) NULL DEFAULT NULL,
              `long_end` timestamp(0) NULL DEFAULT NULL,
              `short` varchar(255) NULL DEFAULT NULL,
              `short_start` timestamp(0) NULL DEFAULT NULL,
              `short_end` timestamp(0) NULL DEFAULT NULL,
              `created_at` timestamp(0) NULL DEFAULT NULL,
              `updated_at` timestamp(0) NULL DEFAULT NULL,
              PRIMARY KEY (`id`) USING BTREE,
              UNIQUE INDEX `team_id`(`team_id`) USING BTREE,
              CONSTRAINT `feeds_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
            "DROP TABLE IF EXISTS `feeds`;"
        );
    }

}
