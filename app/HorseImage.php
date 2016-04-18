<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorseImage extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'hevonen_kuva';
  public $timestamps = false;

  protected $fillable = [
    'hevonen',
    'thumb',
    'kuva_url',
    'kuvaaja',
    'kuvaaja_url',
    'lisatiedot'
  ];
}
