<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Http\Models\usermodel;


class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0;$i<=50;$i++){
        // $data=new usermodel;
        // $data->name=Str::random(5);
        // $data->email=Str::random(5).'@gmail.com';
        // $data->address=Str::random(25);
        // }
        $faker=Faker::create();
        for($i=0;$i<=50;$i++){
        $data=new usermodel;
        $data->name=$faker->name;
        $data->email=$faker->email;
        $data->address=$faker->address;
        $data->save();
        }
    }
}

