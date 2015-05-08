<?php namespace SIT\Commands;

use Illuminate\Foundation\Bus\DispatchesCommands;
use SIT\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use SIT\Events\OrderWasReceived;
use SIT\OrderItems;
use SIT\Orders;
use SIT\Products;

class NewOrder extends Command implements SelfHandling {

    use DispatchesCommands;
    /**
     * @var
     */
    private $data;

    /**
     * Create a new command instance.
     *
     * @param $data
     */
	public function __construct($data)
	{

        $this->data = $data;
    }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
        $data = array_only($this->data, [
            'customer_id',
            'payment_method',
            'status',
            'amount_paid',
            'coupon_id',
            'billing_address',
            'billing_postcode',
            'shipping_address',
            'shipping_postcode',
            'subtotal',
            'tax',
            'amount_off',
            'total'
        ]);

        if( empty($data['customer_id']) ) {
            $customer = $this->dispatch( new CreateCustomer($this->data) );
            $data['customer_id'] = $customer->id;
        }



        $data['tax'] = config('steelintime.tax');

        $order = Orders::create( $data );

        if( !empty($this->data['qty']) ) {
            foreach($this->data['qty'] as $k => $qty) {
                $product = Products::findOrFail($this->data['products'][$k]);
                OrderItems::create([
                    'qty' => $qty,
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price
                ]);
            }
        }


		\Log::info("New order created: ".$order->id);

        event( new OrderWasReceived( $order ) );

	}

}
