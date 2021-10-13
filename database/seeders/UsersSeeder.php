<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Boss';
        $user->email = 'boss@gmail.com';
        $user->password = Hash::make('123456');
        $user->phone = '0265999998';
        $user->address = '177 Cầu Diễn Hà Nội';
        $user->date_of_birth = '2000-12-27';
        $user->save();


        $user = new User();
        $user->name = 'Hà Huy Cường';
        $user->email = 'hahuycuong@gmail.com';
        $user->password = Hash::make('123456');
        $user->phone = '615165565';
        $user->address = '17 Cầu Diễn Hà Nội';
        $user->date_of_birth = '1988-12-27';
        $user->save();

        $user = new User();
        $user->name = 'Managar';
        $user->email = 'manager@gmail.com';
        $user->password = Hash::make('123456');
        $user->phone = '664585287';
        $user->address = '177 Cầu Đen Hà Nội';
        $user->date_of_birth = '1997-12-27';
        $user->save();
    }
}
