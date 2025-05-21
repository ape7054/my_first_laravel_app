<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // 引入 Request 类

class FormController extends Controller
{
    // 显示一个简单的表单
    public function showForm()
    {
        return view('form'); // 假设我们有一个 resources/views/form.blade.php
    }

    // 处理表单提交
    public function submitForm(Request $request) // 通过类型提示注入 Request 对象
    {
        // 获取所有输入数据
        $allData = $request->all();
        // dd($allData); // dd() 是 Laravel 的 "dump and die" 辅助函数，用于调试

        // 获取特定输入字段的值
        $name = $request->input('name');
        $email = $request->input('email');

        // 获取查询字符串参数 (例如 /submit-form?source=web)
        $source = $request->query('source', 'unknown'); // 第二个参数是默认值

        // 检查请求方法
        if ($request->isMethod('post')) {
            // 处理 POST 请求的逻辑可以放在这里
        }

        // 获取 URL 路径
        $path = $request->path(); // 例如 "submit-form"

        // 获取完整 URL
        $url = $request->url(); // 例如 "http://localhost/my_first_laravel_app/submit-form"

        return "Form submitted! Name: " . e($name) . ", Email: " . e($email) . ", Source: " . e($source) . "<br>Path: " . e($path) . "<br>URL: " . e($url);
    }
}
