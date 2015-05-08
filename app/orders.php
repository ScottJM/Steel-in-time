<?php namespace SIT;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model {

	protected $guarded = ['id'];

	use SoftDeletes;

	public function product()
	{
		return $this->hasOne('Products');
	}


}
