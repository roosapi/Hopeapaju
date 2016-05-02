<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Text;

class TextController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }


    public function create($horseid) {
      return view('text.create', compact('horseid'));
    }

    public function store() {
      $input = Request::all();
      $text = Text::create($input);
      return redirect('hallinta');
    }

}
