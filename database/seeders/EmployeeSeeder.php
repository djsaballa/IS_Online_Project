<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,150) as $index) {
	        DB::table('employees')->insert([
	            'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
	            'email' => $faker->email,
	            'password' => 'secret123',
                'created_at' => \Carbon\Carbon::now(),
        	    'updated_at' => \Carbon\Carbon::now()
	        ]);
        }
    }
}
