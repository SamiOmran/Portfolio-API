<?php

namespace Database\Seeders\Test;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(config('app.seeders.users'))->create();
    }
}
