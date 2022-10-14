<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Console\Seeds\WithoutModel\Events;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

$user = User::factory()->create(['name' => 'John Doe',
'email' => 'john@gmail.com']);

        listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create(
        //     [
        //         'title' => 'Laravel Senior Developer',
        //         'tags' => 'larave, javascript',
        //         'company' => 'Acme Corp',
        //         'location' => 'Boston,MA',
        //         'email' => 'email1@email.com',
        //         'website' => 'http://www.acme.com',
        //          'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt nam nostrum beatae suscipit fugiat dolor pariatur velit adipisci exercitationem ratione?', 
        //     ]
        //     );

        //     Listing::create(
        //         [
        //             'title' => 'Full-stack engineer',
        //             'tags' => 'laravel, backend,api',
        //             'company' => 'Stark Industries',
        //             'location' => 'New York,NY',
        //             'email' => 'email2@email.com',
        //             'website' => 'http://www.stark industries.com',
        //              'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt nam nostrum beatae suscipit fugiat dolor pariatur velit adipisci exercitationem ratione?', 
        //         ]
                // );
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
