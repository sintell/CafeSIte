<?php

use Illuminate\Database\Migrations\Migration;

class CreateDishesMenusTableNew extends Migration {

	/**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    //
    Schema::dropIfExists('dishes_menus');
    Schema::create('dishes_menus', function($table)
    {
      $table->integer('dish_id')->unsigned();
      $table->integer('menu_id')->unsigned();
      $table->foreign('dish_id')->references('id')->on('dishes');
      $table->foreign('menu_id')->references('id')->on('menus');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
    Schema::drop('dishes_menus');
  }

}