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

    public function showPosts()
    {
        // 获取所有记录
        $posts = Post::all();

        // 获取第一条记录
        // $firstPost = Post::first();

        // 根据主键查找记录
        // $postById = Post::find(1); // 查找 id 为 1 的记录
        // if (!$postById) {
        //     return "Post not found!";
        // }

        // 添加查询条件
        // $publishedPosts = Post::where('is_published', true)->get();
        // $specificPost = Post::where('title', 'like', '%Laravel%')->first(); // 查找标题包含 Laravel 的第一条记录

        // 排序
        // $sortedPosts = Post::orderBy('created_at', 'desc')->get(); // 按创建时间降序

        // 分页
        // $paginatedPosts = Post::paginate(10); // 每页显示 10 条

        $output = "<h1>All Posts:</h1><ul>";
        foreach ($posts as $post) {
            $output .= "<li><strong>{$post->title}</strong> (Published: " . ($post->is_published ? 'Yes' : 'No') . ")<br><small>{$post->content}</small></li>";
        }
        $output .= "</ul>";
        return $output; // 实际应用中你会返回一个视图
    }

    public function showPost($id)
    {
        $post = Post::find($id);
        // 或者使用 findOrFail，如果找不到会抛出 ModelNotFoundException (自动返回 404)
        // $post = Post::findOrFail($id);

        if (!$post) {
            // 在实际应用中，你会返回一个 404 视图或重定向
            return response('Post not found', 404);
        }

        // 实际应用中你会传递 $post 到一个视图
        return "<h1>{$post->title}</h1><p>{$post->content}</p><p>Published: " . ($post->is_published ? 'Yes' : 'No') . "</p>";
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return "Post not found to update!";
        }

        // 方法一：修改属性后调用 save()
        $post->title = $request->input('title', $post->title); // 如果请求中没有 title，则保留原值
        $post->content = $request->input('content', $post->content);
        $post->is_published = $request->input('is_published', $post->is_published);
        $post->save();

        // 方法二：使用 update() 方法 (也受 $fillable/$guarded 限制)
        // $post->update([
        //     'title' => $request->input('title', 'Updated Title Default'),
        //     'content' => $request->input('content', 'Updated content default.'),
        //     'is_published' => $request->input('is_published', true)
        // ]);

        return "Post ID: {$id} updated successfully!";
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return "Post not found to delete!";
        }
        $post->delete();

        // 或者直接通过主键删除 (返回删除的记录数)
        // $deletedRows = Post::destroy($id);
        // $deletedRows = Post::destroy([1, 2, 3]); // 删除多个

        // 或者通过查询条件删除
        // Post::where('is_published', false)->delete();

        return "Post ID: {$id} deleted successfully!";
    }
}
