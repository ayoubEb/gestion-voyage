<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $users = User::all();
      $user_count = DB::table('users')->count();
      // $chauffeur_count = DB::table('chauffeurs')->count();
      // $transport_count = DB::table('transports')->count();
      $reservation_count = DB::table('reservations')->count();



      $users = User::select(DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck("count");
      $months = User::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
      $data_user = array(0,0,0,0,0,0,0,0,0,0,0,0);
      foreach($months as $index => $month){
          $data_user[$month-1] = $users[$index];
      }

      // $transports = Transport::select(DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck("count");
      // $months = Transport::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
      // $data_transport = array(0,0,0,0,0,0,0,0,0,0,0,0);
      // foreach($months as $index => $month){
      //     $data_transport[$month-1] = $transports[$index];
      // }

      // $chauffeurs = Chauffeur::select(DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck("count");
      // $months = Chauffeur::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
      // $data_chauffeur = array(0,0,0,0,0,0,0,0,0,0,0,0);
      // foreach($months as $index => $month){
      //     $data_chauffeur[$month-1] = $chauffeurs[$index];
      // }

      $reservations = Reservation::select(DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck("count");
      $months = Reservation::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
      $data_reservation = array(0,0,0,0,0,0,0,0,0,0,0,0);
      foreach($months as $index => $month){
          $data_reservation[$month-1] = $reservations[$index];
      }

      $valid_reservations = Reservation::select(DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->where('valid_reservation','valider')->groupBy(DB::raw("Month(created_at)"))->pluck("count");
      $valid_months = Reservation::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
      $valid_data_reservation = array(0,0,0,0,0,0,0,0,0,0,0,0);
      foreach($valid_months as $index => $month){
          $valid_data_reservation[$month-1] = $valid_reservations[$index];
      }
        return view('admin.index')->with([
          'user_count'=>$user_count,
          'reservation_count'=>$reservation_count,

          'data_user'=>$data_user,

          'data_reservation'=>$data_reservation,
          'valid_data_reservation'=>$valid_data_reservation
        ]);
    }
}
