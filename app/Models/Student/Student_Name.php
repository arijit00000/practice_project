<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student_Add;

class Student_Name extends Model
{
    use HasFactory;

    protected $table = 'student_name';
    protected $primarykey =  'mobile_no';

    protected $fillable= ([
        'mobile_no',
        'name'
    ]);

    public function addressJoin(){
        return $this->hasOne(Student_Add::class, 'mobile_no', 'mobile_no');
       // return $this->hasOne(Phone::class, 'foreign_key');
       // if primary key is defferent primary key should be mention seperately....
    }
}
