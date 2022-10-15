<?php

namespace App\Http\Controllers;

use App\Models\HotelAttribut;
use Illuminate\Http\Request;

class HotelAttributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $hot_att = HotelAttribut::create([
          "hotel_id"=>$request->hotel_id,
          "attribut_value_id"=>$request->value,
          "prix"=>$request->prix,
        ]);

        if($hot_att){
          toast("L'enregistrement d'attribut d'hôtel effectuée","success");
          return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HotelAttribut  $hotelAttribut
     * @return \Illuminate\Http\Response
     */
    public function show(HotelAttribut $hotelAttribut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelAttribut  $hotelAttribut
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelAttribut $hotelAttribut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelAttribut  $hotelAttribut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelAttribut $hotelAttribut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelAttribut  $hotelAttribut
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelAttribut $hotelAttribut)
    {
        //
    }
}
