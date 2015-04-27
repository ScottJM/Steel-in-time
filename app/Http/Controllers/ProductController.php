<?php namespace SIT\Http\Controllers;

use Illuminate\Support\Str;
use SIT\CutType;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\MetalType;
use SIT\Products;

class ProductController extends Controller {

	protected $rules = [
		'grade' => ['required', 'min:1', 'max:16'],
		'metal_type_id' => ['required'],
		'cut_type_id' => ['required'],
		'width' => ['required', 'integer', 'min:1'],
		'height' => ['required', 'integer', 'min:1'],
		'length' => ['required', 'integer', 'min:1'],
		'price' => ['required', 'numeric'],
	];

	protected $defaultPerPage = 10;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$num = \Input::get('show', $this->defaultPerPage);

		$products = Products::with('metal_type', 'cut_type')->paginate($num);

		return view('products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$metal_types = MetalType::orderBy('name')->lists('name', 'id');
		$cut_types = CutType::orderBy('name')->lists('name', 'id');

		return view('products.create', compact('metal_types', 'cut_types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		Products::create( $request->all() );

		\Flash::success('You have added a product!');

		return redirect('products');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$metal_types = MetalType::orderBy('name')->lists('name', 'id');
		$cut_types = CutType::orderBy('name')->lists('name', 'id');

		$product = Products::findOrFail($id);


		return view('products.edit', compact('metal_types', 'cut_types', 'product'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$product = Products::findOrFail($id);

		$this->validate($request, $this->rules);

		$product->update( $request->all() );

		\Flash::success('You have edited the product!');

		return redirect('products');
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


	public function deleteMultiple()
	{
		$toDelete = \Input::get('delete');

		$num = Products::destroy($toDelete);

		\Flash::error("You have successfully deleted {$num} " . Str::plural('product',$num));

		return redirect('products');
	}
}
