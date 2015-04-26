<?php namespace SIT\Commands;

use Illuminate\Foundation\Bus\DispatchesCommands;
use SIT\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use SIT\Core\NewsletterManager;
use SIT\Customer;
use SIT\Events\CustomerWasCreated;
use SIT\User;

class CreateCustomer extends Command implements SelfHandling {

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
        $this->data = array_only( $data, [
            'receive_newsletter',
            'email_address',
            'last_name',
            'customer_name',
            'first_name',
            'create_temporary_password',
            'company_name',
            'vat_number',
            'billing_address',
            'billing_postcode',
            'shipping_address',
            'shipping_postcode',
            'phone_number',
            'mobile_number',
        ]);

    }

    /**
     * Execute the command.
     *
     * @param NewsletterManager $newsletterManager
     * @return static
     */
	public function handle(NewsletterManager $newsletterManager)
	{
        if(isset($this->data['receive_newsletter']) && $this->data['receive_newsletter'] == 1) {
            $newsletterManager->addEmailToList($this->data['email_address']);
        }

        if( empty($this->data['last_name']) && !empty($this->data['customer_name']) ) {
            $arr = explode(' ',$this->data['customer_name']);
            if(count($arr) == 1) {
                $this->data['last_name'] = $arr[0];
                $this->data['first_name'] = '';
            } else {
                $this->data['first_name'] = $arr[0];
                $this->data['last_name'] = end($arr);

            }
            unset($this->data['customer_name']);
        }

        if(isset($this->data['create_temporary_password']) && $this->data['create_temporary_password'] == 1) {
            $tempPassword = User::temporaryPassword();
            $user = User::create([
                'name' => $this->data['first_name'] .' '. $this->data['last_name'],
                'email' => $this->data['email_address'],
                'password' => bcrypt($tempPassword)
            ]);
            $this->data['user_id'] = $user->id;

        }

        if(isset($this->data['create_temporary_password'])) unset($this->data['create_temporary_password']);
        if(isset($this->data['customer_id'])) unset($this->data['customer_id']);
        if(isset($this->data['test'])) unset($this->data['test']);

        $customer = Customer::create( $this->data );

        event( new CustomerWasCreated($customer) );

        return $customer;

    }

}
