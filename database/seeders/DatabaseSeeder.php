<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\User; // 如果不需要创建用户，可以注释或移除

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create(); // 这是 Laravel Breeze/Jetstream 等 starter kit 可能会有的
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PostSeeder::class, // 调用你的 PostSeeder
            // OtherSeeder::class, // 如果有其他 seeder
        ]);
    }
}
