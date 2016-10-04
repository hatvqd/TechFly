<?php

use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('terms')->truncate();

        DB::table('terms')->insert([
            [
                'name' => 'Vé máy bay',
                'slug' => 'vemaybay',
            ],
            [
                'name' => 'Tin tức',
                'slug' => 'tintuc',
            ],
            [
                'name' => 'khuyến mãi',
                'slug' => 'khuyenmai',
            ],
        ]);   
    }
}
