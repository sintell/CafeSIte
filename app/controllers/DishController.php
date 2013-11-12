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
      return View::make('dishes/dish')->with('title', $dish->name)
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
    $dish->desc = Input::get('desc');
    $dish->save();
    return Redirect::to('dishes')->with('t', $dt->get());
  }

  public function postDish()
  {
    $dish = new Dish;

    $dtype = Input::get('type');
    $dt = DishType::where('name', '=' , $dtype)->first();
    
    if ($dt) {
      $dish->type = $dt->name;
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
    $dish->desc = Input::get('desc');
    $dish->save();
    return Redirect::to('dishes');
  }
  

  public function deleteDish($id)
  {
    $dish = Dish::find($id);
    $dish->delete();
    return Redirect::to('dishes');
  }

}