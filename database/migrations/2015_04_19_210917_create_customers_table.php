<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('vat_number')->nullable();
            $table->mediumText('billing_address');
            $table->mediumText('shipping_address');
            $table->string('braintree_id');
            $table->boolean('receive_newsletter');
			$table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
