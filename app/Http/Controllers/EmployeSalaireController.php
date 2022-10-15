<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\EmployeSalaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;

class EmployeSalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $employeSalaires = EmployeSalaire::all();
      $employes = Employe::all();
      return view("admin.employes.emp-salaire")->with(["employeSalaires"=>$employeSalaires,"employes"=>$employes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(empty($request->employe_id) and empty($request->mois) and empty($request->jour) and empty($request->annee) and empty($request->annee) and empty($request->salaire) and empty($request->etat)){
        Session()->flash('remplir',"Attention : vous avez remplir en tous les champs");
        $request->validate([
          "employe_id"=>["required"],
          "mois"=>["required"],
          "jour"=>["required"],
          "annee"=>["required","regex:/^[0-9]{4}$/"],
          "salaire"=>["required","regex:/^([0-9](.[0-9])?)+$/"],
          "etat"=>["required"],
        ]);
        return back();
      }
      else{

        $request->validate([
          "employe_id"=>["required"],
          "mois"=>["required"],
          "jour"=>["required"],
          "annee"=>["required","regex:/^[0-9]{4}$/"],
          "salaire"=>["required","regex:/^([0-9](.[0-9])?)+$/"],
          "etat"=>["required"],
        ]);
        EmployeSalaire::create([
          "employe_id"=>$request->employe_id,
          "salaire"=>$request->salaire,
          "jour"=>$request->jour,
          "mois"=>$request->mois,
          "annee"=>$request->annee,
          "etat"=>$request->etat,
        ]);
        toast("L'enregistrement de salaire effectuée","success");
        return back();
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeSalaire  $employeSalaire
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeSalaire $employeSalaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeSalaire  $employeSalaire
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeSalaire $employeSalaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeSalaire  $employeSalaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeSalaire $employeSalaire)
    {
      if(empty($request->employe_id_u) or empty($request->mois_u) or empty($request->jour_u) or empty($request->annee_u) or empty($request->annee_u) or empty($request->salaire_u) or empty($request->etat_u)){
        Session()->flash("remplir","Attention : vous avez oublié un champ ou plusieurs champs");
        $request->validate([
          "employe_id_u"=>["required"],
          "mois_u"=>["required"],
          "jour_u"=>["required"],
          "annee_u"=>["required","regex:/^[0-9]{4}$/"],
          "salaire_u"=>["required","regex:/^([0-9](.[0-9])?)+$/"],
          "etat_u"=>["required"],
        ]);
        return back();
      }
      else{
        $request->validate([
          "employe_id_u"=>["required"],
          "mois_u"=>["required"],
          "jour_u"=>["required"],
          "annee_u"=>["required","regex:/^[0-9]{4}$/"],
          "salaire_u"=>["required","regex:/^([0-9](.[0-9])?)+$/"],
          "etat_u"=>["required"],
        ]);
        $employeSalaire->update([
          "employe_id"=>$request->employe_id_u,
          "salaire"=>$request->salaire_u,
          "jour"=>$request->jour_u,
          "mois"=>$request->mois_u,
          "annee"=>$request->annee_u,
          "etat"=>$request->etat_u,
        ]);
        Session()->flash("update","La notification de salaire ".$employeSalaire->jour."/".$employeSalaire->mois."/".$employeSalaire->annee." effectuée");
        return back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeSalaire  $employeSalaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeSalaire $employeSalaire)
    {
        $employeSalaire->delete();
        return back();
    }
    public function getRecu(EmployeSalaire $employeSalaire){
      $pdf = PDF::loadView('admin.employes.recu', compact('employeSalaire'))->setOptions(['defaultFont' => 'sans-serif']);
      return $pdf->stream();
    }


    public function employe_salaires(){

      $salaire_annee = DB::table('employes')->join("employe_salaires","employes.id","=","employe_salaires.employe_id")
      ->groupBy('annee')
      ->groupBy('employe_id')
      ->get();
      return view("admin.employes.salaire-ft")->with("salaire_annee",$salaire_annee);

    }

    public function employe_pdfAnnee($id,$annee){
      $employes = Employe::where('id',$id)->first();
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
      $pdf = PDF::loadView('admin.employes.salaire-pdf', compact('getAnnee',"employe",'sum'))->setOptions(['defaultFont' => 'sans-serif']);
      return $pdf->stream();
    }


}
