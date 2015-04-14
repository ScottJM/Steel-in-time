<?php namespace SIT;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

	protected $guarded = ['id'];

	public function metal_type()
	{
		return $this->hasOne('MetalType');
	}

	public function cut_type()
	{
		return $this->hasOne('CutType');
	}

}
