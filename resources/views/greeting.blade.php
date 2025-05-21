@extends('layouts.app') {{-- 继承 layouts/app.blade.php 布局 --}}

@section('title', '问候页面') {{-- 定义 'title' 区块的内容 --}}

@section('content') {{-- 定义 'content' 区块的内容 --}}
    <h2>热情的问候！</h2>
    @if (isset($userName) && isset($userMessage))
        <p>你好, {{ $userName }}!</p>
        <p>{{ $userMessage }}</p>
    @else
        <p>欢迎, 游客!</p>
    @endif

    <h3>一些用户:</h3>
    @php
        // 示例用户数据，在实际应用中，这通常来自控制器
        $users = [
            ['name' => '张三'],
            ['name' => '李四'],
            ['name' => '王五']
        ];
    @endphp
    <ul>
        @forelse ($users as $user)
            <li>{{ $user['name'] }}</li>
        @empty
            <p>没有用户可以显示。</p>
        @endforelse
    </ul>
@endsection