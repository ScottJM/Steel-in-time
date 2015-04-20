<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('short_name');
			$table->string('description');
			$table->integer('percent_off');
			$table->integer('amount_off');
			$table->dateTime('start_at');
			$table->dateTime('expiry_at');
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
		Schema::drop('coupons');
	}

}
