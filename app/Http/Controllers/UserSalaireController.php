<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSalaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class UserSalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      $userSalaires = UserSalaire::all();
        return view("admin.utilisateurs.user-salaire")->with([
          "users"=>$users,
          "userSalaires"=>$userSalaires
        ]);
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
      $request->validate([
        "user_id"=>["required"],
        "salaire"=>["required","regex:/^[0-9]+$/"],
        "jour"=>["required"],
        "mois"=>["required"],
        "annee"=>["required"],
        "etat"=>["required"],
      ]);
        $sal = UserSalaire::create([
          "user_id"=>$request->user_id,
          "salaire"=>$request->salaire,
          "jour"=>$request->jour,
          "mois"=>$request->mois,
          "annee"=>$request->annee,
          "etat"=>$request->etat,
        ]);
        if($sal){
          toast("L'enregistrement du salaire d'utilisateur effectuée","success");
          return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSalaire  $userSalaire
     * @return \Illuminate\Http\Response
     */
    public function show(UserSalaire $userSalaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSalaire  $userSalaire
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSalaire $userSalaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSalaire  $userSalaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSalaire $userSalaire)
    {
      $request->validate([
        "user_id"=>["required"],
        "salaire"=>["required","regex:/^[0-9]+$/"],
        "jour"=>["required"],
        "mois"=>["required"],
        "annee"=>["required"],
        "etat"=>["required"],
      ]);
      $sal = $userSalaire->update([
        "user_id"=>$request->user_id,
        "salaire"=>$request->salaire,
        "jour"=>$request->jour,
        "mois"=>$request->mois,
        "annee"=>$request->annee,
        "etat"=>$request->etat,
      ]);
      if($sal){
        toast("La notification du salaire d'utilisateur effectuée","success");
        return back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSalaire  $userSalaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSalaire $userSalaire)
    {
      $sal=$userSalaire->delete();
      if($sal){
        toast("La notification du salaire d'utilisateur effectuée","success");
        return back();
      }
    }
    public function getRecu(UserSalaire $userSalaire){
      $pdf = PDF::loadView('admin.utilisateurs.recu', compact('userSalaire'))->setOptions(['defaultFont' => 'sans-serif']);
      return $pdf->stream();
    }

    public function user_salaires(){
      $salaire_annee = DB::table('users')->join("user_salaires","users.id","=","user_salaires.user_id")
      ->groupBy('annee')
      ->groupBy('user_id')
      ->get();
      return view("admin.utilisateurs.salaire-ft")->with("salaire_annee",$salaire_annee);

    }



    public function user_pdfAnnee($id,$annee){
      $user = User::where('id',$id)->first();
      $getAnnee = DB::table('users')->join("user_salaires","users.id","=","user_salaires.user_id")
      ->groupBy('annee')
      ->groupBy('user_id')
      ->having('annee',$annee)
      ->get();
      $sum = DB::table("user_salaires")
      ->groupBy("annee")
      ->groupBy("user_id")
      ->where("annee",$annee)
      ->where("user_id",$id)
      ->sum('salaire');

      foreach($getAnnee as $r => $row) {
        $row->items =  DB::table('user_salaires')
                      ->where('annee', $row->annee)
                      ->get();
      }
      $pdf = PDF::loadView('admin.utilisateurs.salaire-pdf', compact('getAnnee',"user",'sum'))->setOptions(['defaultFont' => 'sans-serif']);
      return $pdf->stream();
    }
}
