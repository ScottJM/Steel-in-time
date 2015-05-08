<?php namespace SIT\Http\Controllers\Storefront;

use Illuminate\Support\Facades\Input;
use SIT\Http\Requests;
use SIT\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SIT\User;

class AuthController extends Controller {

    public function check()
    {
        $req = Input::all();
        dd($req);
        $mod = array_keys($req);
        $data = (array) json_decode($mod[0]);

        if( isset($data['password']) && !empty($data['password']) ) {

            if( \Auth::attempt($data) ) {
                $user = $this->getCurrentUserWithCustomer(\Auth::id());
                return ['success' => true, 'user' => $user];
            }
            return ['error' => 'Please check your email address and password'];
        }

        return ['success' => true];
	}

    public function currentUser()
    {
        if( ! \Auth::check() ) {
            return null;
        }

        $user = $this->getCurrentUserWithCustomer(\Auth::id());

        return ['user' => $user];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCurrentUserWithCustomer($id)
    {
        $user = User::where('id', $id)->with('customer')->get()->first();
        return $user;
    }


}
