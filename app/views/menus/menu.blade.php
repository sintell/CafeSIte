@extends('../layout')

@section('content')
<form action="{{$menu->id}}" method="POST">
{{Form::hidden('_method', 'PUT')}}
{{Form::text('name', $menu->name, array('placeholder' => 'Название меню'))}}
@foreach($dtypes as $dtype)
<div class="content__section">
  <div class="content__section__header">{{$dtype->name}}</div>
    @foreach(Dish::where('type', '=', $dtype->name)->get() as $dish)
     <label for="{{'dish'.$dish->id}}" class="content__section__item">
     {{$dish->name}}
       <input type="checkbox" id="{{'dish'.$dish->id}}" value="{{$dish->id}}" name="dishes[]" @if(in_array($dish->id, $menu->dishes()->lists('id'))) checked @endif>
     </label>
    @endforeach
  </div>
  @endforeach
{{Form::submit('Сохранить')}}
</form>
@stop