<?php

namespace App\Http\Controllers;

use App\Models\Apartement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Hash::make(123456789));
        $user=Auth::user();
        $now = Carbon::createFromFormat('Y-m-d H:i:s', now());
        $apartement=$user->apartements->first();
        if($user->disable_at){
            $disable_at = Carbon::createFromFormat('Y-m-d', $user->disable_at);
            if($now->gte($disable_at)){
                // dd("where are you going");
                User::destroy($user->id);
                return redirect()->back();
            }
        }
        return redirect()->route('apartements.show',$apartement->id);
    }
}
