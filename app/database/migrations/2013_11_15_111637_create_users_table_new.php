<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTableNew extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::dropIfExists('users');

		Schema::create('users', function($table)
    {
        $table->increments('id');
        $table->string('name')->unique();
        $table->string('password');
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
		Schema::drop('users');
	}

}