<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Horse;

class HorseController extends Controller
{

  public function __construct() {
    $this->middleware('auth', ['except' => 'show']);
  }

    public function show($name) {
      $namewithoe = str_replace('o', 'ö', $name);
      $namewithae = str_replace('a', 'ä', $name);
      $namewithboth = str_replace('a', 'ä', $namewithoe);
      $horse = Horse::where('lempinimi', $name)
                ->orWhere('lempinimi', $namewithoe)
                ->orWhere('lempinimi', $namewithae)
                ->orWhere('lempinimi', $namewithboth)
                ->get()->first();
      $age = array('dob' => $horse->syntaika->format('d.m.Y'), 'age' => $horse->age());
      $pedigree = $horse->pedigree('');
      $pedlength = $horse->pedlength;
      $pedstuff = array('length' => $pedlength, 'pedigree' => $pedigree);
      $points = $horse->competitionInfo();
      $merits = $horse->merits;
      $offspring = $horse->offspring();
      $images = $horse->images;
      $competitions = $horse->competitions;

      //return $offspring;
      return view('horse.show', compact('horse', 'age', 'pedstuff', 'points', 'merits', 'offspring', 'images', 'competitions'));
    }


    public function create() {
      return view('horse.create');
    }

    public function store() {
      $input = Request::all();
      Horse::create($input);
      return redirect('hevoset/'.$input['lempinimi']);
    }

    public function edit($id) {
      $horse = Horse::findOrFail($id);

      return view('horse.edit', compact('horse'));
    }

    public function update($id, Request $request) {
      $horse = Horse::findOrFail($id);
      $horse->update(Request::all());

      return redirect('hevoset/'.$id.'/edit');
    }
}
