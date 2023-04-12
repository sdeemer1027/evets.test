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
$petpictures = DB::table('petpictures')->where('user_id',$id)->get();
     //   dd( Auth::user()->id,$user);

        return view('profile',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' =>$pets,
            'petpictures' => $petpictures,
        ]);
//        return view('profile');
    }

    public function edit()
    {
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        $pets = Pet::where('user_id',$id)->get();
        //   dd( Auth::user()->id,$user);

        return view('profileedit',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' =>$pets,
        ]);
    }
    public function update(Request $request)
    {

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('' .$request['id'] . '/', 'public');

            $petpic = array([
                "name" => $request->get('name'),
                "file_path" => $request->file->hashName()
            ]);

        }


    DB::table('users')
        ->where('id','=',$request['id'])
        ->update([
            "profilepic" => $request->file->hashName(),
            'firstname' =>$request['firstname'],
            'lastname' =>$request['lastname'],
            'address'=> $request['address'],
            'address2'=> $request['address2'],
            'city'=> $request['city'],
            'state'=> $request['state'],
            'zip' =>$request['zip'],
            'phone'=> $request['phone'],

            'facebook'=> $request['facebook'],
            'instagram'=> $request['instagram'],
            'youtube'=> $request['youtube'],
            'linkedin'=> $request['linkedin'],

            'age'=> $request['age'],
            'gender'=> $request['gender'],
            'description'=> $request['description'],

            'updated_at' => now(),
        ]);

        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        $pets = Pet::where('user_id',$id)->get();
        return view('profile',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' =>$pets,
        ]);

    }

}
