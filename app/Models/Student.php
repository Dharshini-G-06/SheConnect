<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SosRequest;
class Student extends Model
{
    protected $fillable = [
    'register_no',
    'name',
    'department',
    'year',
    'email',
    'parent_email',
    'parent_phone',
    'phone',
    'address',
    'hostel_status',
    'password',
    'photo',
];
    protected $hidden=[

        'password'

    ];
    public function sosRequests()
{
    return $this->hasMany(SosRequest::class);
}
public function medicalCard()
{
    return $this->hasOne(MedicalCard::class);
}

}