<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert(
         	array(
				[
			    'name'=> "Anton",
	            'email' => "anton@test.com",
	            'password' => bcrypt('secret')
        		],
        		[
			    'name'=> "Alex",
	            'email' => "alex@test.com",
	            'password' => bcrypt('secret')
        		],
        		[
			    'name'=> "Vlad",
	            'email' => "vlad@test.com",
	            'password' => bcrypt('secret')
        		],
        		[
			    'name'=> "Mariya",
	            'email' => "mariya@test.com",
	            'password' => bcrypt('secret')
        		],
        		[
			    'name'=> "Karina",
	            'email' => "karina@test.com",
	            'password' => bcrypt('secret')
        		],
        		[
			    'name'=> "Rodion",
	            'email' => "rodion@test.com",
	            'password' => bcrypt('secret')
        		]
        	)
        );
    }
}
