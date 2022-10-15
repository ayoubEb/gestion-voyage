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
          Liste du permi d'employé
        </h5>
      </div>
      <button type="button"  @class(['btn','btn-info','btn-sm','waves-effect','waves-light',"px-3","float-end"]) data-bs-toggle="modal" data-bs-target=".add">
        Ajouter
      </button>
    </div>
    <div @class(['card-body','p-2'])>
      @include('layouts.session')
      <div @class('table-responsive')>
        <table @class(["table","table-bordered","table-sm","mb-0"])>
          <thead>
            <tr>
              <th @class(["text-capitalize"])>name</th>
              <th @class(["text-capitalize"])>type</th>
              <th @class(["text-capitalize"])>actions</th>
            </tr>
          </thead>
          @forelse ($permis as $permi)
            <tr>
              <td @class(['align-middle'])>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-link","fw-bolder"]) data-bs-toggle="modal" data-bs-target=".show{{'-'.$permi->employe->id }}">
                  <h6 @class("m-0")>{{ $permi->employe->name }}</h6>
                </button>
              </td>
              <td @class(['align-middle'])>
                {{ $permi->type }}
              </td>
              <td @class(["align-middle"])>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".edit{{'-'.$permi->id }}">
                  <i @class(["mdi","mdi-pencil" ])></i>
                </button>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".del{{$permi->id }}">
                  <i @class(["mdi","mdi-trash-can"])></i>
                </button>
              </td>
            </tr>

            {{-- modal edit --}}
            <div class="modal fade edit{{'-'.$permi->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier permi d'employé : {{ $permi->employe->name}}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('permi.update',$permi) }}" method="post">
                      @method('PUT')
                      @csrf
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>Chauffeur</label>
                        <select name="employe" id="" class="form-select form-select-sm @error('employe') is-invalid @enderror">
                          <option value="">Choisir le chauffeur</option>
                          @foreach ($chauffeurs as $chauffeur)
                            <option value="{{ $chauffeur->id }}" {{ $chauffeur->id == $permi->employe_id ? 'selected':'' }}>{{ $chauffeur->name }}</option>
                          @endforeach
                        </select>
                        @error('employe')
                        <strong @class(["invalid-feedback"])>{{ $message }}</strong>
                        @enderror
                      </div>
                      <div @class(["form-group","mb-2"])>
                        {{-- <select name="type" id="" class="form-select form-select-sm @error('employe') is-invalid @enderror">
                          <option value="D">d</option>
                          <option value="D1">d1</option>
                          <option value="D1E">d1e</option>
                          <option value="DE">de</option>
                        </select> --}}
                        <label for="" @class(["form-label","d-block"])>Type du permi</label>
                        <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
                          <input type="radio" name="type" id="d" class="form-check-input @error('type') is-invalid @enderror" value="D" {{ $permi->type == "D" ? 'checked':'' }}>
                          <label for="d" @class(['form-check-label','text-uppercase'])>d</label>
                        </button>

                        <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
                          <input type="radio" name="type" id="d1" class="form-check-input @error('type') is-invalid @enderror" value="D1" {{ $permi->type == "D1" ? 'checked':'' }}>
                          <label for="d1" @class(['form-check-label','text-uppercase'])>d1</label>
                        </button>

                        <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
                          <input type="radio" name="type" id="d1e" class="form-check-input @error('type') is-invalid @enderror" value="D1E" {{ $permi->type == "D1E" ? 'checked':'' }}>
                          <label for="d1e" @class(['form-check-label','text-uppercase'])>d1e</label>
                        </button>

                        <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
                          <input type="radio" name="type" id="de" class="form-check-input @error('type') is-invalid @enderror" value="DE" {{ $permi->type == "DE" ? 'checked':'' }}>
                          <label for="de" @class(['form-check-label','text-uppercase'])>de</label>
                        </button>
                      </div>

                      <div @class(['d-flex','justify-content-between'])>
                        {{-- @if ($permi->type==="chauffeur")
                        @elseif($permi->type==="pilote")
                        @endif --}}
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                          <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                          <span>Annuler</span>
                        </button>
                        <div @class(['d-flex','justify-content-between'])>
                          <button type="submit" @class(['btn','btn-sm','btn-info','me-2'])>
                            <i @class(['mdi','mdi-check-outline'])></i>
                            <span>Modifier</span>
                          </button>
                          <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-info"]) data-bs-toggle="modal" data-bs-target=".del{{'-'.$permi->id }}">
                            <i @class(["mdi","mdi-trash-can"])></i>
                            <span>Supprimer</span>
                          </button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            {{-- model delete --}}
            <div class="modal fade del{{$permi->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                      <div class="modal-header bg-danger py-2">
                          <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                              Confirmer La Suppression
                          </h6>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('permi.destroy',$permi) }}" method="POST">
                          @csrf
                          @method("DELETE")
                          <div @class(["text-center","mb-2"])>
                            <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                            <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                            <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2","mb-2"])>Chauffeur : {{ $permi->employe->name }}</h6>
                            <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>Type du permis : {{ $permi->type }}</h6>
                          </div>
                          <div @class(["d-flex","justify-content-center"])>
                            <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-danger","me-2","fw-bolder","px-4"])>
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


            {{-- model show employé --}}
            <div class="modal fade show{{'-'.$permi->employe->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Information d'employé : {{ $permi->employe->name }}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body p-2">
                    <ul @class(["list-group","mb-2"])>
                      <div @class(['row','row-cols-2'])>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>CNIE</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->cnie }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>name</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->name }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>adresse</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->adresse }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>ville</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->ville }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>pays</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->pays }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>nationalité</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->nationalite }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>e-mail</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->email }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>téléphone</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->telephone }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>genre</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->genre }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>poste</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->poste }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>travail</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $permi->employe->travail }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>Date du création</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ date('d-m-Y',strtotime($permi->employe->created_at)) }}
                          </li>
                        </div>
                      </div>
                    </ul>
                      <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                        <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                        <span>Fermer</span>
                      </button>

                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          @empty
            <tr>
              <td colspan="3" @class('text-center')>
                <h6 @class(["m-0","text-danger","text-center"])>

                  Aucun donnée trouvé
                </h6>
              </td>
            </tr>
          @endforelse
        </table>
      </div>

    </div>
  </article>


