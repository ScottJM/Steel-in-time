<?php namespace SIT\Http\Controllers;

use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function getIndex()
	{
		return view('admin.index');
	}
}
