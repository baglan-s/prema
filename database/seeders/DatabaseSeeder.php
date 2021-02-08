<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'         => 'admin',
                'display_name' => 'Administrator',
                'description'  => 'Site administrator',
                'removable'    => 0,
	            'created_at'   => now(),
				'updated_at'   => now(),
            ],
            [
                'name'         => 'guest',
                'display_name' => 'Guest',
                'description'  => 'Unverified user',
                'removable'    => 1,
	            'created_at'   => now(),
				'updated_at'   => now(),
            ],
        ]);

        DB::table('users')->insert([
            'name'              => 'admin',
            'email'             => 'admin@admin.com',
            'role_id'           => 1,
            'status'            => 'Active',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at'        => now(),
			'updated_at'        => now(),
        ]);

        DB::table('teams')->insert([
            'user_id'     => 1,
            'name'        => 'Test Company',
            'description' => null,
			'status'      => 1,
            'created_at'  => now(),
			'updated_at'  => now(),
        ]);

        DB::table('feeds')->insert([
            'team_id'        => 1,
            'long'           => '',
            'long_start'     => null,
            'long_end'       => null,
            'short'          => 'http://5.101.119.123:8103/feeds/data-offers.xml',
            'short_start'    => null,
            'short_end'      => null,
            'created_at'     => now(),
			'updated_at'     => now(),
        ]);
    }
}
