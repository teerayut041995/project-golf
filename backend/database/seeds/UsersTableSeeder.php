<?php


use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Teerayut Khunsuk',
	        'email' => 'teerayut041995@gmail.com',
	        'username' => 'teerayut041995',
	        'admin' => User::ADMIN_USER,
	        'verified' => User::VERIFIED_USER,
	        'email_verified_at' => now(),
	        'password' => Hash::make('123456'), // password
	        'remember_token' => Str::random(10),
        ]);
    }
}
