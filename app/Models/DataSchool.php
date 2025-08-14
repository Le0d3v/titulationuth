<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSchool extends Model
{
    protected $table = 'dataschool';
    
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

    public function process() {
        return $this->belongsTo(Process::class);
    }

    public function dataSchool() {
        return $this->belongsTo(DataSchool::class, 'user_id');
    }
}
