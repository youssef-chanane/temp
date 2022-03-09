<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {
        $role = Auth::user()->role;
        // dd($role);
        $id = Auth::user()->id;
        if($role=="viewer"){
            return "/apartements/$id";
        }else{
            return '/apartements';
        }
        // if($role=='super admin' || $role=='admin' || $role == 'super-admin'){
        //     return '/users';
        // }else if($role=="viewer"){
        //     return "/apartements/$id";
        // }else{
        //     return '/home';
        // }
        // switch ($role) {
        //   case 'super admin':
        //     return '/users';
        //     break;
        //   case 'viewer':
        //     return "/apartements/$id";
        //     break;

        //   default:
        //     return '/home';
        //   break;
        // }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
