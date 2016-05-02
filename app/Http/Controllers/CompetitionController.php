<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Competition;
use App\Horse;

class CompetitionController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }


    public function create($horseid) {
      return view('competition.create', compact('horseid'));
    }

    public function store($id) {
      $input = Request::all();
      $discipline = $input['laji'];
      $bulk = $input['kisat'];
      $list = explode('<br />', $bulk);
      $horse = Horse::find($id);

      foreach($list as $entry) {
        $things = explode('|', $entry);
        $things2 = explode('-', $entry);

        if (sizeof($things) > sizeof($things2)) {
          // Handle the url part
          $url = str_replace('<a href="', '', $things[0]);
          $url = str_replace('">Kutsu</a>', '', $url);
          $url = trim($url);

          //date
          $date = strtotime(str_replace('.', '-', trim($things[1])));
          //class
          $class = trim($things[2]);
          //placement
          $placement = trim(strip_tags($things[3]));
          $participants = explode('/', $placement)[1];
          $participants = preg_replace('/(\d+) (.*)/', '$1', $participants);
          $placement = explode('/', $placement)[0];

          Competition::create(['hevonen_id' => $id,
            'laji' => $discipline,
            'pvm' => $date,
            //'paikka',
            'kutsu_url' => $url,
            'luokka' => $class,
            'sija' => $placement,
            'osallistujia' => $participants
          ]);
        } else if (sizeof($things) < sizeof($things2)) {

          //date
          $date = strtotime(str_replace('.', '-', trim($things2[1])));
          //place
          $place = trim($things2[2]);
          //class
          $class = trim($things2[3]);
          //placement
          $placement = trim(strip_tags($things2[4]));
          $participants = explode('/', $placement)[1];
          $participants = preg_replace('/(\d+) (.*)/', '$1', $participants);
          $placement = explode('/', $placement)[0];

          Competition::create(['hevonen_id' => $id,
            'laji' => $discipline,
            'pvm' => $date,
            'paikka' => $place,
            'luokka' => $class,
            'sija' => $placement,
            'osallistujia' => $participants
          ]);
        }



      }

      return redirect('hevoset/'.strtolower(str_replace('ä', 'a', str_replace('ö', 'o', $horse['lempinimi']))));
    }

    public function edit($id, $imgid) {
      $img = HorseImage::findOrFail($imgid);

      return view('horseimage.edit', compact('id', 'img'));
    }

    public function update($imgid, Request $request) {
      $img = HorseImage::findOrFail($img);
      $img->update(Request::all());

      return redirect('hevoset/'.$img['hevonen'].'/'.'img/'.$img['id'].'/edit');
    }
}
