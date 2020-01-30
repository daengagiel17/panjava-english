<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Registration;
use App\DetailProgram;
use App\Diskon;
use App\Jadwal;

class Program extends Model
{
    use UserActivities;

    protected $fillable = [
        'name', 'description', 'objective', 'price', 'price_k',
        'seat', 'category', 'status', 'durasi'
    ];

    public function registrasi()
    {
        return $this->hasOne(Registration::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function detailProgram()
    {
        return $this->hasMany(DetailProgram::class);
    }

    public function diskon()
    {
        return $this->hasMany(Diskon::class);
    }
}
