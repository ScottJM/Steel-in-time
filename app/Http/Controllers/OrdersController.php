<?php namespace SIT\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use SIT\Commands\NewOrder;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\Orders;
use SIT\Products;

class OrdersController extends Controller {

    use DispatchesCommands;

	protected $rules = [
		'customer_name' => ['required'],
		'email_address' => ['required', 'email'],
		'billing_postcode' => ['required'],
		'payment_method' => ['required', 'string', 'min:1', 'max:64'],
		'status' => ['boolean'], // What does status reference? - Paid or sen
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
		$products = Products::with('metal_type', 'cut_type')->where('in_stock', '=', 1)->get();
		return view('orders.create', compact('products'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

        $data = $request->all();

        $this->dispatch(
            new NewOrder($data)
        );

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
