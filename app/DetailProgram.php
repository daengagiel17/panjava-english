<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Program;

class DetailProgram extends Model
{
    use UserActivities;

    protected $fillable = ['program_id', 'name'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
