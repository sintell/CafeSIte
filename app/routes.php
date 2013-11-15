<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('menu')->with('title',"Меню на сегодня");
});

Route::get('/login', function(){
  return View::make('login')->with('title', "Вход в систему");
});

Route::post('/login', function(){
  if(Auth::attempt(array('name' => Input::get('username'), 'password' => Input::get('password'))))
  {
    return Redirect::to('dishes');
  }
  else
  {
    if (User::all()->count() < 2) {
      $user = new User;
      $user->name = Input::get('username');
      $user->password = Hash::make(Input::get('password'));
      $user->save();
    }
    return Redirect::to('/login')->withInput(Input::except('password'))
    ->with('errors', array('text' => "Неправильное имя пользователя или пароль.")); 
  }
});

Route::get('/logout', function() {
  Auth::logout();
  return Redirect::to('/');
});

Route::group(array('before' => 'auth'), function(){
  Route::controller('dishes', 'DishController');
  Route::controller('menus', 'MenuController');
  Route::get('/types', function() {
    return View::make('types')->with('title', 'Types');
  });
});