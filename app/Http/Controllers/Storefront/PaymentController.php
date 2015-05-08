<?php namespace SIT\Http\Controllers\Storefront;

use Illuminate\Foundation\Bus\DispatchesCommands;
use SIT\Commands\CreateCustomer;
use SIT\Coupon;
use SIT\Customer;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\OrderItems;
use SIT\Orders;

class PaymentController extends Controller {

    use DispatchesCommands;

    public function make()
    {

        $data = \Input::all();
        $coupon = null;

        if(isset($data['token'])) {
            $amount = $data['amount'];
            try {

                $response = \Stripe::charges()->create([
                    "amount" => $amount,
                    "currency" => "gbp",
                    "card" => $data['token']
                ]);
                if($response['id']) {
                    if(isset($data['coupon'])) {
                        $coupon = Coupon::where('short_name', $data['coupon'])->get()->first();
                    }
                    if(empty($data['user'])) {
                       $customer = $this->dispatch(
                           new CreateCustomer($data['customer'])
                       );
                    } else {
                        $customer = Customer::where('user_id', $data['user']['id'])->get()->first();
                    }
                    $coupon_id = !empty($coupon) ? $coupon->id : null;
                    $order = Orders::create([
                        'customer_id' => $customer->id,
                        'payment_method' => 'card',
                        'status' => 1,
                        'amount_paid' => $data['amount'],
                        'coupon_id' => $coupon_id,
                        'shipping_address' => isset($data['customer']['shipping_address']) ? $data['customer']['shipping_address'] : '',
                        'shipping_postcode' => isset($data['customer']['shipping_postcode']) ? $data['customer']['shipping_postcode'] : '',
                        'billing_address' => isset($data['customer']['billing_address']) ? $data['customer']['billing_address'] : '',
                        'billing_postcode' => isset($data['customer']['billing_postcode']) ? $data['customer']['billing_postcode'] : '',
                        'subtotal' => \Cart::getSubTotal(),
                        'tax' => config('steelintime.tax')
                    ]);

                    $items = \Cart::getContent();

                    foreach($items as $item) {
                        $item->id; // the Id of the item
                        OrderItems::create([
                            'order_id' => $order->id,
                            'product_id' => $item->id,
                            'price' => $item->price,
                            'qty' => $item->quantity,
                        ]);
                    }
                    \Cart::clear();
                    return [
                        'success' => true,
                        'customer' => $customer,
                        'order' => $order
                    ];
                }

            } catch(\Exception $e) {
                return ['error' => $e->getMessage()];
            }


        }

	}

}
