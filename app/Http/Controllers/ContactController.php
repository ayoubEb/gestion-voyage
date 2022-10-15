<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contactez = Contact::all();
        return view('admin.contacts.index')->with('contactez',$contactez);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact');
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
          "prenom"=>['required','not_regex:/^([0-9])+$/'],
          "nom"=>['required','not_regex:/^([0-9])+$/'],
          "email"=>['required'],
          "telephone"=>['required','not_regex:/^([a-z]|[A-Z])+$/'],
          "message"=>['required','not_regex:/^([0-9])+$/'],
          "sujet"=>['required','not_regex:/^([0-9])+$/'],
        ]);
        $contact = new Contact();
        $contact->prenom = $request->prenom;
        $contact->nom = $request->nom;
        $contact->email = $request->email;
        $contact->telephone = $request->telephone;
        $contact->message = $request->message;
        $contact->sujet = $request->sujet;
        if($request->hasFile('fichier'))
        {
          $file = $request->file('fichier');
          $extention = $file->getClientOriginalExtension();
          $filename = time().".".$extention;
          $file->move('fichiers/',$filename);
          $contact->fichier=$filename;
        }
        $contact->save();

        // $contact->fichier = $request->file;
        if($contact){
          toast('Le message bien effecutée pour l\'envoyer','success');
          return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
      return view("admin.contacts.show")->with("contact",$contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        if($contact){
          toast('La suppression du contact effectuée','success');
          return back();
        }

    }

}
