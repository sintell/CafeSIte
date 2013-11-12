@extends("layout")

@section("content")
  @if(!empty($errors))
  <div class="errors">
    @foreach($errors as $error)
      <p class="error_item">{{$error}}</p>
    @endforeach
  </div>
  @endif
  <form action="login" method="POST">
    <input type="text" placeholder="Имя пользователя" name="username" value="{{Input::old('username')}}">
    <input type="password" placeholder="Пароль" name="password">
    <input type="submit" value="Войти">
  </form>
@stop