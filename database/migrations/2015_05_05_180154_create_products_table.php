<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /**
         * WESLEY SE VOCÊ OLHAR NO COMMIT ANTERIOR, ESSES CAMPOS JA EXISRTIAM, SÓ ESTAVAM EM OUTRA MIGRATION CHAMADA PRODUCTS,
         * Q MODIFICAVA A TABELA products.
         */
		Schema::create('products', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('category_id')->unsigned()->default(1);
            $table->boolean('featured');
            $table->boolean('recommend');
            $table->string('name',80);
            $table->text('description');
            $table->decimal('price');
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
		Schema::drop('products');
	}

}
