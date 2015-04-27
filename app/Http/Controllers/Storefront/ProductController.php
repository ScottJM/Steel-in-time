<?php namespace SIT\Http\Controllers\Storefront;

use Illuminate\Support\Collection;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\MetalType;
use SIT\Products;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $metal = $request->get('metal');
        $grade = $request->get('grade');
        $cut = $request->get('cut');

        if($metal && $grade && $cut) {
            return Products::with('metal_type', 'cut_type')->where("metal_type_id", "=", $metal)->where("grade", "=", $grade)->where("cut_type_id", "=", $cut)->get();
        }

        return Products::with('metal_type', 'cut_type')->get();
	}

    public function grades(Request $request)
    {
        $metal = $request->get('metal');

        if(!$metal) {
            $array = new Collection( Products::lists('grade') );
        }

        if( $metal ) {

            $array = new Collection( Products::where("metal_type_id", "=", $metal )->lists('grade') );
        }

        return $array->unique()->toArray();
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Products::findOrFail($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
