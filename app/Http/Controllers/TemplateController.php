<?php namespace SIT\Http\Controllers;

use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TemplateController extends Controller {

	public function show($template)
	{
        $template = str_replace('.html', '', $template);

		return view('templates.'.$template);
	}

}
