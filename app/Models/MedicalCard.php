<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalCard extends Model
{
    protected $fillable = [
        'student_id',
        'blood_group',
        'allergies',
        'medical_conditions',
        'emergency_contact'
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}