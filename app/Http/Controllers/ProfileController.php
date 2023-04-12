<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function photodelete(Request $request){

        foreach($request['file2'] as $file){
            File::delete($file);
            Storage::delete('public/'.$request['id'].'/'.$file);
        }


    //    dd($request , $file);


    }

public function editphotos(){
    $id= Auth::user()->id;
    $user = User::where('id',$id)->get();
    $pets = Pet::where('user_id',$id)->get();
    //   dd( Auth::user()->id,$user);

    $files = Storage::files('public/'.$id);
    return view('editphotos',[
        'section'   => 'phone-numbers',
        'title'     => 'Purchase Numbers',
        'subtitle'  => 'Search and Purchase Numbers Results',
        'users' =>$user,
        'pets' =>$pets,
        'files' => $files,

    ]);
}
    public function edit()
    {
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        $pets = Pet::where('user_id',$id)->get();
        //   dd( Auth::user()->id,$user);

        $files = Storage::files('public/'.$id);



      //  dd($files,Storage::allFiles(''));

        return view('profileedit',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' =>$pets,
            'files' => $files,

        ]);
    }
    public function update(Request $request)
    {
        if($request['file2']) {
            $newpic = $request['file2'];
        }else
            if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('' .$request['id'] . '/', 'public');
            $newpic = $request->file->hashName();
        }else{
    $newpic = $request['fileold'];
}

    DB::table('users')
        ->where('id','=',$request['id'])
        ->update([
            "profilepic" => $newpic,
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
