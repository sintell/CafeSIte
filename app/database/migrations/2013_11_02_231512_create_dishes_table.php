<?php

use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('dishes', function($table)
    {
        $table->increments('id');
        $table->string('name')->unique();
        $table->string('type');
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