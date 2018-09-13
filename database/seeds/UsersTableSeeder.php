<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $faker = Factory::create();

        DB::table('users')->insert([
            [
            	'name' 		=> "Super Administrator",
                'slug'      => "super-administrator",
            	'email' 	=> "superadmin@indocoder.com",
            	'password' 	=> bcrypt('123secret'),
                'bio'       => $faker->text(rand(250,300))
            ],
            [
            	'name' 		=> "Administrator",
                'slug'      => "administrator",
            	'email' 	=> "administrator@indocoder.com",
            	'password' 	=> bcrypt('123secret'),
                'bio'       => $faker->text(rand(250,300))
            ],
            [
            	'name' 		=> "Client User",
                'slug'      => "client-user",
            	'email' 	=> "clientuser@indocoder.com",
            	'password' 	=> bcrypt('123secret'),
                'bio'       => $faker->text(rand(250,300))
            ],
        ]);
    }
}
