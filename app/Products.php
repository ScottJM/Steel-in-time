<?php namespace SIT;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model {

	use SoftDeletes;

	protected $guarded = ['id'];

	public function metal_type()
	{
		return $this->belongsTo('SIT\MetalType');
	}

	public function cut_type()
	{
		return $this->belongsTo('SIT\CutType');

	}

}
