<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = [
        "data_validation",
        "images_upload",
        "donation_payment",
        "tittle_payment",
        "dataSchool_id",
    ];

    public function data() {
        return $this->belongsTo(DataSchool::class);
    }
}
