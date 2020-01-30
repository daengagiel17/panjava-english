<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Program;

class Jadwal extends Model
{
    use UserActivities;

    protected $fillable = [
        'program_id', 'hari', 'kelas', 'waktu',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}