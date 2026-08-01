<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
'title',
'provider',
'amount',
'eligibility',
'last_date',
'description'
];
public function applications()
{
    return $this->hasMany(
        ScholarshipApplication::class
    );
}
}

