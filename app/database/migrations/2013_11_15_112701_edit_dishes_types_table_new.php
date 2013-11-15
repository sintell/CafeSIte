<?php

use Illuminate\Database\Migrations\Migration;

class EditDishesTypesTableNew extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Add veight field
		Schema::table('dishes', function($table){
      $table->foreign('type')->references('id')->on('dishes_types');
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
			// $table->dropColumn('veight');
		});
	}

}