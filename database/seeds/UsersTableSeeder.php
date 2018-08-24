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
        //reset table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
        	[
        		'name' 		=> "Super Administrator",
        		'email' 	=> "superadmin@indocoder.com",
        		'password' 	=> bcrypt('123secret')
        	],
        	[
        		'name' 		=> "Administrator",
        		'email' 	=> "administrator@indocoder.com",
        		'password' 	=> bcrypt('123secret')
        	],
        	[
        		'name' 		=> "Client User",
        		'email' 	=> "clientuser@indocoder.com",
        		'password' 	=> bcrypt('123secret')
        	],
        ]);
    }
}
