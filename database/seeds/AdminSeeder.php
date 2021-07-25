<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'havid', 
            'email' => 'Havid@gmail.com',
            'password' => Hash::make('admin'),
            'user_type' => 'admin'
        ]);

        $admin = Admin::create([
            'fullname' => 'Haviddisandi',
            'user_id'  => $user->id,
            'phone_number' => '081233455232',
            'fulladdress' => 'Banyuwangi'

        ]);
    }
}
