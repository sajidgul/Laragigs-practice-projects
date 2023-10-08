<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name'=>'Hayat',
            'email'=>'Hayat@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
        // \App\Models\Listing::factory()->create();

        // Listing::create([
        //     'title'=>'Laravel Senior Developer',
        //     'tags'=>'Laravel, Javascript',
        //     'company'=>'AntonX',
        //     'location'=>'Peshawar, Saddar',
        //     'email'=>'sajid@gmail.com',
        //     'website'=>'AntonX.com',
        //     'description'=>'Hello, This is sajid from peshawar, Working as
        //     laravel intern at AntonX from the last one month',
        // ]);

        // Listing::create([
        //     'title'=>'Laravel Senior Developer',
        //     'tags'=>'Laravel, Javascript',
        //     'company'=>'AntonX',
        //     'location'=>'Peshawar, Saddar',
        //     'email'=>'sajid@gmail.com',
        //     'website'=>'AntonX.com',
        //     'description'=>'Hello, This is sajid from peshawar, Working as
        //     laravel intern at AntonX from the last one month',
        // ]);
    }
}