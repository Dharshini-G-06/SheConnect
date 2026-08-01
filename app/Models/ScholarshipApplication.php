<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScholarshipApplication extends Model
{
    protected $fillable=[
'student_id',
'scholarship_id',
'income_certificate',
'community_certificate',
'marksheet',
'status'
];
public function student()
{
    return $this->belongsTo(Student::class);
}

public function scholarship()
{
    return $this->belongsTo(Scholarship::class);
}
}
