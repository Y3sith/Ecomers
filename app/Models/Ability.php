<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $table = 'ability';

    protected $fillable = [
        'name',
        'description',
        'creation_date',
        'id_user'
    ];

    public $timestamps = false;
}
