@extends('../layout')

@section('content')
<form action="menu" method="POST">
{{Form::text('name', '', array('placeholder' => 'Название меню'))}}
@foreach($dtypes as $dtype)
<div class="content__section">
  <div class="content__section__header">{{$dtype->name}}</div>
    @foreach(Dish::where('type', '=', $dtype->name)->get() as $dish)
     <label for="{{'dish'.$dish->id}}" class="content__section__item">
     {{$dish->name}}
       <input type="checkbox" id="{{'dish'.$dish->id}}" value={{$dish->id}} name="dishes[]">
     </label>
    @endforeach
  </div>
  @endforeach
{{Form::submit('Создать')}}
</form>
@stop