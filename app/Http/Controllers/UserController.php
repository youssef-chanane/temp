<?php

namespace App\Http\Controllers;

use App\Models\Apartement;
use App\Models\Personal;
use App\Models\User;
use App\Models\UserApartement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        if($user->role=="super admin" || $user->role == "super-admin"){
            $users=User::withTrashed()->where('role','!=','super admin')->where('role','!=','super-admin')->get();
        }else{
            $users=User::withTrashed()->where('role','!=','super admin')->where('role','!=','super-admin')->where('role','!=','admin')->get();
        }

        return view('users.index',[
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartementsViewer=Apartement::whereDoesntHave('users',function($query) {
            $query->where('role','viewer');
        }
        )->get();
        $apartementsAdmin=Apartement::whereDoesntHave('users',function($query) {
            $query->where('role','admin');
        }
        )->get();
        $apartementsManager=Apartement::whereDoesntHave('users',function($query) {
            $query->where('role','manager');
        }
        )->get();
        $apartementsTechnicien=Apartement::get();
        // dd($apartementsViewer);
        return view('users.create',[
            'apartementsAdmin'=>$apartementsAdmin,
            'apartementsManager'=>$apartementsManager,
            'apartementsTechnicien'=>$apartementsTechnicien,
            'apartementsViewer'=>$apartementsViewer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|string|unique:users",
            "disable_at"=>"required",
            "role"=>"required"
            ]);
        $data=$request->only(['name','email','disable_at','role']);

        $data['password']=Hash::make($request['password']);

        // dd($data);
        $user=User::create($data);
        if($request->apartementsViewer){
            UserApartement::create(["user_id"=>$user->id,"apartement_id"=>$request->apartementsViewer]);
        }
        if($request->apartementsAdmin){
                foreach((array) $request->appartement as $apartement){
                    UserApartement::create(["user_id"=>$user->id,"apartement_id"=>$apartement]);
                }

        }
        if($request->apartementsManager){
            foreach((array) $request->appartement as $apartement){
                UserApartement::create(["user_id"=>$user->id,"apartement_id"=>$apartement]);
            }
        }
        if($request->apartementsTechnicien){
            foreach((array) $request->apartementsTechnicien as $apartement){
                UserApartement::create(["user_id"=>$user->id,"apartement_id"=>$apartement]);
            }
        }
        //adresse
        $adresse=$request->only(['company',
        'adress',
        'poste',
        'state',
        'tel',
        'tel1',
        'logitude',
        'latitude']);
        $adresse['user_id']=$user->id;
        Personal::create($adresse);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user=User::find($id);
        return view('users.edit',[
            'user'=>$user
        ]

        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|string",
            "disable_at"=>"required",
            ]);
        $data=$request->except(['_method','_token']);
        // dd($data);
        User::whereId($id)->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
}
