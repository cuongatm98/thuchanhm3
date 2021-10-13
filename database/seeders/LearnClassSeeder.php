<?php

namespace Database\Seeders;

use App\Models\LearnClass;
use Illuminate\Database\Seeder;

class LearnClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $learnClass = new LearnClass();
        $learnClass->name = '10A1';
        $learnClass->save();
        $learnClass = new LearnClass();
        $learnClass->name = '10A2';
        $learnClass->save();
        $learnClass = new LearnClass();
        $learnClass->name = '10A3';
        $learnClass->save();
    }
}
