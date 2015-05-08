<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');			// Unique Identifier for each order
			$table->integer('product_id');		// Id of product ordered
			$table->string('payment_method');	// Method of Payment
			$table->boolean('status'); 			// True = Paid | False = unpaid
			$table->decimal('amount_paid',9,2);	// Decimal for currency page
			$table->softDeletes();				// Enables a "recycling bin" effect whereby admins can see deleted entries
			$table->timestamps();				// Timestamps for any CRUD actions
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
