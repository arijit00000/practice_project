<?php

namespace App\Models\Calling;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallingData extends Model
{
    use HasFactory;

    protected $table="callingdata";

    protected $fillable = [
        "patient_name",
        "patient_number",
        "appoint_date",
        "comment"
        // "notification_date"
    ];
}
