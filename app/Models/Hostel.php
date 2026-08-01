<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $fillable = [
        'hostel_name',
        'block',
        'warden_name',
        'warden_phone'
    ];


    public function rooms()
    {
        return $this->hasMany(HostelRoom::class);
    }
}