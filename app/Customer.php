<?php namespace SIT;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Customer extends Model {

    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'first_name' => 10,
            'last_name' => 10,
            'email_address' => 10,
            'company_name' => 2,
            'billing_postcode' => 2,
            'phone_number' => 2,
            'mobile_number' => 2,

        ]
    ];

    protected $guarded = ['id'];


    public static function register($data)
    {
        if( isset($data['password']) ) {
            $user = User::create($data);
            $data['user_id'] = $user->id;
        }

        $customer = new static($data);

        return $customer;
    }

    public function user()
    {
        return $this->belongsTo('SIT\User');
	}

}
