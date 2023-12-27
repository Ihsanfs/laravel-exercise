<?php

namespace Database\Seeders;


use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = post::create('id_ID');

    	for($i = 1; $i <= 50; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('post')->insert([
    			'title' => $faker->name,
    			'content' => $faker->jobTitle,


    		]);

    	}
    }
}
