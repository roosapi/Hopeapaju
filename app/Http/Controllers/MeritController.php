<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Merit;

class MeritController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }


    public function create($horseid) {
      return view('merit.create', compact('horseid'));
    }

    public function store() {
      $input = Request::all();
      $merit = Merit::create($input);
      return redirect('hallinta');
    }

}
