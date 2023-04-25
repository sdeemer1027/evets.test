<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        $pets = Pet::where('user_id',$id)->get();

        foreach($user as $me){
            $zip = $me->zip;
        }
        if(!$zip) {
        $zip ="07840";
        }
//dd($zip,$user);
        $apikey= getenv('API_Petfinder_KEY');
        $apisecret= getenv('API_Petfinder_Secret');
        $tkn = array(
            'grant_type' =>'client_credentials',
            'client_id' => $apikey,
            'client_secret'  =>  $apisecret );
        $ch = curl_init('https://api.petfinder.com/v2/oauth2/token');
        curl_setopt($ch,  CURLOPT_POSTFIELDS,$tkn);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tk =   curl_exec($ch);
        $tk= json_decode($tk);
        $ch = curl_init('https://api.petfinder.com/v2/animals?location='.$zip.'');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$tk->access_token.'']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $results = curl_exec($ch);
        $results= json_decode($results);
           $results=collect($results);

//        dd($user,$pets,$results);


        return view('home',[
            'data' => $results,]);
    }
}
