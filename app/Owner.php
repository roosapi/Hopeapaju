<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $primaryKey = 'vrl';
    protected $table = 'omistaja';
    public $timestamps = false;

    protected $fillable = [
      'vrl',
      'nimi',
      'url'
    ];
}
