<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    public function index(){
      $chauffeurs = Employe::where('type','chauffeur')->get();
      return view('admin.chauffeurs.index')->with('chauffeurs',$chauffeurs);
    }
}
