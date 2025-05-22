<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post; // 引入 Post 模型
use Illuminate\Support\Facades\DB; // 如果想用查询构建器
use Illuminate\Support\Str; // 用于生成随机字符串

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 方法一：使用 Eloquent 模型
        Post::create([
            'title' => 'My First Seeded Post',
            'content' => 'This is the content of the first seeded post.',
            'is_published' => true,
        ]);

        Post::create([
            'title' => 'Another Seeded Article',
            'content' => 'Content for the second article goes here.',
            'is_published' => false,
        ]);

        // 方法二：使用查询构建器 (DB Facade)
        // DB::table('posts')->insert([
        //     'title' => 'Post via DB Facade',
        //     'content' => 'Content using DB Facade.',
        //     'is_published' => true,
        //     'created_at' => now(), // 手动设置时间戳
        //     'updated_at' => now(),
        // ]);

        // 你也可以在这里循环创建多条数据
        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'title' => 'Sample Post ' . ($i + 1),
                'content' => Str::random(100), // 生成随机字符串作为内容
                'is_published' => rand(0, 1) // 随机 true 或 false
            ]);
        }
    }
}
