<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Program;
use App\RegistrationDiskon;

class Diskon extends Model
{
    use UserActivities;

    protected $fillable = [
        'program_id', 'banyak', 'batas', 'price', 'price_k', 
        'tanggal_awal', 'tanggal_akhir', 'status'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function registrationDiskon()
    {
        return $this->hasMany(RegistrationDiskon::class);
    }
}