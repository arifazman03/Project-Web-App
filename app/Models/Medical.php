<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $fillable = [
        'record_id',
        'patient_name',
        'diagnosis',
        'treatment',
        'doctor',
        'date_of_record',
    ];
}
