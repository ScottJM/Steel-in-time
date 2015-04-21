<?php namespace SIT\Http\Controllers;

use Illuminate\Support\Str;
use SIT\Core\NewsletterManager;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\Customer;
use SIT\User;

class CustomersController extends Controller {

    private $newsletterManager;

    public function __construct(NewsletterManager $newsletterManager)
    {
        $this->newsletterManager = $newsletterManager;
    }

    protected $rules = [
        'last_name' => ['required'],
        'email_address' => ['email', 'required'],
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

        $customers = Customer::paginate($num);

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('customers.create', compact('customer_types', 'cut_types'));
    }

    public function search()
    {
        $term = \Input::get('term');

        $users = Customer::search($term)->get();


        return $users;

    }


    public function postCodeSearch()
    {
        $term = \Input::get('term');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.postcodes.io/postcodes/'.$term.'/autocomplete',
            CURLOPT_USERAGENT => 'cURL Request'
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
$result = json_decode($resp);
        return $result->result;
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

        if($request->get('receive_newsletter') == 1) {

            $this->newsletterManager->addEmailToList($data['email_address']);

        }

        if($request->get('create_temporary_password') == 1) {
            $tempPassword = $this->temporaryPassword();
            $user = User::create([
                'name' => $request->get('first_name') .' '. $request->get('last_name'),
                'email' => $request->get('email_address'),
                'password' => bcrypt($tempPassword)
            ]);
            $data['user_id'] = $user->id;

            //send temporary password via email
        }

        unset($data['create_temporary_password']);

        Customer::create( $data );

        \Flash::success('You have added a customer!');

        return redirect('customers');

    }

    public function temporaryPassword()
    {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);
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
        $customer = Customer::findOrFail($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $customer = Customer::findOrFail($id);

        $this->validate($request, $this->rules);

        $customer->update( $request->all() );

        \Flash::success('You have edited the customer!');

        return redirect('customers');
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

        $num = Customer::destroy($toDelete);

        \Flash::error("You have successfully deleted {$num} " . Str::plural('customer',$num));

        return redirect('customers');
    }
}
