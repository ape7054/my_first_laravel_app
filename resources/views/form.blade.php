<!DOCTYPE html>
<html>
<head>
    <title>Simple Form</title>
</head>
<body>
    <h1>Submit Your Information</h1>

    <form method="POST" action="{{ url('/submit-form') }}">
        @csrf {{-- CSRF 保护，非常重要！ --}}

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        <br>
        <button type="submit">Submit</button>
    </form>

    {{-- 如果有验证错误，可以在这里显示 --}}
    @if ($errors->any())
        <div style="color: red; margin-top: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>