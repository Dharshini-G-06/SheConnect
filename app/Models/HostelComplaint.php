<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostelComplaint extends Model
{

    protected $fillable = [
        'student_id',
        'category',
        'description',
        'status'
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}