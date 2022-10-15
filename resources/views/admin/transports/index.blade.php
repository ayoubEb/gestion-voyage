@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div @class('card')>
  <div @class(['card-body','p-2'])>
    <div @class(['d-flex','justify-content-between','mb-3','align-items-center'])>
      <div @class(['d-flex','align-items-center'])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
          <i @class(['mdi','mdi-home','mdi-18px'])></i>
        </a>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Liste du transports
        </h4>
      </div>
      <button type="button" @class(['btn','btn-info','btn-sm','d-flex','align-items-center','fw-bolder']) data-bs-toggle="modal" data-bs-target=".add">
        <i @class(['mdi','mdi-plus-circle-outline','mdi-18px','me-1'])></i>
        <span>Ajouter du transport</span>
      </button>
    </div>
    <div @class('table-responsive')>
      <table @class(['table','table-bordered','table-sm','mb-0'])>
        <thead>
          <tr>
            <th @class(["text-capitalize"])>transport</th>
            <th @class(["text-capitalize"])>matricule</th>
            <th @class(["text-capitalize"])>boite</th>
            <th @class(["text-capitalize"])>capacite</th>
            <th @class(["text-capitalize"])>vitesse</th>
            <th @class(["text-capitalize"])>état</th>
            <th @class(["text-capitalize"])>statut</th>
            <th @class(["text-capitalize"])>actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($transports as $transport)
            <tr>
              <td @class(["align-middle"])>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-link","fw-bolder"]) data-bs-toggle="modal" data-bs-target=".show{{'-'.$transport->employe->id }}">
                  <h6 @class("m-0")>{{ $transport->employe->name }}</h6>
                </button>
              </td>
              <td @class(["align-middle"])>{{ $transport->matricule }}</td>
              <td @class(["align-middle"])>{{ $transport->boite }}</td>
              <td @class(["align-middle"])>{{ $transport->capacite }}</td>
              <td @class(["align-middle"])>{{ $transport->vitesse }}</td>
              <td @class(["align-middle"])>{{ $transport->etat }}</td>
              <td @class(["align-middle"])>{{ $transport->statut }}</td>
              <td @class(["align-middle"])>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".edit{{'-'.$transport->id }}">
                  <i @class(["mdi","mdi-pencil" ])></i>
                </button>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".del{{'-'.$transport->id }}">
                  <i @class(["mdi","mdi-trash-can"])></i>
                </button>
              </td>
            </tr>

            {{-- modal edit --}}
            <div class="modal fade edit{{'-'.$transport->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier d'employé : {{ $transport->matricule}}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('transport.update',$transport) }}" method="post">
                      @csrf
                      @method('PUT')
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>matricule</label>
                        <input type="text" name="matricule" id="" class="form-control form-control-sm @error('matricule') is-invalid @enderror" value="{{ $transport->matricule }}">
                        @error('matricule')
                          <strong @class(["invalid-feedback"])>{{ $message }}</strong>
                        @enderror
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>boîte</label>
                        <select name="boite" id="" class="form-select form-select-sm @error('boite') is-invalid @enderror">
                          <option value="">Choisir la boîte</option>
                            <option value="automatique" {{ $transport->boite == "automatique" ? 'selected':'' }}>Automatique</option>
                            <option value="manuel" {{ $transport->boite == "manuel" ? 'selected':'' }}>Manuel</option>
                        </select>
                        @error('boite')
                          <strong @class(["invalid-feedback"])>{{ $message }}</strong>
                        @enderror
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>capacité</label>
                        <input type="number" name="capacite" min="1" id="" class="form-control form-control-sm @error('capacite') is-invalid @enderror" value="{{ $transport->capacite }}">
                        @error('capacite')
                          <strong @class(["invalid-feedback"])>{{ $message }}</strong>
                        @enderror
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>vitesse</label>
                        <input type="number" name="vitesse" min="1" id="" class="form-control form-control-sm @error('vitesse') is-invalid @enderror" value="{{ $transport->vitesse }}">
                        @error('vitesse')
                          <strong @class(["invalid-feedback"])>{{ $message }}</strong>
                        @enderror
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize","d-block"])>statut</label>
                        <button type="button" class="btn btn-light border border-solid border-1 border-light">
                          <input type="radio" name="statut" id="repar" class="form-check-input @error('statut') is-invalid @enderror" value="réparation" {{ $transport->statut == "réparation" ? 'checked':'' }}>
                          <label for="repar" @class(['form-check-label','text-capitalize'])>Réparation</label>
                        </button>
                        <button type="button" class="btn btn-light border border-solid border-1 border-light">
                          <input type="radio" name="statut" id="travail" class="form-check-input @error('statut') is-invalid @enderror" value="travail" {{ $transport->statut == "travail" ? 'checked':'' }}>
                          <label for="travail" @class(['form-check-label','text-capitalize'])>Travail</label>
                        </button>
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize","d-block"])>état</label>
                        <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
                          <input type="radio" name="etat" id="hors" class="form-check-input @error('etat') is-invalid @enderror" value="hors" {{ $transport->etat == "hors" ? 'checked':'' }}>
                          <label for="hors" @class(['form-check-label','text-capitalize'])>hors</label>
                        </button>
                        <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
                          <input type="radio" name="etat" id="intérieur" class="form-check-input @error('etat') is-invalid @enderror" value="intérieur" {{ $transport->etat == "intérieur" ? 'checked':'' }}>
                          <label for="intérieur" @class(['form-check-label','text-capitalize'])>à l'intérieur</label>
                        </button>
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>transport</label>
                        <select name="employe" id="" class="form-select form-select-sm @error('vitesse') is-invalid @enderror">
                          <option value="">Choisir le chauffeur</option>
                          @foreach ($chauffeurs as $chauffeur)
                            <option value="{{ $chauffeur->id }}" {{ $transport->employe_id == $chauffeur->id ? 'selected':'' }}>{{ $chauffeur->name }}</option>
                          @endforeach
                        </select>
                        @error('transport')
                          <strong @class(["invalid-feedback"])>{{ $message }}</strong>
                        @enderror
                      </div>

                      <div @class(['d-flex','justify-content-between'])>
                        {{-- @if ($transport->type==="chauffeur")
                        @elseif($transport->type==="pilote")
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
                          <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-info"]) data-bs-toggle="modal" data-bs-target=".del{{'-'.$transport->id }}">
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
            <div class="modal fade del{{'-'.$transport->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                      <div class="modal-header bg-danger py-2">
                          <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                              Confirmer La Suppression
                          </h6>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('transport.destroy',$transport) }}" method="post">
                          @csrf
                          @method("DELETE")
                          <div @class(["text-center","mb-2"])>
                            <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                            <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                            <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $transport->matricule }}</h6>
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

            {{-- model show --}}
            <div class="modal fade show{{'-'.$transport->employe->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Information d'employé : {{ $transport->employe->name }}</h5>
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
                            {{ $transport->employe->cnie }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>name</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->name }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>adresse</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->adresse }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>ville</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->ville }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>pays</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->pays }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>nationalité</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->nationalite }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>e-mail</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->email }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>téléphone</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->telephone }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>genre</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->genre }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>poste</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->poste }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>travail</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->travail }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>Date du création</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ date('d-m-Y',strtotime($transport->employe->created_at)) }}
                          </li>
                        </div>
                        <div @class(["col","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>type du permis</span>
                          </li>
                        </div>
                        <div @class(["col","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $transport->employe->permi->type }}
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
              <td colspan="7" @class(["text-center","text-danger"])>
                <h6 @class(["m-0"])>Aucun information du transport</h6>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
{{-- modal ajouter --}}
<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header bg-info py-2">
          <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter du transnport</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('transport.store') }}" method="post">
          @csrf
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","text-capitalize"])>matricule</label>
            <input type="text" name="matricule" id="" class="form-control form-control-sm @error('matricule') is-invalid @enderror" value="{{ old('matricule') }}">
            @error('matricule')
              <strong @class(["invalid-feedback"])>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","text-capitalize"])>boîte</label>
            <select name="boite" id="" class="form-select form-select-sm @error('boite') is-invalid @enderror">
              <option value="">Choisir la boîte</option>
                <option value="automatique" @if(old('boite')=='automatique') {{ 'selected' }} @endif @class("text-capitalize")>automatique</option>
                <option value="manuel" @if(old('boite')=='manuel') {{ 'selected' }} @endif @class("text-capitalize")>manuel</option>
            </select>
            @error('boite')
              <strong @class(["invalid-feedback"])>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","text-capitalize"])>capacité</label>
            <input type="number" name="capacite" min="1" id="" class="form-control form-control-sm @error('capacite') is-invalid @enderror" value="{{ old('capacite') }}">
            @error('capacite')
              <strong @class(["invalid-feedback"])>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","text-capitalize"])>vitesse</label>
            <input type="number" name="vitesse" min="1" id="" class="form-control form-control-sm @error('vitesse') is-invalid @enderror" value="{{ old('vitesse') }}">
            @error('vitesse')
              <strong @class(["invalid-feedback"])>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","text-capitalize","d-block"])>statut</label>
            <button type="button" class="btn btn-light border border-solid border-1 border-light">
              <input type="radio" name="statut" id="repar" class="form-check-input @error('statut') is-invalid @enderror" value="réparation">
              <label for="repar" @class(['form-check-label','text-capitalize'])>Réparation</label>
            </button>
            <button type="button" class="btn btn-light border border-solid border-1 border-light">
              <input type="radio" name="statut" id="travail" class="form-check-input @error('statut') is-invalid @enderror" value="travail">
              <label for="travail" @class(['form-check-label','text-capitalize'])>Travail</label>
            </button>
          </div>
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","text-capitalize","d-block"])>état</label>
            <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
              <input type="radio" name="etat" id="hors" class="form-check-input @error('etat') is-invalid @enderror" value="hors">
              <label for="hors" @class(['form-check-label','text-capitalize'])>hors</label>
            </button>
            <button type="button" @class(["btn","btn-light","border","border-solid","border-1","border-light"])>
              <input type="radio" name="etat" id="intérieur" class="form-check-input @error('etat') is-invalid @enderror" value="intérieur">
              <label for="intérieur" @class(['form-check-label','text-capitalize'])>à l'intérieur</label>
            </button>
          </div>
          <div @class(["form-group","mb-2"])>
            <label for="" @class(["form-label","text-capitalize"])>transport</label>
            <select name="employe" id="" class="form-select form-select-sm @error('vitesse') is-invalid @enderror">
              <option value="">Choisir le chauffeur</option>
              @foreach ($chauffeurs as $chauffeur)
                <option value="{{ $chauffeur->id }}" @if(old('transport')==$chauffeur->id) {{ 'selected' }} @endif>{{ $chauffeur->name }}</option>
              @endforeach
            </select>
            @error('transport')
              <strong @class(["invalid-feedback"])>{{ $message }}</strong>
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