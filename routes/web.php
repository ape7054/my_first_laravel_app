<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\FormController; // 引入新控制器

Route::get('/', function () {
    return view('welcome');
});

// 使用控制器方法处理 /hello 路由
Route::get('/hello', [WelcomeController::class, 'hello']);

// Add user route with numeric ID constraint
Route::get('/users/{id}', function ($id) {
    return 'User ID: ' . $id;
})->where('id', '[0-9]+');

// Add post route with alphanumeric slug constraint
Route::get('/posts/{slug}', function ($slug) {
    return 'Post Slug: ' . $slug;
})->where('slug', '[a-zA-Z0-9-]+');

// Add product route with multiple parameter constraints
Route::get('/products/{id}/{name}', function ($id, $name) {
    return "Product ID: {$id}, Name: {$name}";
})->where([
    'id' => '[0-9]+',
    'name' => '[a-zA-Z]+'
]);

// Add route for greeting page
Route::get('/show-greeting', function () {
    return view('greeting', [
        'userName' => '访客', // 你可以传递动态数据
        'userMessage' => '欢迎学习 Laravel Blade 模板继承！'
    ]);
});

// 或者，如果你想从控制器返回视图：
// Route::get('/show-greeting', [YourController::class, 'showGreetingPage']);
// 然后在 YourController.php 中定义 showGreetingPage 方法：
/*
public function showGreetingPage()
{
    return view('greeting', [
        'userName' => 'ControllerUser',
        'userMessage' => '这是来自控制器的消息。'
    ]);
}
*/

// 显示表单的路由 (GET 请求)
Route::get('/my-form', [FormController::class, 'showForm'])->name('form.show');

// 处理表单提交的路由 (POST 请求)
Route::post('/submit-form', [FormController::class, 'submitForm'])->name('form.submit');
