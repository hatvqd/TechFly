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
        DB::table('users')->truncate();

    	DB::table('users')->insert([
    		[
    			'name'=> 'Dat',
    			'email'=> 'dat@techfly.com',
    			'password'=> bcrypt('123456')
    		],
    		[
    			'name'=> 'Xuan',
    			'email'=> 'xuan@techfly.com',
    			'password'=> bcrypt('123456')
    		]
    		]);
    }
}
