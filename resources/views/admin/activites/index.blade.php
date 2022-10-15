
@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
  <article @class("card")>
    <div @class(["card-header","px-2"])>
      <div @class(['d-flex','align-items-center',"float-start"])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
          <i @class(['mdi','mdi-home'])></i>
        </a>
        <h5 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Liste du thémes
        </h5>
      </div>
      <button type="button"  @class(['btn','btn-info','btn-sm','waves-effect','waves-light',"px-3","float-end"]) data-bs-toggle="modal" data-bs-target=".activite-add">
        Ajouter
      </button>
    </div>
    <div @class(["card-body","p-2"])>
      @include('layouts.session')
      <div @class('table-responsive')>
        <table @class(["table","table-bordered","table-sm","mb-0"])>
          <thead @class('table-info')>
            <tr>
              <th @class(["text-capitalize"])>théme</th>
              <th @class(["text-capitalize"])>activté</th>
              <th @class(["text-capitalize"])>actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($activites as $activite)
              <tr>
                <td @class(["align-middle"])>{{ $activite->theme }}</td>
                <td @class("align-middle")>
                  @if (count($activite->theme_activite) > 0)
                    {{ count($activite->theme_activite) }}
                  @else
                    <span @class("text-danger")>Aucun activité</span>
                  @endif
                </td>
                <td @class("align-middle")>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".activite-edit{{'-'.$activite->id }}">
                    <i @class(["mdi","mdi-pencil" ])></i>
                  </button>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".bs-example-modal-del{{'-'.$activite->id }}">
                    <i @class(["mdi","mdi-trash-can"])></i>
                  </button>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".activite-show{{'-'.$activite->id }}">
                    <i @class(["mdi","mdi-information-outline"])></i>
                  </button>
                </td>
              </tr>

              {{-- modal activite edit --}}
              <div class="modal fade activite-edit{{'-'.$activite->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-md}}">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier d'activité du théme : {{ $activite->theme }}</h5>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('activite.update',$activite) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div @class(["form-group","mb-2"])>
                          <label @class("form-label")>Théme</label>
                            <input type="text" name="theme" id="" class="form-control form-control-sm" value="{{ $activite->theme }}">
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

              {{-- modal activite edit --}}
              <div class="modal fade activite-show{{'-'.$activite->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Activité du théme : {{ $activite->theme }}</h5>
                    </div>
                    <div class="modal-body">

                      <div id="accordion" class="custom-accordion mb-2">
                        <div @class(["row","row-cols-2"])>
                          @forelse ($activite->theme_activite as $th_att)
                            <div @class(["col"])>
                              <div class="card mb-1 shadow-none">
                                  <a href="#collapse-{{ $th_att->id }}" class="text-dark collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                      <div class="card-header" id="headingOne">
                                          <h6 class="m-0">
                                              {{ $th_att->destination }}
                                              <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                          </h6>
                                      </div>
                                  </a>

                                  <div id="collapse-{{ $th_att->id }}" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
                                      <div class="card-body py-2 p-0">
                                            <input type="text" disabled value="{{ $activite->theme }}" @class(["form-control","form-control-sm"])>
                                        <ul @class(["list-group"])>
                                          <li @class(["list-group-item","py-1","ps-2"])>
                                            <div @class(["row","row-cols-2"])>
                                              <div @class(["col"])>
                                                <span @class(["text-capitalize","fw-bolder"])>destination</span>
                                              </div>
                                              <div @class(["col"])>
                                                <span>{{ $th_att->destination }}</span>
                                              </div>
                                            </div>
                                          </li>
                                          <li @class(["list-group-item","py-1","ps-2"])>
                                            <div @class(["row","row-cols-2"])>
                                              <div @class(["col"])>
                                                <span @class(["text-capitalize","fw-bolder"])>Départ</span>
                                              </div>
                                              <div @class(["col"])>
                                                <span>{{ $th_att->depart }}</span>
                                              </div>
                                            </div>
                                          </li>
                                          <li @class(["list-group-item","py-1","ps-2"])>
                                            <div @class(["row","row-cols-2"])>
                                              <div @class(["col"])>
                                                <span @class(["text-capitalize","fw-bolder"])>arrivé</span>
                                              </div>
                                              <div @class(["col"])>
                                                <span>{{ $th_att->arrive }}</span>
                                              </div>
                                            </div>
                                          </li>
                                          <li @class(["list-group-item","py-1","ps-2"])>
                                            <div @class(["row","row-cols-2"])>
                                              <div @class(["col"])>
                                                <span @class(["text-capitalize","fw-bolder"])>enfant<span @class('tet-lowercase')>(s)</span></span>
                                              </div>
                                              <div @class(["col"])>
                                                <span>{{ $th_att->enfant }}</span>
                                              </div>
                                            </div>
                                          </li>
                                          <li @class(["list-group-item","py-1","ps-2"])>
                                            <div @class(["row","row-cols-2"])>
                                              <div @class(["col"])>
                                                <span @class(["text-capitalize","fw-bolder"])>adulte<span @class('tet-lowercase')>(s)</span></span>
                                              </div>
                                              <div @class(["col"])>
                                                <span>{{ $th_att->adulte }}</span>
                                              </div>
                                            </div>
                                          </li>
                                        </ul>
                                      </div>
                                  </div>
                              </div>
                            </div>
                          @empty
                            <h6 @class(["m-0","text-danger","text-center","w-100"])>
                              <i @class(["mdi","mdi-alert-rhombus-outline","align-middle"])></i>
                              <span>Aucun activites trouvé</span>
                            </h6>
                          @endforelse
                        </div>
                      </div>

                      <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-outline-secondary","btn-sm","me-2","fw-bolder"])>
                        <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
                        <span>Fermer</span>
                      </button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->


              {{-- modal activite delete --}}
              <div class="modal fade bs-example-modal-del{{'-'.$activite->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                    <div class="modal-header bg-danger py-2">
                      <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                          Confirmer La Suppression
                      </h6>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('activite.destroy',$activite) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <div @class(["text-center","mb-2"])>
                          <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                          <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                          <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $activite->theme }}</h6>
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
              <tr>
                <td colspan="3">
                  <h6 @class(["m-0","text-danger","text-center"])>
                    Aucun donnée trouvé
                  </h6>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>


    </div>
  </div>


  {{-- ajouter les thémes d'activités --}}
  <div class="modal fade activite-add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info py-2">
          <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter théme</h5>
        </div>
        <div class="modal-body">
          <form action="{{ route('activite.store') }}" method="post">
            @csrf
            <div @class(["row","align-items-center","flex-column"])>
              <div @class(["col-lg-5","mb-2"])>
                <input type="text" name="theme" id="" @class(["form-control","form-control-sm"]) placeholder="théme">
                {{-- <span @class(['text-danger']) id="error">Remplir le champ</span>
                <span @class(['text-success']) id="valid">Success</span> --}}
              </div>
              <div @class(["col-lg-5"])>
                <button type="button" @class(["btn","btn-outline-dark","mb-3","btn-sm","w-100"]) id="add">
                  <i @class(["mdi",'mdi-plus-circle-outline',"mdi-18px",'align-middle'])></i>
                  <span>Ajouter d'activité</span>
                </button>
              </div>
            </div>
            <div id="theme">
              <div @class(["row","row-cols-2","mb-2"])>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize"])>destination</label>
                    <input type="text" name="destination" id="" class="form-control form-control-sm">
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize"])>prix</label>
                    <input type="number" name="prix" id="" class="form-control form-control-sm">
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize"])>départ</label>
                    <input type="date" name="depart" id="" class="form-control form-control-sm">
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize"])>arrivée</label>
                    <input type="date" name="arrive" id="" class="form-control form-control-sm">
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize","d-flex","justify-content-between"])>
                      <span>enfant</span>
                      <span @class(["text-primary","fw-normal","text-lowercase"]) style="font-size: .75rem">< 15 ans</span>
                    </label>
                    <input type="number" name="enfant" min="0" id="" class="form-control form-control-sm">
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize","d-flex","justify-content-between"])>
                      <span>adulte</span>
                      <span @class(["text-primary","fw-normal","text-lowercase"]) style="font-size: .75rem">> 15 ans</span>
                    </label>
                    <input type="number" name="adulte" min="1" id="" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
            </div>
            <div @class(['d-flex','justify-content-between'])>
              <button type="button" @class(["btn","btn-outline-secondary","btn-sm"]) data-bs-dismiss="modal" aria-label="Close">
                <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
                <span>Fermer</span>
              </button>
              <button type="submit" @class(['btn','btn-info','btn-sm'])>
                <i @class(["mdi","mdi-checkbox-marked-circle-outline","mdi-18px","align-middle"])></i>
                <span>Enregistrer</span>
              </button>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->



@endsection
@section('script')
    <script>
      $(document).ready(function(){
        // $('.form-control').prop("required",true);
        // $('form-')
        $("#add").on("click",function(){
          $("#theme").toggle(450);
        });
        })
    </script>
@endsection