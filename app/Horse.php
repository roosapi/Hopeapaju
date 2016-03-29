<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Horse extends Model
{
   protected $table = 'hevonen';
   protected $appends = array('pedlength');
   public $timestamps = false;
   protected $dates = ['syntaika'];

   protected $fillable = [
		'nimi',
		'osoite',
		'lempinimi',
		'vh_tunnus',
		'rotu',
		'skp',
		'syntaika',
		'vari',
		'saka',
		'omistaja',
		'kasvattaja',
		'kasvattaja_url',
		'painotus',
    'koulutustaso', //koulu.este.kenttä -> Helppo A.100.Harrasteluokka
		'nayttelyt', //boolean
		'luonne',
		'isa',
		'ema',
    'suku',
		'evm', //boolean
		'status', //ok tai kuollut
		'talli'
  ];
/*
  public function setNimiAttribute($value)
   {
     $this->attributes['slug'] = Str::slug($value);
   }*/
/*
   public function getSyntaikaAttribute($date)
    {
        $date = new \Carbon\Carbon($date);
        return $date->format('Y-m-d');
    }*/
  public function mod_name() {
    return str_replace('a', 'ä', str_replace('o', 'ö', $this->lempinimi));
  }

  public function merits() {
    return $this->hasMany('App\Merit', 'hevonen_id');
  }

  public function images() {
    return $this->hasMany('App\HorseImage', 'hevonen');
  }

  public function offspring() {
    $all = Horse::where('ema', $this->id)->orWhere('isa', $this->id)->orderBy('syntaika')->get()->toArray();
    if ($this->skp == 'tamma') {
      return array_map(function ($foal) {
        $foal['isa'] = Horse::find($foal['isa']);
        return $foal;
      }, $all);
    } else {
      return array_map(function ($foal) {
        $foal['ema'] = Horse::find($foal['ema']);
        return $foal;
      }, $all);
    }
  }

  public function age() {
    $dob = $this->syntaika;
    $today = new DateTime(date('Y-m-d'));

    $interval = $today->diff($dob);
    $diff = $interval->m + 12*$interval->y;

  //  return $diff;

    if ($diff > 8) return 15;
    else return $diff;
  }

  public function pedigree($prefix)
  {

    $damPed = array();
    $sirePed = array();

    if(!($this->isa == 0)) {
      $sire = Horse::find($this->isa);
      $sireP = $sire->pedigree($prefix . 'i'); //get sire's pediree
      //get sire's merits
      $s_merits = $sire->merits()->select('saavutus')->get()->toArray();
      $s_merits = array_map(function ($merit) { return $merit['saavutus']; }, $s_merits);
      $s_merits = implode(', ', $s_merits);
      //get sire's information
      $sireA = array($prefix . 'i' => array('nimi' => $sire->nimi, 'osoite' => $sire->osoite,
        'rotu' => $sire->rotu, 'skp' => $sire->skp, 'vari' => $sire->vari,
        'saka' => $sire->saka ? $sire->saka : '-', 'evm' => $sire->evm, 'saav' => $s_merits));

      $sirePed = array_merge($sireA, $sireP);
    }

    if(!($this->ema == 0)) {
      $dam = Horse::find($this->ema);
      $damP = $dam->pedigree($prefix . 'e');
      //get dam's merits
      $d_merits = $dam->merits()->select('saavutus')->get()->toArray();
      $d_merits = array_map(function ($merit) { return $merit['saavutus']; }, $d_merits);
      $d_merits = implode(', ', $d_merits);
      $damA = array($prefix . 'e' => array('nimi' => $dam->nimi, 'osoite' => $dam->osoite,
        'rotu' => $dam->rotu, 'skp' => $dam->skp, 'vari' => $dam->vari,
        'saka' => $dam->saka ? $dam->saka : '-', 'evm' => $dam->evm, 'saav' => $d_merits));
      $damPed = array_merge($damA, $damP);
    }

    return array_merge($sirePed, $damPed);
  }

  public function getPedlengthAttribute($value)
   {
     $pedigree = $this->pedigree('');
     $nonEvms = count(array_filter($pedigree, function($horse) {
       return !$horse['evm'];
     }));

     $length = 0;
     if($nonEvms > 0) {
       $length = round(log(($nonEvms / 2 + 1), 2));

       /*if($length > 5) {
         $length = 'pitkäsukuinen';
       } else {
         $length = $length . '-polvinen suku';
       }*/
     }

     return $length;
   }

   //Get current level in one discipline
   public function competitionLevel($discipline, $level, $maxlevel) {
     $krj = ['Helppo D' => [0],
						 'Helppo C' => [0, 1],
						 'KN Special' => [0, 1],
						 'Helppo B' => [0, 1],
						 'Helppo A' => [0, 2, 4],
						 'Vaativa B' => [3, 5],
						 'Vaativa A' => [6],
						 'Prix St. Georges' => [7],
						 'Intermediate I' => [8],
						 'Intermediate II' => [9],
						 'Grand Prix' => [10],
						 ];
			$erj = ['40cm' => [0],
							'60cm' => [0],
							'80cm' => [0, 1],
							'90cm' => [0, 1],
							'100cm' => [0, 1, 4],
							'110cm' => [2, 5],
							'120cm' => [3, 6],
							'130cm' => [4, 7],
							'140cm' => [5, 8],
							'150cm' => [9],
							'160cm' => [10]
							];
			$kerj = ['Aloittelijaluokka' => [0, 1],
							 'Harrasteluokka' => [0, 1],
							 'Tutustumisluokka' => [0, 1],
							 'Helppo' => [2],
							 'CIC1' => [3, 4],
							 'CIC2' => [5],
							 'CIC3' => [6],
							 'CIC4' => [7]
							 ];

      $maxlevel_name;

      $all_levels = explode(".", $this->koulutustaso);
      if ($discipline == 'krj') {
        $discipline = $krj;
        $maxlevel_name = $all_levels[0];
      } else if ($discipline == 'erj') {
        $discipline = $erj;
        $maxlevel_name = $all_levels[1];
      } else if ($discipline == 'kerj') {
        $discipline = $kerj;
        $maxlevel_name = $all_levels[2];
      }

      if ($level == -1) {
        return 'Ei kilpaillut porrastetuissa';
      } else if ($level >= $maxlevel) {
        return $maxlevel_name;
      } else {
        $current_max;
        foreach($discipline as $name => $levels) {
          if(in_array($level, $levels)) {
            $current_max = $name;
          }
        }
        return $current_max;
      }
   }


   //Competition information from vrl
   public function competitionInfo() {
     if ($this->painotus !== '') {
       $json = file_get_contents('http://www.virtuaalihevoset.net/?rajapinta/ominaisuudet.html?vh=' . $this->vh_tunnus);
       $obj = json_decode($json, true);
       $disciplines = array('koulu' => 'krj', 'este' => 'erj', 'kenttä' => 'kerj');
       $level = $obj[$disciplines[$this->painotus]]['level'];
       $maxlevel = 0;
       if ($level >= 0) {
         $maxlevel = $obj[$disciplines[$this->painotus]]['level_max'];
       }
       $points = array('level' => $level,
                       'maxlevel' => $maxlevel, //EI toimi jos syntymäpäiviä ei nääritetty
                       'total' => $obj[$disciplines[$this->painotus]]['points'],
                       'h_r' => $obj['points']['hyppykapasiteetti_rohkeus'],
                       'n_k' =>  $obj['points']['nopeus_kestavyys'],
                       'k_l' => $obj['points']['kuuliaisuus_luonne'],
                       't_i' => $obj['points']['tahti_irtonaisuus'],
                       't_k' => $obj['points']['tarkkuus_ketteryys']);
      $points['levelname'] = $this->competitionLevel($disciplines[$this->painotus], $points['level'], $points['maxlevel']);
      return $points;
    }
    return [];
   }


}
