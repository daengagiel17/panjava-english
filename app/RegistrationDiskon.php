<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Registration;
use App\Diskon;

class RegistrationDiskon extends Model
{
    use UserActivities;

    protected $fillable = [
        'diskon_id',
    ];

    public function registration()
    {
        return $this->hasMany(Registration::class);
    }

    public function diskon()
    {
        return $this->belongsTo(Diskon::class);
    }
}
