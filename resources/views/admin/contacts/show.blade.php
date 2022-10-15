@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <h4 @class(['m-0','mb-3','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Contact : {{ $contact->prenom }}
      </h4>
      <div @class(['border','border-solid','border-1','border-primary','mb-2'])>
        <div @class(['d-flex','align-items-center','justify-content-between','my-2'])>
          <h5 @class(['ps-2','m-0'])>{{ $contact->sujet }}</h5>
          <h6 @class(['m-0','pe-2'])>{{ date('M d,Y, h:m A',strtotime($contact->created_at)) }}</h6>
        </div>
      </div>
      <div @class(['row'])>
        <div @class(['col','bg-light'])>
          <h6>{{ $contact->message }}</h6>
          <h6 @class(['text-end','text-uppercase'])>{{ $contact->prenom.' '.$contact->nom }}</h6>
        </div>
        <div @class('col')>
          <ul @class(['list-group'])>
            <li @class(['list-group-item','py-2','fw-bolder','d-flex','align-items-center','justify-content-between'])>
              <span>
                <i @class(['mdi','mdi-phone','mdi-24px  '])></i>
              </span>
              <span @class(['fw-normal'])>{{ $contact->telephone }}</span>
            </li>
            <li @class(['list-group-item','py-2','fw-bolder','d-flex','align-items-center','justify-content-between'])>
              <span>
                <i @class(['mdi','mdi-file-pdf','mdi-24px'])></i>
                {{ $contact->fichier ?? '' }}
              </span>

              @if (isset($contact->fichier))
              <a href="{{ asset('fichiers/'.$contact->fichier) }}">
               Voir
              </a>
              @else
                Aucun fichier
              @endif
            </li>
          </ul>
        </div>
      </div>
      <a href="{{ route('contact.index') }}" @class(['btn','btn-success'])>Retour</a>
    </div>
  </div>
@endsection