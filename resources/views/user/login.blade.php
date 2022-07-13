<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <div class="content">
        <h1>Авторизация</h1>
        <form method="post" action="{{ route('sendlogin') }}">
            @csrf 
            @if(session('error'))
                <h3>{{session('error')}}</h3>
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
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-control">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <a href="{{ route('register.create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Зарегистрироваться</a>

            <button type="submit" class="btn btn-primary">Войти</button>

        </form>
    </div>
</body>
</html>