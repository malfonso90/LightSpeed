<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Test::factory(10)->create();
    }
}
