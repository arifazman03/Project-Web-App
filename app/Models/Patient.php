<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'patien _name',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone_number',
        'email',
        'address',
    ];

    // Mutator to concatenate first_name and last_name into patient_name
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = $value;
        $this->attributes['patient_name'] = $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = $value;
        $this->attributes['patient_name'] = $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

}
