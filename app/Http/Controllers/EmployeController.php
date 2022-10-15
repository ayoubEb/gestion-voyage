<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Employe;
use App\Models\EmployeSalaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

use PDF;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
      $getAnnee = DB::table('employe_salaires')
      // where('employe_id',)
      ->groupBy('annee')
      ->groupBy('employe_id')
      ->get();

      foreach($getAnnee as $r => $row) {
        $row->items =  DB::table('employe_salaires')
                      ->where([['annee', $row->annee], ['employe_id', $row->employe_id]])
                      ->get();
      }


      // ->select('*', DB::raw('sum(*) as total'));
      $employes = Employe::all();
      // $chauffeurs = Employe::where('type',"chauffeur")->get();
      // $chauffeurs = Employe::where('type',"pilote")->get();
      // $chauffeurs = Employe::where('type',"capitine")->get();

      $count_employe = Employe::count();
        return view("admin.employes.index")->with([
          "employes"=>$employes,
          "getAnnee"=>$getAnnee,
          "count_employe"=>$count_employe
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.employes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          'email'=>['required'],
          'cnie'=>['required'],
          'travail'=>['required'],
          'poste'=>['required'],
          'genre'=>['required'],
          'telephone'=>['required','not_regex:/^([a-z]+)|([A-Z]+)|([A-Za-z]+)|([a-zA-Z]+)$/'],
          'adresse'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          'ville'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          'nationalite'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          'pays'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
        ]);
        if($request->hasFile("cv")){
          $file = $request->file('cv');
          $extention = $file->getClientOriginalExtension();
          $filename = time().".".$extention;
          $file->move('fichiers/cv/',$filename);
        }
        $employe = Employe::create([
          "cnie"=>Str::upper($request->cnie),
          "name"=>Str::upper($request->name),
          "adresse"=>$request->adresse,
          "ville"=>$request->ville,
          "pays"=>$request->pays,
          "nationalite"=>$request->nationalite,
          "email"=>$request->email,
          "telephone"=>$request->telephone,
          // "cv"=>$filename,
          "travail"=>$request->travail,
          "poste"=>$request->poste,
          "genre"=>$request->genre,
        ]);

        if($employe){
          Alert::success("L'enregistrement' d'employé effectuée");
          return redirect()->route('employe.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        return view("admin.employes.show")->with('employe',$employe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        return view("admin.employes.edit")->with("employe",$employe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
      if(empty($request->name) and empty($request->email) and empty($request->cnie) and empty($request->travail) and empty($request->poste) and empty($request->genre) and empty($request->telephone) and empty($request->adresse) and empty($request->ville) and empty($request->nationalite) and empty($request->pays)){
        Session()->flash("remplir","Attention : vous avez oublié un champ ou plusieurs champs");
        return back();
      }
      else{

        $request->validate([
          'name'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          'email'=>['required'],
          'cnie'=>['required'],
          'travail'=>['required'],
          'poste'=>['required'],
          'genre'=>['required'],
          'telephone'=>['required','not_regex:/^([a-z]+)|([A-Z]+)|([A-Za-z]+)|([a-zA-Z]+)$/'],
          'adresse'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          'ville'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          'nationalite'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
          'pays'=>['required','not_regex:/^([a-z]+[0-9]+)|([A-Z]+[0-9]+)|([0-9]+)|([0-9]+[a-z]+)|([0-9]+[A-Z]+)$/'],
        ]);
        if($request->hasFile("cv")){
          $file = $request->file('cv');
          $extention = $file->getClientOriginalExtension();
          $filename = time().".".$extention;
          $file->move('fichiers/cv/',$filename);
        }
        $emp = $employe->update([
          "cnie"=>Str::upper($request->cnie),
          "name"=>Str::upper($request->name),
          "adresse"=>$request->adresse,
          "ville"=>$request->ville,
          "pays"=>$request->pays,
          "nationalite"=>$request->nationalite,
          "email"=>$request->email,
          "telephone"=>$request->telephone,
          // "cv"=>$filename,
          "travail"=>$request->travail,
          "poste"=>$request->poste,
          "genre"=>$request->genre,
        ]);
        if($emp){
          Session()->flash("update","La notification d'emloye ".$employe->name." effectuée ");
          return back();
        }
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
      $employe->delete();
        if($employe){
        Alert::warning("La suppression d'employé effectuée");
        return redirect()->route('employe.index');
      }
    }

    public function employe_pdfAnnee($id,$annee){
      $emp = Employe::where('id',$id)->first();
      $getAnnee = DB::table('employes')->join("employe_salaires","employes.id","=","employe_salaires.employe_id")
      ->groupBy('annee')
      ->groupBy('employe_id')
      ->having('annee',$annee)
      ->get();
      $sum = DB::table("employe_salaires")
      ->groupBy("annee")
      ->groupBy("employe_id")
      ->where("annee",$annee)
      ->where("employe_id",$id)
      ->sum('salaire');

      foreach($getAnnee as $r => $row) {
        $row->items =  DB::table('employe_salaires')
                      ->where('annee', $row->annee)
                      ->get();
      }
      $pdf = PDF::loadView('admin.employes.annee-pdf', compact('getAnnee',"emp",'sum'))->setOptions(['defaultFont' => 'sans-serif']);
      return $pdf->stream();
    }


    public function carteTravail(Employe $employe){
      $agence = Agence::all();
      $pdf = PDF::loadView('admin.employes.carte-travail', compact('employe',"agence"))->setOptions(['defaultFont' => 'sans-serif']);
      $customPaper = array(0,0,360,200);
    $pdf->set_paper($customPaper);
      return $pdf->stream();

    }

    public function interieur(){
      $interieurs = Employe::where('travail','intérieur')->get();
      $getAnnee = DB::table('employe_salaires')
      // where('employe_id',)
      ->groupBy('annee')
      ->groupBy('employe_id')
      ->get();

      foreach($getAnnee as $r => $row) {
        $row->items =  DB::table('employe_salaires')
                      ->where([['annee', $row->annee], ['employe_id', $row->employe_id]])
                      ->get();
      }

      return view("admin.employes.interieur")->with([
        'interieurs'=>$interieurs,
        'getAnnee'=>$getAnnee
      ]);
    }

    public function exterieur(){
      $exterieurs = Employe::where('travail','extérieur')->get();
      $getAnnee = DB::table('employe_salaires')
      // where('employe_id',)
      ->groupBy('annee')
      ->groupBy('employe_id')
      ->get();

      foreach($getAnnee as $r => $row) {
        $row->items =  DB::table('employe_salaires')
                      ->where([['annee', $row->annee], ['employe_id', $row->employe_id]])
                      ->get();
      }

      return view("admin.employes.exterieur")->with([
        'exterieurs'=>$exterieurs,
        'getAnnee'=>$getAnnee
      ]);
    }

    public function vehicule(){
      $vehicules = Employe::where('travail','véhicule')->get();
      $getAnnee = DB::table('employe_salaires')
      // where('employe_id',)
      ->groupBy('annee')
      ->groupBy('employe_id')
      ->get();

      foreach($getAnnee as $r => $row) {
        $row->items =  DB::table('employe_salaires')
                      ->where([['annee', $row->annee], ['employe_id', $row->employe_id]])
                      ->get();
      }
      return view("admin.employes.vehicule")->with([
        'vehicules'=>$vehicules,
        'getAnnee'=>$getAnnee
      ]);
    }
}
