<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('menus', function($table)
    {
        $table->increments('id');
        $table->string('name')->unique();
        $table->date('valid_on');
        $table->boolean('repeat');
        $table->integer('repeat_period');
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