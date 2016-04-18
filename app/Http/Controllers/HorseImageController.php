<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\HorseImage;

class HorseImageController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }


    public function create($id) {
      return view('horseimage.create', compact('id'));
    }

    public function store() {
      $input = Request::all();
      $img = HorseImage::create($input);
      return redirect('hevoset/'.$input['hevonen'].'/'.'img/'.$img->id.'/edit');
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
