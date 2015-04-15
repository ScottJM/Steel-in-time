<?php namespace SIT\Http\Controllers;

use Illuminate\Support\Str;
use SIT\CutType;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\MetalType;

class MetalsController extends Controller {

	protected $rules = [
		'name' => ['required'],
		'ferrous' => ['boolean'],
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

		$metals = MetalType::paginate($num);

		return view('metals.index', compact('metals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('metals.create', compact('metal_types', 'cut_types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		MetalType::create( $request->all() );

		\Flash::success('You have added a metal!');

		return redirect('metals');

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
		$metal = MetalType::findOrFail($id);

		return view('metals.edit', compact('metal'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$metal = MetalType::findOrFail($id);

		$this->validate($request, $this->rules);

		$metal->update( $request->all() );

		\Flash::success('You have edited the metal!');

		return redirect('metals');
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

		$num = MetalType::destroy($toDelete);

		\Flash::error("You have successfully deleted {$num} " . Str::plural('metal',$num));

		return redirect('metals');
	}
}
