@extends("../layout")

@section("content")

  <form action="dish" method="POST" class="form__add-dish">
<label for="" class="form__label">Название блюда</label><input type="text" placeholder="Название блюда" name="name" required>
<label for="" class="form__label">Тип</label><input type="text" placeholder="Тип (первое, второе...)" name="type" required>
<label for="" class="form__label">Цена</label><input type="number" placeholder="Цена блюда" name="price" required></label> 
    <input type="submit" value="Добавить">
  </form>

@stop