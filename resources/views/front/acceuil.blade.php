@extends('layouts.front')
@section('content')
<div id="desc-top">
  <h1 @class(["text-center","text-white","animate__animated","animate__fadeInLeft"])>Voyage</h1>
  <p @class(["text-center","text-white","animate__animated","animate__fadeInRight"])>Cette agence faire du voyes avec les villes et en organisé</p>
</div>
<div @class(['row','justify-content-center']) id="info">
  <div @class(['col-lg-3','p-1'])>
    <div @class(['card','bg-light',"animate__animated","animate__fadeInDown"])>
      <div @class(['card-header','py-3','text-center'])>
        <h5 @class(['m-0','text-white'])>Agence</h5>
      </div>
      <div @class('card-body')>
        <h5 @class(["text-center","fw-bolder"])>Agence du voyage</h5>
        <p @class('')>Cette agence faire du voyes avec les villes et en organisé</p>
      </div>
    </div>
  </div>
  <div @class(['col-lg-3','p-1'])>
    <div @class(['card','bg-secondary',"animate__animated","animate__fadeInDown"  ])>
      <div @class(['card-header','py-3','text-center'])>
        <h5 @class(['m-0','text-white'])>Jours Travails</h5>
      </div>
      <div @class(['card-body','p-0'])>
        <ul class="list-group">
          <li class="list-group-item fw-bolder bg-transparent text-white">
            <span>Lundi - Vendredi</span>
            <span @class('float-end')>8:00 - 18:00</span>
          </li>
          <li class="list-group-item fw-bolder bg-transparent text-white">
            <span>Samedi</span>
            <span @class('float-end')>8:00 - 13:00</span>
          </li>
          <li class="list-group-item fw-bolder bg-transparent text-white">
            <span>Dimanche</span>
            <span @class('float-end')>Fermé</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div @class(['col-lg-3','p-1'])>
    <div @class(['card','bg-primary',"animate__animated","animate__fadeInDown"  ])>
      <div @class(['card-header','py-3','text-center'])>
        <h5 @class(['m-0','text-white'])>Informations</h5>
      </div>
      <div @class(['card-body','p-0'])>
        <ul class="list-group bg-transparent">
          <li class="list-group-item fw-bolder bg-transparent py-0 d-flex align-items-center justify-content-between text-white">
            <span>
              <i @class(['mdi','mdi-phone','mdi-24px'])></i>
            </span>
            <span @class(['float-end'])>+212 699 999 999</span>
          </li>
          <li class="list-group-item fw-bolder bg-transparent py-0 d-flex align-items-center justify-content-between text-white">
            <span>
              <i @class(['mdi','mdi-whatsapp','mdi-24px'])></i>
            </span>
            <span @class(['float-end'])>+212 699 999 999</span>
          </li>
          <li class="list-group-item fw-bolder bg-transparent py-0 d-flex align-items-center justify-content-between text-white">
            <span>
              <i @class(['mdi','mdi-email-outline','mdi-24px'])></i>
            </span>
            <span @class(['float-end'])>example@gmail.com</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection
@section('contenu')
<div @class(['row','row-cols-4','my-4','super-info'])>
  <div @class(['col'])>
    <div @class('card')>
      <div @class(['card-body','text-center'])>
        <i @class(['mdi','mdi-map-marker-outline','mdi-36px','text-primary'])></i>
        <p @class(['fw-bolder','mb-1'])>500+ Destinations</p>
        <p @class('m-0')>Il y a plus 500 places pour voyage dans cette agence</p>
      </div>
    </div>
  </div>

  <div @class(['col'])>
    <div @class('card')>
      <div @class(['card-body','text-center'])>
        <i @class(['mdi','mdi-currency-usd-circle-outline','mdi-36px','text-primary'])></i>
        <p @class(['fw-bolder','mb-1'])>Le meilleur prix dans les voyages</p>
        <p @class('m-0')>Les meuilleurs du prix dans voyages</p>
      </div>
    </div>
  </div>

  <div @class(['col'])>
    <div @class('card')>
      <div @class(['card-body','text-center'])>
        <i @class(['mdi','mdi-headset','mdi-36px','text-primary'])></i>
        <p @class(['fw-bolder','mb-1'])>Excellent support client</p>
        <p @class('m-0')>Les meuilleurs du prix dans voyages</p>
      </div>
    </div>
  </div>

  <div @class(['col'])>
    <div @class('card')>
      <div @class(['card-body','text-center'])>
        <i @class(['mdi','mdi-calendar-month-outline','mdi-36px','text-primary'])></i>
        <p @class(['fw-bolder','mb-1'])>Réservation super rapide</p>
        <p @class('m-0')>Les meuilleurs du prix dans voyages</p>
      </div>
    </div>
  </div>

</div>


<div @class(['row','justify-content-center']) id="definition">
  <div @class(['col-lg-10','py-4'])>
    <div @class('row')>
      <div @class(['col-lg-3'])>
        <h5 @class(['m-0','mb-2','fw-bolder'])>Agence du voyages</h5>
        <h6 @class(['m-0'])>Monsieur Samir</h6>

      </div>
      {{-- <div @class('col-lg-1')><hr></div> --}}
      <div @class(['col-lg-6'])>
        Une agence de voyage est une entreprise officielle qui vend à des voyageurs des billets d’avion, des séjours et tous les services connexes à ce voyage. Une agence de voyage est donc un intermédiaire entre les consommateurs et les prestataires de services : compagnies aériennes, hôtels, compagnies de guides, taxis, musées, prestataires d’activités sportives, restaurants, etc.
      </div>
    </div>
  </div>
</div>
@endsection