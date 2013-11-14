<?php

use Illuminate\Database\Migrations\Migration;

class DishesAddVeight extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Add veight field
		Schema::table('dishes', function($table){
			$table->integer('veight')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Delete veight field
		Schema::table('dishes', function($table){
			$table->dropColumn('veight');
		});
	}

}