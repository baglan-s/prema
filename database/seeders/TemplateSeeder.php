<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::create([
            'name' => 1,
            'image' => 'exports/images/template-name-01.png',
        ]);
        Template::create([
            'name' => 2,
            'image' => 'exports/images/template-name-02.png',
        ]);
        Template::create([
            'name' => 3,
            'image' => 'exports/images/template-name-03.png',
        ]);
        Template::create([
            'name' => 4,
            'image' => 'exports/images/template-name-01.png',
        ]);
        Template::create([
            'name' => 5,
            'image' => 'exports/images/template-name-02.png',
        ]);
        Template::create([
            'name' => 6,
            'image' => 'exports/images/template-name-03.png',
        ]);
    }
}
