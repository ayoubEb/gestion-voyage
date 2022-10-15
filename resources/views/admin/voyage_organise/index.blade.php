@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','justify-content-between','mb-2','align-items-center'])>
        <div @class(['d-flex','align-items-center'])>
          <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
            <i @class(['mdi','mdi-home','mdi-18px'])></i>
          </a>
          <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
            Liste du voyage organisés
          </h4>
        </div>
        <button type="button" @class(['btn','btn-info','btn-sm','d-flex','align-items-center','fw-bolder']) data-bs-toggle="modal" data-bs-target=".add">
          <i @class(['mdi','mdi-plus-circle-outline','mdi-18px','me-1'])></i>
          <span>Ajouter un voyage organisé</span>
        </button>
      </div>
      <a href="{{ route('eporter-vs') }}" @class(['btn','btn-sm','btn-info','mb-2'])>Exporter liste du voyage suggerès</a>
      <div @class('table-responsive')>
        <table @class(['table','table-bordered','m-0','table-sm'])>
          <thead>
            <tr>
              <th>Référence</th>
              <th>Ville destination</th>
              <th>Date départ</th>
              <th>Date retour</th>
              <th>Nombre jours</th>
              <th>Prix</th>
              {{-- <th>Description</th> --}}
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($voyageOrganises as $voyageOrganise)
              <tr>
                <td @class(['align-middle'])>{{ $voyageOrganise->reference }}</td>
                <td @class(['align-middle'])>{{ $voyageOrganise->ville_destination }}</td>
                <td @class('align-middle')>{{ $voyageOrganise->date_depart }}</td>
                <td @class('align-middle')>{{ $voyageOrganise->date_retour }}</td>
                <td @class('align-middle')>{{ $voyageOrganise->nombre_jour }}</td>
                <td @class('align-middle')>{{ $voyageOrganise->prix.' DHS' }}</td>
                <td @class('align-middle')>
                  <a href="{{ route('voyage-organise.edit',$voyageOrganise) }}" @class(['btn','btn-sm','bg-transparent','text-primary','p-0'])>
                    <i @class(['mdi','mdi-pencil'])></i>
                  </a>
                  <a href="{{ route('voyage-organise.show',$voyageOrganise) }}" @class(['btn','btn-sm','bg-transparent','text-warning','p-0'])>
                    <i @class(['mdi','mdi-information-outline'])></i>
                  </a>
                  <form action="{{ route('voyage-organise.destroy',$voyageOrganise) }}" method="post" @class(['d-inline'])>
                    @csrf
                    @method('DELETE')
                    <button type="submit" @class(['btn','btn-sm','bg-transparent','text-danger','p-0'])>
                      <i @class(['mdi','mdi-trash-can'])></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info py-2">
                <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter un voyage organisé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('voyage-organise.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div @class(["row","justify-content-center"])>
                  <div @class(["col-lg-4"])>
                    <div @class(["form-group"])>
                      <label for="" @class('form-label')>Images</label>
                      <input type="file" name="img" id="" class="form-control form-control-sm @error('img') is-invalid @enderror" value="{{ old('img') }}">
                      @error('img')
                        <strong @class('invalid-feedback')>{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>
                <div @class(['row','row-cols-2'])>
                  <div @class(['col','mb-2'])>
                    <div @class('form-group')>
                      <label for="" @class('form-label')>Nom</label>
                      <input type="text" name="nom" id="" class="form-control form-control-sm @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                      @error('nom')
                        <strong @class('invalid-feedback')>{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div @class(['col','mb-2'])>
                    <div @class('form-group')>
                    </div>
                  </div>

                  <div @class(['col','mb-2'])>
                    <div @class('form-group')>
                      <label for="" @class('form-label')>Ville destination</label>
                      <input type="text" name="ville_destination" id="" class="form-control form-control-sm @error('ville_destination') is-invalid @enderror" value="{{ old('ville_destination') }}">
                      @error('ville_destination')
                        <strong @class('invalid-feedback')>{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div @class(['col','mb-2'])>
                    <div @class('form-group')>
                      <label for="" @class('form-label')>Pays destinations</label>
                      <input type="text" name="pays_destination" min="1" id="" class="form-control form-control-sm @error('pays_destination') is-invalid @enderror" value="{{ old('pays_destination') }}">
                      @error('pays_destination')
                        <strong @class('invalid-feedback')>{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>

                  <div @class(['col','mb-2'])>
                    <div @class('form-group')>
                      <label for="" @class('form-label')>Date départ</label>
                      <input type="date" name="date_depart" id="" class="form-control form-control-sm @error('date_depart') is-invalid @enderror" value="{{ old('date_depart') }}">
                      @error('date_depart')
                        <strong @class('invalid-feedback')>{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div @class(['col','mb-2'])>
                    <div @class('form-group')>
                      <label for="" @class('form-label')>Date retour</label>
                      <input type="date" name="date_retour" id="" class="form-control form-control-sm @error('date_retour') is-invalid @enderror" value="{{ old('date_retour') }}">
                      @error('date_retour')
                        <strong @class('invalid-feedback')>{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>

                  <div @class(['col','mb-2'])>
                    <div @class('form-group')>
                      <label for="" @class('form-label')>Prix</label>
                      <input type="text" name="prix" id="" class="form-control form-control-sm @error('prix') is-invalid @enderror" value="{{ old('prix') }}">
                      @error('prix')
                        <strong @class('invalid-feedback')>{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div @class(['col','mb-2'])>
                    <div @class('form-group')>
                      <label for="" @class('form-label')>Nombre du jour</label>
                      <input type="number" name="nombre_jour" min="1" id="" class="form-control form-control-sm @error('nombre_jour') is-invalid @enderror" value="{{ old('nombre_jour') }}">
                      @error('nombre_jour')
                        <strong @class('invalid-feedback')>{{ $message }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection