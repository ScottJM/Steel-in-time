<?php namespace SIT;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CutType extends Model {

	use SoftDeletes;

	protected $guarded = [
		'id'
	];
}
