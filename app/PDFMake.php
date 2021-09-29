<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PDFMake extends Model
{
    //
    public $table = 'people';
    protected $fillable = [
        'name',
        'email',
        'mobileno'
    ];
}
