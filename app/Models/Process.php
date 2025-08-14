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

    public function dataschool()
    {
        return $this->hasOne(DataSchool::class);
    }

    public function processes()
    {
        return $this->hasMany(Process::class, 'user_id');
    }

    public function getProgressPercentage($processes = [])
    {
        $totalSteps = 4;
        $completedSteps = 0;

        if ($processes["data_validation"] == 1) {
            $completedSteps++;
        }
        if ($processes["images_upload"] == 1) {
            $completedSteps++;
        }
        if ($processes["donation_payment"] == 1) {
            $completedSteps++;
        }
        if ($processes["tittle_payment"] == 1) {
            $completedSteps++;
        }

        return $completedSteps / $totalSteps * 100;
    }

    public function getCompletedProcesses() {
        $processes = [];

        if($this->data_validation == 1) {
            $processes[] = $this->data_validation;
        }
    }

}
