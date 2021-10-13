<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $students = new Student();
        $students->name = 'Hà Huy Cường';
        $students->image = 'image.jpg';
        $students->email = 'hahuycuong@gmail.com';
        $students->phone = '0348400246';
        $students->learnclass_id='1';
        $students->save();
        $students = new Student();
        $students->name = 'Hà Huy Tập';
        $students->image = 'image.jpg';
        $students->email = 'hahuytap@gmail.com';
        $students->phone = '0348400246';
        $students->learnclass_id='2';
        $students->save();
        $students = new Student();
        $students->name = 'Hà Huy Hoàng';
        $students->image = 'image.jpg';
        $students->email = 'hahuyhoang@gmail.com';
        $students->phone = '0348400246';
        $students->learnclass_id='3';
        $students->save();
    }
}
