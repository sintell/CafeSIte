@extends("layout")


@section('content')
<form action="types" method="POST">
  <input type="hidden" name="_method" value="PUT">
  <div class="content__section">
  @foreach(DishType::all() as $dtype)
    <input type="text" value="{{$dtype->name}}">
    <input type="number" value="{{$dtype->position}}">
    <hr>
  @endforeach
  <input type="submit" value="Изменить">
  </div>
</form>
@stop