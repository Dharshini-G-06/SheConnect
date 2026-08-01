<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosRequest extends Model
{
    protected $fillable=[
        'student_id',
        'location',
        'message',
        'status'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
