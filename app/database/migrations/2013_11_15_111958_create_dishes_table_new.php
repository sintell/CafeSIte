<?php

use Illuminate\Database\Migrations\Migration;

class CreateDishesTableNew extends Migration {

 /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    //
        Schema::dropIfExists('dishes');
    Schema::create('dishes', function($table)
    {
        $table->increments('id');
        $table->string('name')->unique();
        $table->integer('type')->unsigned();
        $table->integer('veight')->default(0);
        $table->float('price');
        $table->text('desc');
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
    Schema::drop('dishes');
  }

}