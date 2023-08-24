<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','phone', 'email', 'review','mark',
    ];
}
