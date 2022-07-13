<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <div class="content">
        <h1>Регистрация</h1>
        <form method="post" action="{{ route('register.store') }}">
            @csrf 
            @if(session('success'))
                <h2>{{session('success')}}</h2>
            @endif
            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-control">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-control">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-control">
                <label for="password_confirmation">Повторите пароль</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Войти</a>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>

        </form>
    </div>
</body>
</html>