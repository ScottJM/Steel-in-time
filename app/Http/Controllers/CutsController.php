<?php namespace SIT\Http\Controllers;

use Illuminate\Support\Str;
use Input;
use SIT\CutType;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CutsController extends Controller {

	protected $rules = [
		'name' => ['required', 'min:1', 'max:64']
	];

	protected $defaultPerPage = 10;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$num = Input::get('show', $this->defaultPerPage);

		$cuts = CutType::paginate($num);

		return view('cuts.index', compact('cuts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cuts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		CutType::create( $request->all() );

		\Flash::success('You have added a type of cut!');

		return redirect('cuts');
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
		$cut = CutType::findOrFail($id);

		return view('cuts.edit', compact('cut'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$cut = CutType::findOrFail($id);

		$this->validate($request, $this->rules);

		$cut->update( $request->all() );

		\Flash::success('You have edited the cut type!');

		return redirect('cuts');
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

		$num = CutType::destroy($toDelete);

		\Flash::error("You have successfully deleted {$num} " . Str::plural('cut',$num));

		return redirect('cuts');
	}
}
