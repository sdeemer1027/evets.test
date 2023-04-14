<?php

namespace Database\Seeders;

use App\Models\Zipcode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZipcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
  //  }
}
