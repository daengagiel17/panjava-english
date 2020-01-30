<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Program;
use App\RegistrationDiskon;

class Registration extends Model
{
    use UserActivities;

    protected $fillable = [
        'name', 'no_hp', 'email', 'program_id', 'status', 'registration_diskon_id'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function registrationDiskon()
    {
        return $this->belongsTo(RegistrationDiskon::class);
    }
}
