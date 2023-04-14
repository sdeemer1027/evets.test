<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Zipcode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $users = [
            [
//                'id'             => 1,
                'name'           => 'Dr.Steve',
                'firstname'     => 'Steven',
                'lastname'      => 'Deemer',
                'address' => '2433 Garfield St',
                'address2' => 'Apt A',
                'city' => 'Hollywood',
                'state' => 'FL',
                'zip' => '33020',
                'phone' => '954-391-0398',
                'phone2' => '954-391-0398',

                'facebook' =>  'https://www.facebook.com/Stevendeemer2017',
                'facebook2' => 'https://www.facebook.com/drsteve2020',
                'instagram' => 'https://www.instagram.com/sd1964.with/',
                'linkedin' => 'https://www.linkedin.com/in/steven-deemer-6bb54b150/',
                'youtube' => 'https://www.youtube.com/channel/UCTx60bsEpHaIRAxMp9Fjy5g',
                'profilepic' => 'me.jpg',
                'gender' =>'male',
                'age' => '55',
                'lat' => '',
                'lng' => '',
                'description' => '',
                'looking' => '',
                'email'          => 'Dr.Steve@steven.news',
                'password'       => '$2y$10$7EMc/1kS3h/LOzH9IkXakOzHi9EG1PCDhmO3ckYlZcIh8R2jnQ0WK',
                'remember_token' => Str::random(10),
            ],
        ];

        User::insert($users);



        \App\Models\User::factory(10)->create();


        Zipcode::truncate();
        $csvFile = fopen(base_path("database/data/zips.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Zipcode::create([
                    "id" => $data['0'],
                    "zip" => $data['1'],
                    "type" => $data['2'],
                    "city" => $data['3'],
                    "typeb" => $data['4'],
                    "statename" => $data['5'],
                    "stateabv" => $data['6'],
                    "code" => $data['7'],
                    "lat" => $data['8'],
                    "lng" => $data['9'],
                    "country" => $data['10'],
                    "status" => $data['11'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);







    }
}
