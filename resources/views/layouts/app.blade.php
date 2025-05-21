<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Laravel App')</title> <!-- 默认标题 -->
    {{-- 假设你有一个 app.css 文件在 public/css/ 目录下 --}}
    {{-- 为了正确链接 CSS，建议使用 asset() 辅助函数 --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>我的应用</h1>
        <nav>
            <a href="/">首页</a>
            <a href="/show-greeting">问候页面</a>
            {{-- 你可以根据你的路由定义添加更多链接 --}}
        </nav>
    </header>

    <main class="container">
        @yield('content') <!-- 定义一个名为 'content' 的区块 -->
    </main>

    <footer>
        <p>© {{ date('Y') }} 我的公司</p>
    </footer>
    {{-- 假设你有一个 app.js 文件在 public/js/ 目录下 --}}
    {{-- 为了正确链接 JS，建议使用 asset() 辅助函数 --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>