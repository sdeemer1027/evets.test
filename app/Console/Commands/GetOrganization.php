<?php

namespace App\Console\Commands;

use App\Models\Zipcode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetOrganization extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-organization';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $zip = DB::table('zipcodes')->where('status','1')->first();
        $zip1 = $zip->zip;
        $zipid = $zip->id;
//dd($zip1,$zip,$zip->zip);

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
        $ch = curl_init('https://api.petfinder.com/v2/organizations?limit=100&location='.$zip1.'&distance=10');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$tk->access_token.'']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $results = curl_exec($ch);
        $results= json_decode($results);
        $results=collect($results);

        foreach($results['organizations'] as $shelter){
            $shel=      DB::table('organizations')->where('pid',$shelter->id)->first();
            if(!$shel){
                //            dd($shelter->id,$shel);
                DB::table('organizations')
                    ->insert([
                        'pid' => $shelter->id,
                        'name'      => $shelter->name,
                        'email'   => $shelter->email,
                        'phone'  => $shelter->phone,
                        'address1' => $shelter->address->address1,
                        'address2' =>$shelter->address->address2,
                        'city' =>$shelter->address->city,
                        'state' =>$shelter->address->state,
                        'postcode' =>$shelter->address->postcode,
                        'country' =>$shelter->address->country,
                        'hoursmonday' =>$shelter->hours->monday,
                        'hourstuesday'=>$shelter->hours->tuesday,
                        'hourswednesday'=>$shelter->hours->wednesday,
                        'hoursthursday'=>$shelter->hours->thursday,
                        'hoursfriday'=>$shelter->hours->friday,
                        'hourssaturday'=>$shelter->hours->saturday,
                        'hourssunday'=>$shelter->hours->sunday,
                        'url'=>$shelter->url,
                        'website'=> $shelter->website,
                        'mission_statement'=> $shelter->mission_statement,
                        'facebook' => $shelter->social_media->facebook,
                        'twitter' => $shelter->social_media->twitter,
                        'youtube' => $shelter->social_media->youtube,
                        'instagram' => $shelter->social_media->instagram,
                    ]);

                DB::commit();
            }
//DB::table('organizations')->where('pid',)

        }


        $zst =      Zipcode::where('zip',$zip1)->update(['status' => '2', 'updated_at' => now()]);


        //   dd($results,$zip,$zipid,$zippy);
print_r($zip1);
/*
        return view('organizations',[
            'section'   => 'phone-numbers',
            'title'     => 'Purchase Numbers',
            'subtitle'  => 'Search and Purchase Numbers Results',
            'data' => $results,
            'zip' =>$zip1,
            'zst' =>$zst,
        ]);
        */
   // }
    }
}
