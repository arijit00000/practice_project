<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Add extends Model
{
    use HasFactory;

    protected $table = 'student_add';
    protected $fillable= ([
        'mobile_no',
        'address'
    ]);
}
