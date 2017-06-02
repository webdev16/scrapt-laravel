<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatesAppeals extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dates_appeals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('township_id')->unsigned();
			$table->integer('year');
			$table->integer('type')->nullable()->default(0);
			$table->dateTime('open')->nullable()->default(NULL);
			$table->dateTime('close')->nullable()->default(NULL);
			$table->dateTime('refresh')->nullable()->default(NULL);

			$table->timestamps();

			$table->foreign('township_id')->references('id')->on('townships');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dates_appeals');
	}

}
