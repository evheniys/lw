<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('cortege_id')->unsigned();
            $table->date('reservation_date');
            $table->time('reservation_time_from');
            $table->time('reservation_time_till');
            $table->integer('reservationstatus_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('timetocall_id')->unsigned();
            $table->text('commentaries');
			$table->timestamps();

            $table->foreign('cortege_id')
                ->references('id')
                ->on('corteges')
                ->onDelete('cascade');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('timetocall_id')
                ->references('id')
                ->on('timetocalls')
                ->onDelete('cascade');

            $table->foreign('reservationstatus_id')
                ->references('id')
                ->on('reservationstatuses')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservations');
	}

}
