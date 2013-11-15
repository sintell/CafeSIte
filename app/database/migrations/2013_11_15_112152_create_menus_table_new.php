<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenusTableNew extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
    Schema::dropIfExists('menus');

		Schema::create('menus', function($table)
    {
        $table->increments('id');
        $table->string('name')->unique();
        $table->date('valid_on');
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
		Schema::drop('menus');
	}

}