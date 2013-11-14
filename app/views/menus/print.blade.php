@extends('../layout')

@section('content')

  @foreach($dtypes as $dtype) 
  <div class="content__section">
    <div class="content__section__header">{{$dtype->name}}</div>
      @foreach(Dish::where('type', '=', $dtype->name)->get() as $dish)
      <div class="content__section__item">
        <span class="item__veight">1/{{$dish->veight}} </span>
        <span class="item__name">{{$dish->name}}</span>
        <span class="item__price">{{$dish->price}}</span>
      </div>
      @endforeach
    </div>
    @endforeach
  <div class="content__section">
    <h5 class="item__title">Зав. производством:   Емшанова Т.А.</h5>
    </div>
  <div class="content__section">
    <h3 class="item__title__big">ПРИЯТНОГО АППЕТИТА !!!</h3>
    </div>
  @stop