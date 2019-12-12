<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $password = Hash::make('R6LCGJ@q(WUX5RV1fmFTZelS');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@e2e.vn',
            'password' => $password,
        ]);
    }
}
