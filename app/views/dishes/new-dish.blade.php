@extends("../layout")

@section("content")

  <form action="dish" method="POST" class="form__add-dish">
    <input type="text" placeholder="Название блюда" name="name" required>
    <input type="text" placeholder="Тип (первое, второе, гарнир, закуски, напитки)" name="type" required>
    <input type="text" placeholder="Цена блюда" name="price" required>
    <textarea name="desc" cols="30" rows="10">Описание</textarea>
    <input type="submit" value="Добавить">
  </form>

@stop