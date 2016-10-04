<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 Model::unguard();
    	//$this->call(UsersTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(TermsTableSeeder::class);

    	 Model::reguard();
    }
}
