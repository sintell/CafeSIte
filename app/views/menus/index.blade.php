@extends("../layout")


@section('content')
  <div class="content__section">
  @foreach($menus as $menu)
    <div class="content__section__item">
      <span class="item__name">{{$menu->name}}</span>
      @if($menu->repeat)
      <span class="item__value">{{$menu->repeat}}</span>
      <span class="item__value">{{$menu->repeat_period}}</span>
      @else
      <span class="item__date">{{$menu->valid_on}}</span>
      @endif
      <a href="menus/print/{{$menu->id}}" class="print">Печать</a>
      <a href="menus/menu/{{$menu->id}}" class="edit"></a>
      <a href="menus/menu/{{$menu->id}}" data-method="delete" class="remove"></a>
    </div>
  @endforeach
  </div>
@stop