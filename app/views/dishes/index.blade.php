@extends("../layout")

@section("content")
<ul class="content__section">
  @foreach($dishes as $dish)
    <div class="content__section__item">
      <span class="item__name">{{$dish->name}}</span>
      <span class="item__price">{{$dish->price}}</span>
      <a href="dishes/dish/{{$dish->id}}" class="edit"></a>
      <a href="dishes/dish/{{$dish->id}}" data-method="delete" class="remove"></a>
    </div>
  @endforeach
</ul>
@stop