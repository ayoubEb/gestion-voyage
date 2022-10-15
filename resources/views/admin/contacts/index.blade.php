@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info','mb-2'])>
        Manager Contactez-Nous
      </h4>
      <div @class('table-responive')>
        <table @class(['table','table-sm','table-bordered','m-0'])>
          <thead>
            <tr>
              <th>Prénom</th>
              <th>Nom</th>
              <th>E-mail</th>
              <th>Téléphone</th>
              <th>Fichier</th>
              <th>Date d'envoyer</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if (count($contactez)>0)
              @foreach ($contactez as $contactez)
                <tr>
                  <td>{{ $contactez->prenom ?? '' }}</td>
                  <td>{{ $contactez->nom ?? '' }}</td>
                  <td>{{ $contactez->email ?? '' }}</td>
                  <td>{{ $contactez->telephone ?? '' }}</td>
                  <td>
                    @if (isset($contactez->fichier))
                    <a href="{{ asset('fichiers/'.$contactez->fichier) }}">
                     <i @class(['mdi','mdi-file-pdf'])></i>
                     <span>Voir</span>
                    </a>
                    @else
                      Aucun fichier
                    @endif
                  </td>
                  <td>
                    {{ date('M d',strtotime($contactez->created_at)) }}
                  </td>
                  <td>
                    <a href="{{ route('contact.show',$contactez) }}" @class(['text-warning'])>
                      <i @class(['mdi','mdi-eye'])></i>
                    </a>
                    <form action="{{ route('contact.destroy',$contactez) }}" method="post" @class('d-inline')>
                      @csrf
                      @method("DELETE")
                      <button type="submit" @class(['btn','btn-sm','p-0','bg-transparent','text-danger'])>
                        <i @class(['mdi','mdi-trash-can'])></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @else

            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection