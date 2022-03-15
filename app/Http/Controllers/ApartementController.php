<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Apartement;
use App\Models\Room;
use App\Models\Temperature;
use App\Models\User;
use App\Models\UserApartement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ApartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin.anyView');
        $user=Auth::id();
        // dd($user);
        $apartements=Apartement::whereHas('users',function($query) use ($user) {
            $query->where('users.id',$user);
        }
        )->with("adresse")->get();
        // $apartements=Apartement::with('rooms.temperature','users')->get();
        // dd($apartements);
        return view('apartements.index',[
            'apartements'=>$apartements
            // 'users'=>User::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin.anyView');
        // $this->authorize('create');
        $users=User::where('role','!=','super admin')->where('role','!=','super-admin')->get();
        $admins=$users->where('role','==','admin');
        $managers=$users->where('role','==','manager');
        $techniciens=$users->where('role','==','technicien');
        //for the viewer
        $user=User::whereDoesntHave('apartements')->get();
        $viewers=$user->where('role','==','viewer');
        // dd($techniciens);
        // dd($admins);
        return view('apartements.create',[
            'admins'=>$admins,
            'viewers'=>$viewers,
            'managers'=>$managers,
            'techniciens'=>$techniciens,
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
            "apartementName"=>"required|string|unique:apartements",
            "number_name"=>"required",
            "state"=>"required",
            "adress"=>"required",
            "ipBox"=>"required"
            ]);
            // dd($request->except('_token'));
            $apartement=Apartement::create($request->only(
                [
                    'apartementName',
                    'batiment',
                    'escalier',
                    'type',
                    'etage'
                ]
            ));
            $adress=$request->only(['company',
            'adress',
            'poste',
            'state',
            'tel',
            'tel1',
            'logitude',
            'latitude',
            'ipBox',]);
            $adress['apartement_id']=$apartement->id;

            Adresse::create($adress);
            $superadmin=User::where('role','=',"super admin")->orWhere('role','=',"super admin")->get();
            foreach($superadmin as $super){
                UserApartement::create(["user_id"=>$super->id,"apartement_id"=>$apartement->id]);
            }
            if($request->viewer){
                UserApartement::create(["user_id"=>$request->viewer,"apartement_id"=>$apartement->id]);
            }
            if($request->admin){
                UserApartement::create(["user_id"=>$request->admin,"apartement_id"=>$apartement->id]);
            }
            if($request->manager){
                UserApartement::create(["user_id"=>$request->manager,"apartement_id"=>$apartement->id]);
            }
            if($request->technicien){
                foreach($request->technicien as $technicien){
                    UserApartement::create(["user_id"=>$technicien,"apartement_id"=>$apartement->id]);
                }
            }
            if($request->number_name){
                foreach($request->number_name as $number_name){
                    Room::create(["number_name"=>$number_name,"apartement_id"=>$apartement->id]);
                }
            }
            // dd("done");
            return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id,Request $request){
        // $userId=Auth::user()->id;
        // dd(User::whereId($id)->with('apartements')->get());

        // filtre sur la premiére tableau
        if($request->filtre){
            // dd($request->filtre);
            $now=Carbon::now()->format('Y-m-d H:i');
            $week=Carbon::now()->subDays(42)->format('Y-m-d H:i');
            $filtre= Carbon::parse($request->filtre)->format('Y-m-d h:i');
            // dump($filtre);
            $apartement=Apartement::with(['rooms.temperature'=>function($query) use ($filtre){
                $query->where('Date_temperatures','<=',$filtre)->orderBy('Date_temperatures','desc');
            }
            ,'rooms.temperatures',
            'rooms.tempFiltre'=> function ($query) use ($now,$week) {
            $query->whereBetween('Date_temperatures',[$week,$now]);
        }])->find($id);
            return view('apartements.show',['apartement'=>$apartement]);
        }

        // filtre sur graph
        if($request->start && $request->end ){

            $start= Carbon::parse($request->start)->format('Y-m-d h:i');
            $end= Carbon::parse($request->end)->format('Y-m-d h:i');
            $now=Carbon::now()->format('Y-m-d H:i');
            $apartement=Apartement::with(['rooms.temperature'=>function($query) use ($now){
                $query->where('Date_temperatures','<=',$now)->orderBy('Date_temperatures','desc');
            }
            ,'rooms.temperatures',
            'rooms.tempFiltre'=> function ($query) use ($start,$end) {
                $query->whereBetween('Date_temperatures',[$start,$end]);
            }
            ])->find($id);
            return view('apartements.show',['apartement'=>$apartement]);

        }
        // get Table and graph without filter
        $now=Carbon::now()->format('Y-m-d H:i');
        $week=Carbon::now()->subDays(10)->format('Y-m-d H:i');
        $apartement=Apartement::with(['rooms.temperature'=>function($query) use ($now,$id){
                $query->where('Date_temperatures','<=',$now)->orderBy('Date_temperatures','desc');
            }
            ,'rooms.temperatures',
            'rooms.tempFiltre'=> function ($query) use ($week,$now,$id) {
                $query->whereBetween('Date_temperatures',[$week,$now]);
            }
        ])->find($id);

            // dd($apartement);
            return view('apartements.show',[
                'apartement'=>$apartement
            ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        //
    }
    public function historic($id,Request $request){

        return view('apartements.historic');
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
        //
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateconsigne(Request $request, $id)
    {
        if($request->Consigne_B){
            Temperature::whereId($id)->update(array('Consigne_B' => $request->Consigne_B));
        }
        if($request->Consigne_A){
            Temperature::whereId($id)->update(array('Consigne_A' => $request->Consigne_A));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
