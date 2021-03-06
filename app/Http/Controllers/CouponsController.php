<?php namespace SIT\Http\Controllers;

use SIT\Coupon;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CouponsController extends Controller {

	protected $rules = [
		'short_name' => ['required'],
		'percent_off' => ['min:1', 'max:2'],
		'amount_off' => [ 'min:1', 'max:9999'],

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

		$coupons = Coupon::paginate($num);

		return view('coupons.index', compact('coupons'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('coupons.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		Coupon::create( $request->all() );

		\Flash::success('You have added a coupon!');

		return redirect('coupons');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request)
	{
		$this->validate($request, $this->rules);

		Coupon::create( $request->all() );

		\Flash::success('You have added a coupon!');

		return redirect('coupons');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$coupon = Coupon::findOrFail($id);

		return view('coupons.edit', compact('coupon'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$coupon = Coupon::findOrFail($id);

		$this->validate($request, $this->rules);

		$coupon->update( $request->all() );

		\Flash::success('You have edited the coupon!');

		return redirect('coupons');
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

		$num = Coupon::destroy($toDelete);

		\Flash::error("You have successfully deleted {$num} " . Str::plural('coupon',$num));

		return redirect('coupons');
	}
}
