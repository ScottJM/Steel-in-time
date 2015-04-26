<?php namespace SIT\Http\Controllers\Storefront;

use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends Controller {

    public function getIndex()
    {
        return view ( 'storefront.index.index' );
    }

}
