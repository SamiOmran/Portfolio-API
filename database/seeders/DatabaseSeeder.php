<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\Test\{
    UserSeeder,
};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $resumesPath = 'app/public/resumes';

        if (Storage::exists($resumesPath)) {
            Storage::deleteDirectory($resumesPath);
            Storage::makeDirectory($resumesPath);
        }

        $this->call([
            UserSeeder::class,
        ]);

        $email = config('app.admin.email');

        $admin = User::where('email', $email)->first();

        if (! $admin) {
            $name = config('app.admin.name');
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => '12345678',
                'about_me' => '',
                'title' => 'Backend developer',
                'resume' => 'Palestine',
            ]);
        }
    }
}
