@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<article @class('card')>
  <div @class(["card-header","px-2"])>
    <div @class(['d-flex','align-items-center',"float-start"])>
      <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
        <i @class(['mdi','mdi-home'])></i>
      </a>
      <h5 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Information d'agence
      </h5>
    </div>
    <button type="button"  @class(['btn','btn-info','btn-sm','waves-effect','waves-light',"px-3","float-end","d-none"=>count($agence)==1]) data-bs-toggle="modal" data-bs-target=".add">
      Ajouter
    </button>
  </div>
  <div @class(['card-body','p-2'])>
    @include('layouts.session')
    <div @class("table-responsive")>
      <table @class(["table","table-striped","table-sm","mb-0"])>
        <thead>
          <tr>
            <th @class("text-capitalize")>logo</th>
            <th @class("text-capitalize")>nom</th>
            <th @class("text-capitalize")>e-mail</th>
            <th @class("text-capitalize")>adresse</th>
            <th @class("text-capitalize")>ville</th>
            <th @class("text-capitalize")>ice</th>
            <th @class("text-capitalize")>patente</th>
            <th @class("text-capitalize")>actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($agence as $item)
          <tr>
            <td @class("align-middle")><img src="{{ asset("images/agence/".$item->logo) }}" alt="" @class(["img-fluid","avatar-md"])></td>
            <td @class("align-middle")>{{ $item->nom }}</td>
            <td @class("align-middle")>{{ $item->email }}</td>
            <td @class("align-middle")>{{ $item->adresse }}</td>
            <td @class("align-middle")>{{ $item->ville }}</td>
            <td @class("align-middle")>{{ $item->ice }}</td>
            <td @class("align-middle")>{{ $item->patente }}</td>
            <td @class("align-middle")>
              <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".edit-{{$item->id }}">
                <i @class(["mdi","mdi-pencil" ])></i>
              </button>
              <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".delete-{{$item->id }}">
                <i @class(["mdi","mdi-trash-can"])></i>
            </td>
          </tr>

              {{-- modal edit --}}
              <div class="modal fade edit-{{$item->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-md}}">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier l'agence : {{ $item->nom }}</h5>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('agence.update',$item) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div @class(["form-group","mb-2"])>
                          <div @class(["row","justify-content-center"])>
                            <div @class(["col-lg-6"])>
                              <img src="{{ asset('images/agence/'.$item->logo) }}" alt="" @class(["img-fluid","border","border-info","border-solid","border-2","rounded-circle","mb-1"])>
                            </div>
                          </div>
                          <input type="file" name="logo_u" id="" class="form-control form-control-sm @error('logo_u') is-invalid @enderror" accept="image/*">
                          @error('logo_u')
                          <strong @class('invalid-feedback')>{{ $message }}</strong>
                          @enderror
                        </div>
                        <div @class(["form-group","mb-2"])>
                          <input type="text" name="nom_u" id="" class="form-control form-control-sm @error('nom_u') is-invalid @enderror" value="{{ $item->nom }}" placeholder="nom_u">
                          @error('nom_u')
                            <strong @class('invalid-feedback')>{{ $message }}</strong>
                          @enderror
                        </div>
                        <div @class(["form-group","mb-2"])>
                          <input type="email" name="email_u" id="" class="form-control form-control-sm @error('email_u') is-invalid @enderror" value="{{ $item->email }}" placeholder="email_u">
                          @error('email_u')
                          <strong @class('invalid-feedback')>{{ $message }}</strong>
                          @enderror
                        </div>
                        <div @class(["form-group","mb-2"])>
                          <input type="text" name="adresse_u" id="" class="form-control form-control-sm @error('adresse_u') is-invalid @enderror" value="{{ $item->adresse }}" placeholder="adresse_u">
                          @error('adresse_u')
                          <strong @class('invalid-feedback')>{{ $message }}</strong>
                          @enderror
                        </div>
                        <div @class(["form-group","mb-2"])>
                          <input type="text" name="ville_u" id="" class="form-control form-control-sm @error('ville_u') is-invalid @enderror" value="{{ $item->ville }}" placeholder="ville_u">
                          @error('ville_u')
                          <strong @class('invalid-feedback')>{{ $message }}</strong>
                          @enderror
                        </div>
                        <div @class(["form-group","mb-2"])>
                          <input type="text" name="patente_u" id="" class="form-control form-control-sm @error('patente_u') is-invalid @enderror" value="{{ $item->patente }}" placeholder="patente_u">
                          @error('patente_u')
                            <strong @class('invalid-feedback')>{{ $message }}</strong>
                          @enderror
                        </div>
                        <div @class(["form-group","mb-2"])>
                          <input type="text" name="ice_u" id="" class="form-control form-control-sm @error('ice_u') is-invalid @enderror" value="{{ $item->ice }}" placeholder="ice_u">
                          @error('ice_u')
                            <strong @class('invalid-feedback')>{{ $message }}</strong>
                          @enderror
                        </div>
                        <div @class(["d-flex","justify-content-between"])>
                          <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-outline-secondary","btn-sm","me-2","fw-bolder"])>
                            <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
                            <span>Fermer</span>
                          </button>
                          <button type="submit" @class(["btn","btn-sm","btn-info"])>
                            <i @class(["mdi","mdi-checkbox-marked-circle-outline","mdi-18px","align-middle"])></i>
                            <span>Modifier</span>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->




              {{-- modal delete --}}
              <div class="modal fade delete-{{$item->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                    <div class="modal-header bg-danger py-2">
                      <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                          Confirmer La Suppression
                      </h6>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('agence.destroy',$item) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <div @class(["text-center","mb-2"])>
                          <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                          <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                          <h6 @class(["mb-2","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $item->nom }}</h6>
                          <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $item->email }}</h6>
                        </div>
                        <div @class(["d-flex","justify-content-center"])>
                          <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-danger","me-2","fw-bolder","px-4"]) >
                            <i @class(["mdi","mdi-close-thick","mdi-18px"])></i>
                          </button>
                          <button type="submit" @class(["btn","btn-sm","btn-success","me-2","fw-bolder","px-4"]) id="">
                            <i @class(["mdi","mdi-check-bold","mdi-18px"])></i>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          @empty


          @endforelse

        </tbody>
      </table>
    </div>
    <div @class(["row","row-cols-2"])>
    </div>
  </div>
