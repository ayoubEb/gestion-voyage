@extends('layouts.front')

@section('content')
@include('sweetalert::alert')
<div id="desc-top">
  <h1 @class(["text-center","text-white","animate__animated","animate__fadeInLeft"])>Contactez - Nous</h1>
  <ul @class(['d-flex','align-items-center','list-unstyled','justify-content-center',"animate__animated","animate__fadeInRight"])>
    <li>
      <a href="" @class(['text-decoration-none'])>Acceuil</a>
    </li>
    <li @class('text-white')>
      <i @class(['mdi','mdi-chevron-right','mx-2','mdi-18px'])></i>
    </li>
    <li>
      <a href="{{ route('contact.create') }}" @class(['text-decoration-none'])>Contactez - nous</a>
    </li>
  </ul>
  {{-- <p @class(["text-center","text-white","animate__animated","animate__fadeInRight"])>Cette agence faire du voyes avec les villes et en organisé</p> --}}
</div>

@endsection
@section('contenu')
<div @class(['row','justify-content-center','mt-2'])>
  <div @class('col')>
    <div @class('card')>
      <div @class(['card-body','p-2','pt-0'])>
        <h5 @class(['fw-bolder','text-center','my-3'])>
          <span @class("text-capitalize")>é</span>crivez-nous un message
        </h5>
        <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div @class(['row','row-cols-2','mb-2'])>
            <div @class('col')>
              <input type="text" name="prenom" class="form-control form-control-sm shadow-none @error('prenom') is-invalid @enderror" placeholder="Prenom">
              @error('prenom')
                <strong @class(['invalid-feedback'])>{{ $message }}</strong>
              @enderror
            </div>
            <div @class('col')>
              <input type="text" name="nom" class="form-control form-control-sm shadow-none @error('nom') is-invalid @enderror" placeholder="Nom">
              @error('nom')
                <strong @class(['invalid-feedback'])>{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div @class(['row','row-cols-2','mb-2'])>
            <div @class('col')>
              <input type="email" name="email" class="form-control form-control-sm shadow-none @error('email') is-invalid @enderror" placeholder="Email">
              @error('email')
                <strong @class(['invalid-feedback'])>{{ $message }}</strong>
              @enderror
            </div>
            <div @class('col')>
              <input type="text" name="telephone" class="form-control form-control-sm shadow-none @error('telephone') is-invalid @enderror" placeholder="Téléphone">
              @error('telephone')
                <strong @class(['invalid-feedback'])>{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div @class(['row','row-cols-2','mb-2'])>
            <div @class('col')>
              <input type="text" name="sujet" class="form-control form-control-sm shadow-none @error('sujet') is-invalid @enderror" placeholder="Sujet">
              @error('sujet')
                <strong @class(['invalid-feedback'])>{{ $message }}</strong>
              @enderror
            </div>
            <div @class('col')>
              <input type="file" name="fichier" class="form-control form-control-sm shadow-none">
            </div>
          </div>
          <div @class(['form-group','mb-2'])>
            <label for="" @class(['form-label'])>Message *</label>
            <textarea name="message" id="" cols="30" rows="4" class="form-control form-control-sm shadow-none @error('message') is-invalid @enderror" style="resize: none"></textarea>
            @error('message')
              <strong @class(['invalid-feedback'])>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(['form-group','d-flex','justify-content-center'])>
            <button type="submit" @class(['btn','btn-primary','w-50'])>Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div @class('col')>
    <div @class('card')>
      <div @class(['card-body','p-2'])>
        <p>Une agence de voyage est une entreprise officielle qui vend à des voyageurs des billets d’avion, des séjours et tous les services connexes à ce voyage. Une agence de voyage est donc un intermédiaire entre les consommateurs et les prestataires de services : compagnies aériennes, hôtels, compagnies de guides, taxis, musées, prestataires d’activités sportives, restaurants, etc.</p>
        <h4 @class('fw-bolder')>
          Heures de travail
        </h4>
        <div @class(['row'])>
          <div @class('col')>
            <ul @class(['list-group'])>
              <li @class(['list-group-item'])>
                <span @class('fw-bolder')>Lundi : </span>
                <span @class('float-end')>8:00 - 18:00</span>
              </li>
              <li @class(['list-group-item'])>
                <span @class('fw-bolder')>Mardi : </span>
                <span @class('float-end')>8:00 - 18:00</span>
              </li>
              <li @class(['list-group-item'])>
                <span @class('fw-bolder')>Mercredi : </span>
                <span @class('float-end')>8:00 - 18:00</span>
              </li>
            </ul>
          </div>
          <div @class('col')>
            <ul @class(['list-group'])>
              <li @class(['list-group-item'])>
                <span @class('fw-bolder')>Jeudi : </span>
                <span @class('float-end')>8:00 - 18:00</span>
              </li>
              <li @class(['list-group-item'])>
                <span @class('fw-bolder')>Vendredi</span>
                <span @class('float-end')>8:00 - 18:00</span>
              </li>
              <li @class(['list-group-item'])>
                <span @class('fw-bolder')>Samedi</span>
                <span @class('float-end')>8:00 - 13:00</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection