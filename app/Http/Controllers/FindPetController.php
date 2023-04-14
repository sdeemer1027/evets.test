<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FindPetController extends Controller
{
    //


    public function index()
    {
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        $pets = Pet::where('user_id',$id)->get();

        $results="";

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
        $ch = curl_init('https://api.petfinder.com/v2/types');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$tk->access_token.'']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $results = curl_exec($ch);
        $results= json_decode($results);
        $results=collect($results);




        return view('findpet',[
            'data' => $results,
            'users'=> $user,
            'token' =>$tk->access_token,

            ]);
    }

    public function showresults(Request $request){
        $token =$request['token'];
        $zip = $request['zip'];
        $type = $request['type'];
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();

        $ch = curl_init('https://api.petfinder.com/v2/animals?location='.$zip.'&type='.$type.'');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token.'']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $results = curl_exec($ch);


        $results= json_decode($results);
   //     dd($request,$results);

        $results=collect($results);



$searchfor =array(
    'type'=>$type,
    'zip'=>$zip,
);
        $searchfor=collect($searchfor);

        return view('findpetshow',[
            'data' => $results,
            'users'=> $user,
            'token' =>$token,
            'zip' => $zip,
            'searchfor' => $searchfor,
        ]);

    }


    public function showpet(Request $request){
        $token =$request['token'];
        $zip = $request['zip'];
        $type = $request['type'];
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        $petid = $request['petid'];

        //dd($request);



        $ch = curl_init('https://api.petfinder.com/v2/animals/'.$petid.'');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token.'']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $results = curl_exec($ch);
//        $results= json_decode(json_encode($results));
        $results= json_decode($results);
 //       dd($results,$results->animal);
  $results=collect($results->animal);

 //       $results=array($results);

      //  dd($request,$results);
        $searchfor =array(
            'type'=>$type,
            'zip'=>$zip,
        );
        $searchfor=collect($searchfor);

        return view('showpet',[
            'data' => $results,
            'users'=> $user,
            'token' =>$token,
            'zip' => $zip,
            'searchfor' => $searchfor,
        ]);

    }

}
