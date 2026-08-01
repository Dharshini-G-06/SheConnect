<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorPass extends Model
{
    protected $fillable=[
        'student_id',
        'visitor_name',
        'relation',
        'mobile',
        'visit_date',
        'in_time',
        'out_time',
        'reason',
        'status'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
