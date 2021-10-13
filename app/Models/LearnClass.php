<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnClass extends Model
{
    use HasFactory;
    public function students(){
        $this->hasMany(Student::class,'learnclass_id');
    }
}
