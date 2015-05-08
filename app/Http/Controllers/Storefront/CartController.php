<?php namespace SIT\Http\Controllers\Storefront;

use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\Products;

class CartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->returnCart();
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
	public function store(Request $request)
	{
		$id = $request->get('product');
		$qty = $request->get('qty');

        $product = Products::findOrFail($id);

        $item = \Cart::add([
            'id' => $product->id,
            'name' => $product->description,
            'price' => $product->price,
            'quantity' => $qty,
            'attributes' => array()
        ]);

        return $product;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return \Cart::get($id);
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
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id, Request $request)
	{
        $item = \Cart::get($id);
        $diff = $request->get('quantity', 0) - $item->quantity;
		 \Cart::update($id, [
            'quantity' => $diff
        ]);

        return ['status' => 'OK'];
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        return \Cart::remove($id);
	}

    /**
     * @return array
     */
    public function returnCart()
    {
        return array_values(\Cart::getContent()->toArray());
    }

}
