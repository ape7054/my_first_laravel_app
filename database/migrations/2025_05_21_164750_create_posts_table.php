<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // 自动递增的 BigInt 主键，名为 'id'
            $table->string('title'); // VARCHAR 列，名为 'title'
            $table->text('content'); // TEXT 列，名为 'content'
            $table->boolean('is_published')->default(false); // BOOLEAN 列，默认值为 false
            $table->timestamps(); // 自动创建 'created_at' 和 'updated_at' 两个 TIMESTAMP 列
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts'); // 如果 'posts' 表存在，则删除它
    }
};
