<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('logo');
            $table->string('url');
			$table->timestamps();
		});

        Schema::create('category_service', function(Blueprint $table)
        {
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('categoty_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
		Schema::drop('services');
        Schema::drop('category_service');
	}

}
