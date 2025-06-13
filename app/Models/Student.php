<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Course;

class Student extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class
        );
    }
}
