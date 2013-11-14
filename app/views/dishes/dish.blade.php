@extends('../layout')

@section('content')
{{Form::open(array('url' => array('dishes/dish',$dish->id), 'method' => 'PUT'))}}
<label for="" class="form__label">Вес блюда</label><input type="text" placeholder="Вес блюда" name="veight" value="{{$dish->veight}}" required>
{{Form::text('name',$dish->name)}}
<input type="text" name="type" value="{{ucfirst($dish->type)}}" list="dtypes" autocomplete="off" required>
<datalist id="dtypes">
  @foreach($dtypes as $dtype)
  <option value="{{$dtype->name}}">{{ucfirst($dtype->name)}}</option>
  @endforeach
</datalist>
{{Form::text('price',$dish->price)}}
{{Form::submit('Сохранить')}}
{{Form::close()}}
@stop