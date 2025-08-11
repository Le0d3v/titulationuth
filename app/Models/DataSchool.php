<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSchool extends Model
{
    protected $fillable = [
        "user_id", 
        "career",
        "speciality",
        "semester",
        "shift"
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }
}
