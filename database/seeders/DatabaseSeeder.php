<?php

namespace Database\Seeders;

use App\Models\User;
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


    }
}
