<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merit extends Model
{
  protected $table = 'meriitit';
  public $timestamps = false;
  protected $dates = ['pvm'];
  
  protected $fillable = [
   'hevonen_id',
   'saavutus',
   'tilaisuus',
   'pvm',
   'url',
   'info'
 ];

 public function horse()
     {
         return $this->belongsTo('App\Horse', 'hevonen_id');
     }
}
