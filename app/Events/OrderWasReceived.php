<?php namespace SIT\Events;

use SIT\Events\Event;

use Illuminate\Queue\SerializesModels;

class OrderWasReceived extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

}
