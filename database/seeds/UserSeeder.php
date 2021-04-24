<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::where('email','mahbub@gmail.com')->first();
    	if (is_null($user)){
	        $user = new User();
	        $user->name = "Mahbub";
	        $user->email = "mahbub@gmail.com";
	        $user->password = Hash::make('123456');
	        $user->save();
	    }
    }
}
