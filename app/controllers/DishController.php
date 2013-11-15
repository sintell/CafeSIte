<?php

class DishController extends BaseController {


  // protected $layout = 'layouts.default';

  public function getIndex()
  {
    $dishes = Dish::all();
    return View::make('dishes/index')->with('title', "Список блюд")->with('dishes', $dishes);
  }
  public function getDish($id)
  {
    $dish = Dish::find($id);
    if(!empty($dish)) {
      return View::make('dishes/dish')->with('title', "Редактирование: ".$dish->name)
      ->with('dish', $dish)->with('dtypes', DishType::orderBy('position')->get());
    } 
    else
    {
      return View::make('dishes/new-dish')->with('title', "Добавить блюдо");
    }
  }
  public function putDish($id)
  {
    $dish = Dish::find($id);
    $dtype = strtolower(Input::get('type'));

    $dt = DishType::where('name', '=' , $dtype);
    
    if ($dt->count() > 0) {
      $dish->type = $dt->get();
    }
    else
    {
      $dishType = new DishType;
      $dishType->name = $dtype;
      $dishType->save();
      $dish->type = $dtype;
    }

    //ucfirst() - first letter to upper case

    $dish->name = Input::get('name');
    $dish->price = Input::get('price');
    $dish->desc = Input::get('desc', "");
    $dish->veight = Input::get('veight', 0);
    $dish->save();
    return Redirect::to('dishes')->with('t', $dt->get());
  }

  public function postDish()
  {
    $dt = DishType::where('name', '=', Input::get('type'));
    if( $dt->count() > 0)
    {  
      $dt = $dt->first();
    }
    else 
    {
      $dt = new DishType;
      $dt->name = Input::get('type', "");
      $dt->position = Input::get('position', 0);
      $dt->save();
    }

    $dish = (array(
      "name" => Input::get('name', ''),
      "type" => $dt->id,
      "price" => Input::get('price', 0),
      "desc" => Input::get('desc', ""),
      "veight" => Input::get('veight', 0)
    ));
    

    //ucfirst() - first letter to upper case

    
    $dt->dishes()->insert($dish);
    return Redirect::to('dishes');
  }
  

  public function deleteDish($id)
  {
    $dish = Dish::find($id);
    $dish->delete();
    return Redirect::to('dishes');
  }

}