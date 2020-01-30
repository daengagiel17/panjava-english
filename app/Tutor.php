<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use UserActivities;

    protected $fillable = [
        'name', 'photo', 'job', 'description', 'facebook', 'twitter', 'instagram'
    ];

}