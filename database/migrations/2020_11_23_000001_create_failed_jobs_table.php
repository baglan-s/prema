<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
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
            "CREATE TABLE `failed_jobs`  (
              `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
              `uuid` varchar(255) NOT NULL,
              `connection` text NOT NULL,
              `queue` text NOT NULL,
              `payload` longtext NOT NULL,
              `exception` longtext NOT NULL,
              `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp,
              PRIMARY KEY (`id`) USING BTREE,
              UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
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
            "DROP TABLE IF EXISTS `failed_jobs`;"
        );
    }

}
