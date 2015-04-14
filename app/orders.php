<?php namespace SIT;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {

	protected $guarded = ['id'];

	public function product()
	{
		return $this->hasOne('Products');
	}


}
