<!DOCTYPE html>
  <html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Cтоловая ИГУМО и ИТ: {{$title}}</title>
      <link rel="stylesheet" href="{{asset("css/style.css")}}">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="{{asset("js/restfulizer.js")}}"></script>
  </head>
  <body>
    <div class="content">
      <ul class="menu menu_vertical">
      @if(Auth::check())
          <li class="menu__item__wrapper"><a class="menu__item" href={{URL::action("DishController@getDish", 'new')}}>Добавить блюдо</a></li>
          <li class="menu__item__wrapper"><a class="menu__item" href={{URL::to("/dishes")}}>Список блюд</a></li>
          <li class="menu__item__wrapper"><a class="menu__item" href={{URL::action("MenuController@getMenu", 'new')}}>Добавить меню</a></li>
          <li class="menu__item__wrapper"><a class="menu__item" href={{URL::to("/menus")}}>Список меню</a></li>
          <li class="menu__item__wrapper"><a class="menu__item" href={{URL::to("/logout")}}>Выход</a></li>
      @else
          <li class="menu__item__wrapper"><a class="menu__item" href={{URL::to("/login")}}>Войти</a></li>
      @endif
      </ul>  
      <div class="content__wrapper">
        <div class="content__header">
        {{$title}}
        </div>
        @yield('content')
      </div>
    </div>

  </body>
</html>