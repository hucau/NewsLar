<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mt95_users')->insert(
        	[
        		[
        			'username' => 'hucau',
        			'password' => bcrypt('123456'),
        			'level'	   => 1,
        			'created_at' => new DateTime()
        		],
        		[
        			'username' => 'bongma',
        			'password' => bcrypt('123456'),
        			'level'	   => 2,
        			'created_at' => new DateTime()
        		],
        		[
        			'username' => 'manhthang',
        			'password' => bcrypt('123456'),
        			'level'	   => 2,
        			'created_at' => new DateTime()
        		],
        		[
        			'username' => 'hacker',
        			'password' => bcrypt('123456'),
        			'level'	   => 3,
        			'created_at' => new DateTime()
        		]
        	]	
       	);
    }
}
