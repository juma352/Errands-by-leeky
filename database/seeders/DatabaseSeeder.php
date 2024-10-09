<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\errand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $users = \App\Models\User::factory(300)->create();

        $users = \App\Models\User::all()->shuffle();

        for($i=0;$i < 20; $i++) {
            \App\Models\Customer::factory()->create([
                'user_id' => $users->pop()->id,
                
            ]);
        }
        $customers = \App\Models\Customer::all();
        for($i = 0; $i < 100; $i++){
            \App\Models\errand::factory()->create([
                'customer_id' => $customers->random()->id,
            ]);
        }
        foreach($users as $user){
            $errands = \App\Models\errand::inRandomOrder()->take(rand(0,4))->get();
            foreach($errands as $errand){
                \App\Models\ErrandApplication::factory()->create([
                    'errand_id' => $errand->id,
                    'user_id' => $user->id,
                    ]);
        }
    }
    }
}
