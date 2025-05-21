<?php

namespace App\Http\Controllers;

use App\Models\Post; // 引入 Post 模型
use Illuminate\Http\Request; // 如果需要处理表单数据

class PostController extends Controller
{
    public function createPost(Request $request) // 假设数据来自一个表单 
    {
        // 方法一：实例化模型，设置属性，然后保存 
        $post = new Post;
        $post->title = $request->input('title', 'Default Title'); // 假设从请求中获取标题 
        $post->content = $request->input('content', 'Default content.'); // 假设从请求中获取内容 
        $post->is_published = $request->input('is_published', false);
        $post->save(); // 保存到数据库 

        // 方法二：使用 create() 方法 (需要模型中设置 $fillable 或 $guarded) 
        // 为了使用 create()，你需要在 Post 模型中定义 $fillable 属性 
        // app/Models/Post.php: 
        // protected $fillable = ['title', 'content', 'is_published']; 

        // $newPost = Post::create([
        //     'title' => $request->input('title', 'Another Title'), 
        //     'content' => $request->input('content', 'Some interesting content.'), 
        //     'is_published' => $request->input('is_published', true),
        // ]); 

        return "Post created successfully! ID: " . $post->id;
        // return "Post created successfully! ID: " . $newPost->id; 
    }
}
