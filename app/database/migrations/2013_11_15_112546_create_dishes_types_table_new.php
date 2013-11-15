<?php

use Illuminate\Database\Migrations\Migration;

class CreateDishesTypesTableNew extends Migration {

	 /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    //
    Schema::dropIfExists('dishes_types');

    Schema::create('dishes_types', function($table)
    {
        $table->increments('id');
        $table->string('name');
        $table->integer('position');
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
    Schema::drop('dishes_types');
  }

}