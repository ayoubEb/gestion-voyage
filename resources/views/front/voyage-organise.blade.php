@extends('layouts.front')
@section('content')
<div id="desc-top">
  <h1 @class(["text-center","text-white","animate__animated","animate__fadeInLeft"])>Voyage organisés</h1>
  <ul @class(['d-flex','align-items-center','list-unstyled','justify-content-center',"animate__animated","animate__fadeInRight"])>
    <li>
      <a href="" @class(['text-decoration-none'])>Acceuil</a>
    </li>
    <li @class('text-white')>
      <i @class(['mdi','mdi-chevron-right','mx-2','mdi-18px'])></i>
    </li>
    <li>
      <a href="{{ route('contact.create') }}" @class(['text-decoration-none'])>Voyage organisés</a>
    </li>
  </ul>
  {{-- <p @class(["text-center","text-white","animate__animated","animate__fadeInRight"])>Cette agence faire du voyes avec les villes et en organisé</p> --}}
</div>

@endsection
@section('contenu')
<div @class(['row','m-auto','mb-5','py-2']) id="point">

    <h4 @class(['text-center'])>
      <span>Nos Point</span> <span @class(['fw-bolder'])>Fort</span>
    </h4>
  <div @class(['col','text-center'])>
    <span @class(['bg-primary','fs-1','rounded','px-2','mb-2','text-white'])>
      <i @class(['mdi','mdi-headset'])></i>
    </span>
    <p @class(['text-center','fw-bolder','m-0',''])>
      Un service client à votre écouter
    </p>
  </div>
  <div @class(['col','text-center'])>
    <span @class(['bg-primary','fs-1','rounded','px-2','mb-2','text-white'])>
      <i @class(['mdi','mdi-lock'])></i>
    </span>
    <p @class(['text-center','fw-bolder','m-0',''])>
      Paiement sécurisée en dirhams
    </p>
  </div>
  <div @class(['col','text-center'])>
    <span @class(['bg-primary','fs-1','rounded','px-2','mb-2','text-white'])>
      <i @class(['mdi','mdi-cash-multiple'])></i>
    </span>
    <p @class(['text-center','fw-bolder','m-0',''])>
      Payer en plusieurs fois
    </p>
  </div>
  <div @class(['col','text-center'])>
    <span @class(['bg-primary','fs-1','rounded','px-2','mb-2','text-white'])>
      <i @class(['mdi','mdi-hand-heart'])></i>
    </span>
    <p @class(['text-center','fw-bolder','m-0',''])>
      Tarifs attratifs & promotionnels
    </p>
  </div>
  <div @class(['col','text-center'])>
    <span @class(['bg-primary','fs-1','rounded','px-2','mb-2','text-white'])>
      <i @class(['mdi','mdi-emoticon-happy-outline'])></i>
    </span>
    <p @class(['text-center','fw-bolder','m-0',''])>
     + de 3000 établissements et activités au Maroc et dans le monde
    </p>
  </div>

</div>
  <h3 @class(['ms-5','my-4'])>Nos Voyage <span @class(['fw-bolder'])>organisés</span></h3>

  <div @class(['row'])>
    <div @class(['col-lg-3'])>
      <ul @class(['list-group'])>
        @foreach ($voyageOrganises as $voyage)
        <li @class(['list-group-item','py-2'])>
          <p @class(('m-0'))>{{ $voyage->nom }}</p>
          @foreach ($voyage->voyage_caracteristique as $voyage_caracter)
          <p @class(['badge','bg-success','m-0']) style="font-size: 0.60rem">
            {{ $voyage_caracter->caracteristique->nom ?? ''}}

          </p>

          @endforeach
        </li>
        @endforeach
      </ul>
    </div>
    <div @class(['col-lg-9'])>
      <div @class('row')>
        @foreach ($voyageOrganises as $voyage)
          <div @class(['col-lg-4','voyage'])>
            <div @class(['card'])>
              <div @class(['card-body','p-0'])>

                <h5 @class(['ps-3','text-capitalize'])>{{ $voyage->ville_destination.' , '.$voyage->pays_destination }}</h5>
                <img src="{{ asset('images/voyage_organisés/'.$voyage->image) }}" @class(['img-fluid'])>
                <div @class(['card-title','bg-light','fs-5','fw-bolder','ps-3','mb-0'])>
                 {{ $voyage->nom }}
                </div>
                <div @class(['card-text','ps-3'])>
                 {{ $voyage->description }}
                </div>
                <div @class(['card-text','fw-bolder','ps-3'])>
                  <i @class(['mdi','mdi-arrow-right'])></i>
                  Caractéristiques :
                </div>
                <div @class(['card-text','ps-4','row','row-cols-3'])>
                  @foreach ($voyage->voyage_caracteristique as $voyage_caracter)
                    <div @class(['col','caracter','text-success'])>
                      <span>
                        <i @class(['mdi','mdi-check'])></i>
                      </span>
                      {{ $voyage_caracter->caracteristique->nom ?? ''}}
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            <a href="" @class(['btn','btn-warning','w-100'])>Détails</a>
          </div>
          @endforeach


      </div>
    </div>
  </div>

@endsection