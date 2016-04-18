<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use App\Horse;
use App\Owner;

class HorselistController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['only' => 'showAll']);
  }

  public function kasvatit() {
    $horses = Horse::where('kasvattaja', 'Hopeapajun Kartano')
                      ->orderBy('syntaika', 'desc')
                      ->get();
    $nowIs = date('Y');
    $new_hann = array();
    $new_hol = array();
    $new_sh = array();
    $old_hann = array();
    $old_hol = array();
    $old_other = array();

    foreach ($horses->toArray() as $horse) {
      $sire = Horse::find($horse['isa']);
      $dam = Horse::find($horse['ema']);
      $horse['syntaika'] = date('d.m.Y', strtotime($horse['syntaika']));
      $horse['isa'] = $sire['nimi'];
      $horse['isa_o'] = $sire['osoite'];
      $horse['ema'] = $dam['nimi'];
      $horse['ema_o'] = $dam['osoite'];
      $horse['omistaja_o'] = Owner::find($horse['omistaja'])->osoite;
      $horse['lempinimi'] = strtolower(str_replace('ä', 'a', str_replace('ö', 'o', $horse['lempinimi'])));

      $now = date('Y');
      $breed = $horse['rotu'];

      if (date('Y', strtotime($horse['syntaika'])) < $now) {
        if ($breed == 'hannover') {
          $old_hann[] = $horse;
        } else if ($breed == 'holstein') {
          $old_hol[] = $horse;
        } else {
          $old_other[] = $horse;
        }
      } else {
        if ($breed == 'hannover') {
          $new_hann[] = $horse;
        } else if ($breed == 'holstein') {
          $new_hol[] = $horse;
        } else {
          $new_sh[] = $horse;
        }
      }
    }

    return view('pages.kasvatus', compact('new_hann', 'new_hol', 'new_sh', 'old_hann', 'old_hol', 'old_other'));
  }

  public function pv() {

    $horses = DB::table('hevonen')/*Horse::where('talli', 'hopeapaju')*/
                      ->where('talli', 'hopeapaju')
                      ->where('status', 'ok')
                      ->select('nimi', 'lempinimi', 'rotu', 'skp', 'isa', 'ema', 'suku')
                      ->orderBy('suku')
                      ->get();

    $hol_o = array();
    $hol_t = array();
    $hann_o = array();
    $hann_t = array();

    foreach ($horses as $horse) {
      $horse = (array) $horse;
      $sire = Horse::find($horse['isa']);
      $dam = Horse::find($horse['ema']);
      $horse['isa'] = $sire['nimi'];
      $horse['ema'] = $dam['nimi'];
      $horse['lempinimi'] = strtolower(str_replace('ä', 'a', str_replace('ö', 'o', $horse['lempinimi'])));
      if ($horse['rotu'] === 'hannover') {
        if ($horse['skp'] == 'ori') {
          $hann_o[] = $horse;
        } else if ($horse['skp'] == 'tamma') {
          $hann_t[] = $horse;
        }
      } else if ($horse['rotu'] === 'holstein') {
        if ($horse['skp'] == 'ori') {
          $hol_o[] = $horse;
        } else if ($horse['skp'] == 'tamma') {
          $hol_t[] = $horse;
        }
      }
    }

    return view('pages.puoliveriset', compact('hann_o', 'hann_t', 'hol_o', 'hol_t'));
  }

  public function showAll() {

    $horses = DB::table('hevonen')/*Horse::where('talli', 'hopeapaju')*/
                      ->select('id', 'nimi', 'osoite', 'lempinimi', 'rotu',
                      'skp', 'isa', 'ema', 'suku', 'evm', 'talli')
                      ->orderBy('rotu', 'suku', 'skp')
                      ->get();

    $hann = array();
    $hols = array();
    $sh = array();
    $others = array();
    $evm = array();

    foreach ($horses as $horse) {
      $horse = (array) $horse;
      $sire = Horse::find($horse['isa']);
      $dam = Horse::find($horse['ema']);
      $horse['isa'] = $sire['nimi'];
      $horse['ema'] = $dam['nimi'];
      $horse['lempinimi'] = strtolower(str_replace('ä', 'a', str_replace('ö', 'o', $horse['lempinimi'])));
      if ($horse['evm']) {
        $evm[] = $horse;
      } else if ($horse['talli'] !== 'hopeapaju') {
        $others[] = $horse;
      } else if ($horse['rotu'] === 'hannover') {
        $hann[] = $horse;
      } else if ($horse['rotu'] === 'holstein') {
        $hols[] = $horse;
      } else if ($horse['rotu'] === 'suomenhevonen') {
        $sh = $horse;
      }
    }

    return view('pages.hallinta', compact('hann', 'hols', 'sh', 'others', 'evm'));
  }
}
