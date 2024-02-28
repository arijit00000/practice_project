<?php

namespace App\Models\Calling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallingFeedback extends Model
{
    use HasFactory;

    protected $table="callingfeedback";

    protected $fillable = [
        "f_name"
    ];
}
