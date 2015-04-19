<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			$table->integer('user_id')->nullable();
			$table->integer('coupon_id')->nullable();
			$table->string('shipping_address')->nullable();
			$table->string('billing_address');
			$table->string('shipping_status');
			$table->dropColumn('product_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function(Blueprint $table)
		{
			//
		});
	}

}
