<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PetController extends Controller
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

        return view('mypets',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' =>$pets,
        ]);

    }

    public function edit($petid)
    {
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
$pets= Pet::where('id',$petid)->first();
        //   dd( Auth::user()->id,$user);

        return view('petedit',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' =>$pets,
        ]);
    }
    public function update(Request $request)
    {

$id = $request['id'];

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store(''.$id.'/pets', 'public');

            $petpic = array([
                "name" => $request->get('name'),
                "file_path" => $request->file->hashName()
            ]);


    DB::table('petpictures')
        ->insert([
            'user_id' => $id,
            'pet_id'      => $request['petid'],
            'name'      => $request['name'],
            'picture'   => $request->file->hashName(),

            //              'birthdate' => $request['birthday'],
        ]);

            DB::commit();


      //      dd($request,$petpic);


        }









        //      dd($request);
//try{
        $petpictures = DB::table('petpictures')->where('user_id',$id)->get();
//}
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        $pets = Pet::where('user_id',$id)->get();



        return view('profile',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' =>$pets,
            'petpictures' =>$petpictures,
        ]);

    }

    public function store(Request $request){
$id = $request['id'];
        $data['name'] =$request['name'];
        $data['breed'] =$request['breed'];
        $data['type'] =$request['name'];
        $data['birthday'] =$request['breed'];


        $rule  =  array(
            'name'                  => ['required', 'string', 'max:64'],
            'breed'               => [ 'string'],
            'type'               => [ 'string'],
            'birthday'               => [ 'string'],
        ) ;
        $validator = Validator::make($data,$rule);
        if ($validator->fails())
        {
            $messages = $validator->messages()->first();

            $notification = array(
                'message' => $messages,
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }


    //    dd($request);

            DB::table('pets')
                ->insert([
                'user_id' => $id,
                'name'      => $request['name'],
                'breed'   => $request['breed'],
                'type'  => $request['type'],
  //              'birthdate' => $request['birthday'],
            ]);

            DB::commit();

        unset($request);


        //dd($request);
  //      $id= Auth::user()->id;

        $user = User::where('id',$id)->get();
        $pets = Pet::where('user_id',$id)->get();

        return view('profile',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
            'pets' => $pets,
        ]);

    }
    public function addnew(){
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();

        //   dd( Auth::user()->id,$user);

        return view('mypetsaddnew',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'users' =>$user,
        ]);

    }


}
