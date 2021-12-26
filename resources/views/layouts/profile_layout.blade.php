<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
   @stack('styles')
</head>
<body>


<nav class="navbar navbar-light bg-light border-bottom">
    <form class="container-fluid justify-content-start">
        <button class="btn btn-outline-success me-2" type="button">Main button</button>
        <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button>
    </form>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="list-group profile_menu mt-3">
                <a type="button" href="{{route('home')}}" class="list-group-item list-group-item-action" aria-current="true">
                    Профиль
                </a>
                <a type="button" href="{{route('writeArticle')}}" class="list-group-item list-group-item-action">Написать статью</a>
                <a type="button" href="{{route('chats')}}" class="list-group-item list-group-item-action" >Сообщения</a>
                <a type="button" class="list-group-item list-group-item-action">Просмотреть статьи</a>
                <a type="button" href="{{route('test')}}" class="list-group-item list-group-item-action" >Test</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
            @yield('main_content')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{asset('js/profile.js')}}" defer></script>
@stack('scripts')
</body>
</html>
