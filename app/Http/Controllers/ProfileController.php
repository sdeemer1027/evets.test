<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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

     //   dd( Auth::user()->id,$user);

        return view('profile',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' =>$pets,
        ]);
//        return view('profile');
    }

    public function edit()
    {
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();

        //   dd( Auth::user()->id,$user);

        return view('profileedit',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
        ]);
    }
    public function update(Request $request)
    {


  //      dd($request);
//try{
    DB::table('users')
        ->where('id','=',$request['id'])
        ->update([
            'firstname' =>$request['firstname'],
            'lastname' =>$request['lastname'],
            'updated_at' => now(),
        ]);

//}
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        return view('profile',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
        ]);

    }

}