{{-- modal ajouter --}}
<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header bg-info py-2">
          <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter du transnport</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('permi.store') }}" method="post">
          @csrf
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","text-capitalize"])>Chauffeur</label>
            <select name="employe" id="" class="form-select form-select-sm @error('employe') is-invalid @enderror">
              <option value="">Choisir le chauffeur</option>
              @foreach ($chauffeurs as $chauffeur)
                <option value="{{ $chauffeur->id }}">{{ $chauffeur->name }}</option>
              @endforeach
            </select>
            @error('employe')
            <strong @class(["invalid-feedback"])>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","d-block"])>Type du permi</label>
            <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
              <input type="radio" name="type" id="d" class="form-check-input @error('type') is-invalid @enderror" value="D">
              <label for="d" @class(['form-check-label','text-uppercase'])>d</label>
            </button>

            <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
              <input type="radio" name="type" id="d1" class="form-check-input @error('type') is-invalid @enderror" value="D1">
              <label for="d1" @class(['form-check-label','text-uppercase'])>d1</label>
            </button>

            <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
              <input type="radio" name="type" id="d1e" class="form-check-input @error('type') is-invalid @enderror" value="D1E">
              <label for="d1e" @class(['form-check-label','text-uppercase'])>d1e</label>
            </button>

            <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
              <input type="radio" name="type" id="de" class="form-check-input @error('type') is-invalid @enderror" value="DE">
              <label for="de" @class(['form-check-label','text-uppercase'])>de</label>
            </button>
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