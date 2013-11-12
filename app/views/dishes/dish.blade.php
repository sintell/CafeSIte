@extends('../layout')

@section('content')
{{Form::open(array('url' => array('dishes/dish',$dish->id), 'method' => 'PUT'))}}
{{Form::text('name',$dish->name)}}
<input type="text" name="type" value="{{ucfirst($dish->type)}}" list="dtypes" autocomplete="off" required>
<datalist id="dtypes">
  @foreach($dtypes as $dtype)
  <option value="{{$dtype->name}}">{{ucfirst($dtype->name)}}</option>
  @endforeach
</datalist>
{{Form::text('price',$dish->price)}}
{{Form::textarea('desc',$dish->desc)}}
{{Form::submit('Сохранить')}}
{{Form::close()}}
@stop