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
      @yield('menu')
      <div class="content__wrapper">
        <div class="content__header">
        {{$title}}
        </div>
        @yield('content')
      </div>
    </div>

  </body>
</html>