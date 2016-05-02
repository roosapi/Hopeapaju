<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
  protected $table = 'hevonen_tekstit';
  public $timestamps = false;
  protected $dates = ['pvm'];

  protected $fillable = [
   'hevonen_id',
   'pvm',
   'otsikko',
   'teksti',
   'kirjoittaja'
 ];

 public function horse()
     {
         return $this->belongsTo('App\Horse', 'hevonen_id');
     }
}
