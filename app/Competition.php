<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
  protected $table = 'muu_kisa';
  public $timestamps = false;
  protected $dates = ['pvm'];

  protected $fillable = [
   'hevonen_id',
   'laji',
   'pvm',
   'paikka',
   'kutsu_url',
   'luokka',
   'sija',
   'osallistujia',
   'voittosumma'
 ];

 public function horse()
     {
         return $this->belongsTo('App\Horse', 'hevonen_id');
     }
}
