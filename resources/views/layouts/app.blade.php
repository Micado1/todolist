<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tasks</title>
 
        <!-- CSS And JavaScript -->
        <style>
            nav{
                display: flex;
                justify-content: space-evenly;
                align-items: center;
            }
            p{
                margin: 0;
            }
            .content{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
 
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <p>{{ auth()->user()->name }}</p>
                <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Выйти</a>
            </nav>
        </div>
 
        <div class="content">
            @yield('content')
        </div>
    </body>
</html>