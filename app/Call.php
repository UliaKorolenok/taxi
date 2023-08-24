<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'phone', 'processed', 'dateProcessing'
    ];
}
