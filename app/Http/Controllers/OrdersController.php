<?php namespace SIT\Http\Controllers;

use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\Orders;

class OrdersController extends Controller {

	protected $rules = [
		'payment_method' => ['required', 'string', 'min:1', 'max:64'],
		'status' => ['boolean'], // What does status reference? - Paid or sent?
		'amount_paid' => ['required', 'numeric', 'min:1', 'max: 9999'],
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

		$orders = Orders::paginate($num);

		return view('orders.index', compact('orders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// if we had a lookup table of payment methods, would it go here?
		//compact('payment_method'); 
		return view('orders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		Orders::create( $request->all() );

		\Flash::success('You have added an order!');

		return redirect('orders');
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
		$order = Orders::findOrFail($id);
		
		return view('orders.edit', compact('order'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$order = Orders::findOrFail($id);

		$this->validate($request, $this->rules);

		$order->update( $request->all() );

		\Flash::success('You have edited the order!');

		return redirect('orders');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$toDelete = \Input::get('delete');

		$num = Orders::destroy($toDelete);

		\Flash::error("You have successfully deleted {$num} " . Str::plural('order',$num));

		return redirect('orders');
	}

}
