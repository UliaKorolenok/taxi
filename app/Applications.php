<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'name','phone', 'date', 'time','appFrom','appTo','appRate','count','child','animals','notes','processed','dateProcessing'
    ];
}
