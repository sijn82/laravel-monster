<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'description',
        'aggression_level',
        'monster_image_name',
        'flagged_at'
    ];


}
