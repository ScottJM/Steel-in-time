<?php namespace SIT;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetalType extends Model {

	use SoftDeletes;

	protected $guarded = ['id'];

}