</article>
  {{-- modal ajouter --}}
  <div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info py-2">
            <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter un utilisateur</h5>
        </div>
        <div class="modal-body">
          <form action="{{ route('agence.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div @class(["form-group","mb-2"])>
              <input type="file" name="logo" id="" class="form-control form-control-sm @error('logo') is-invalid @enderror" accept=".jpg,.jpeg,.png">
              @error('logo')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
              @enderror
            </div>
            <div @class(["form-group","mb-2"])>
              <input type="text" name="nom" id="" class="form-control form-control-sm @error('nom') is-invalid @enderror" value="{{ old('nom') }}" placeholder="nom">
              @error('nom')
                <strong @class('invalid-feedback')>{{ $message }}</strong>
              @enderror
            </div>
            <div @class(["form-group","mb-2"])>
              <input type="email" name="email" id="" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email">
              @error('email')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
              @enderror
            </div>
            <div @class(["form-group","mb-2"])>
              <input type="text" name="adresse" id="" class="form-control form-control-sm @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}" placeholder="adresse">
              @error('adresse')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
              @enderror
            </div>
            <div @class(["form-group","mb-2"])>
              <input type="text" name="ville" id="" class="form-control form-control-sm @error('ville') is-invalid @enderror" value="{{ old('ville') }}" placeholder="ville">
              @error('ville')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
              @enderror
            </div>
            <div @class(["form-group","mb-2"])>
              <input type="text" name="patente" id="" class="form-control form-control-sm @error('patente') is-invalid @enderror" value="{{ old('patente') }}" placeholder="patente">
              @error('patente')
                <strong @class('invalid-feedback')>{{ $message }}</strong>
              @enderror
            </div>
            <div @class(["form-group","mb-2"])>
              <input type="text" name="ice" id="" class="form-control form-control-sm @error('ice') is-invalid @enderror" value="{{ old('ice') }}" placeholder="ice">
              @error('ice')
                <strong @class('invalid-feedback')>{{ $message }}</strong>
              @enderror
            </div>

            <div @class(['d-flex','justify-content-between'])>
              <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-outline-secondary","btn-sm","me-2","fw-bolder"])>
                <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
                <span>Annuler</span>
              </button>

                <button type="submit" @class(['btn','btn-sm','btn-info','me-2'])>
                  <i @class(['mdi','mdi-checkbox-marked-circle-outline','mdi-18px','align-middle'])></i>
                  <span>Enregistrer</span>
                </button>
            </div>
          </form>

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@endsection