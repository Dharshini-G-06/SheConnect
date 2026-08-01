<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthInfo extends Model
{
    protected $fillable = [
        'last_period',
        'cycle_length',
        'water_intake',
        'sleep_hours',
        'height',
        'weight',
        'health_tip',
        'medical_center',
        'doctor_name',
        'contact_number',
        'student_id'
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}