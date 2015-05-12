<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Products', function(Blueprint $table)
		{
			$table->integer('category_id')->unsigned();
            $table->boolean('freatured');
            $table->boolean('recommend');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Products', function(Blueprint $table)
		{
			$table->removeColumn('category_id');
            $table->removeColumn('freatured');
            $table->removeColumn('recommend');
		});
	}

}
