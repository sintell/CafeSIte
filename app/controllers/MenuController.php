<?php

class MenuController extends BaseController {

  /*
  |--------------------------------------------------------------------------
  | Default Home Controller
  |--------------------------------------------------------------------------
  |
  | You may wish to use controllers instead of, or in addition to, Closure
  | based routes. That's great! Here is an example controller method to
  | get you started. To route to this controller, just add the route:
  |
  | Route::get('/', 'HomeController@showWelcome');
  |
  */

  public function getIndex()
  {
    return View::make('menus/index')->with('title', 'Список меню')->with('menus', Menu::all());
  }

  public function getMenu($id)
  {
    $menu = Menu::find($id);
    if(!empty($menu)) {
      return View::make('menus/menu')->with('title', $menu->name)->with('menu', $menu)->with('dtypes', DishType::orderBy('position')->get());
    } 
    else
    {
      return View::make('menus/new-menu')->with('title', "Новое меню")->with('dtypes', DishType::orderBy('position')->get());
    }  
  }
  public function putMenu($id)
  {
    $menu = Menu::find($id);

    $menu->name = Input::get('name');
    $repeat = Input::get('repeat', false);

    if ($repeat === true) {
      $menu->repeat = $repeat;
      $menu->repeat_period = Input::get('repeat_period', 0);
    } else {
      $menu->valid_on = Input::get('valid_on', getdate());
    }
    $menu->save();
    $menu->dishes()->sync(Input::get('dishes'));

    return Redirect::to('menus');
    
  }
  public function deleteMenu($id)
  {
    $menu = Menu::find($id);
    $menu->dishes()->detach();
    $menu->delete();
    return Redirect::back();
  }
  public function postMenu()
  {
    $menu = new Menu;

    $menu->name = Input::get('name');
    $repeat = Input::get('repeat', false);

    if ($repeat === true) {
      $menu->repeat = $repeat;
      $menu->repeat_period = Input::get('repeat_period', 0);
    } else {
      $menu->valid_on = Input::get('valid_on', getdate());
    }
    $menu->save();
    $menu->dishes()->sync(Input::get('dishes'));
    // foreach (Input::get('dishes') as $key => $value) {
    // }

    return Redirect::to('menus');
  }

  public function getPrint($id)
  {
    $menu = Menu::find($id);
    $title = "Меню на ________";
    return View::make("menus/print", array('dtypes' => DishType::all(), 'menu' => $menu, 'title' => $title));
  }

}