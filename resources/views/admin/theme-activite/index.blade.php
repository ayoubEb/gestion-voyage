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
        Liste du théme d'activités
      </h5>
    </div>
    <button type="button"  @class(['btn','btn-info','btn-sm','waves-effect','waves-light',"px-3","float-end"]) data-bs-toggle="modal" data-bs-target=".activite-add">
      Ajouter
    </button>
  </div>
  <div @class(["card-body","p-2"])>
    @include('layouts.session')
    <div @class("table-responsive")>
      <table @class(["table","table-bordered","table-sm","mb-0"])>
        <thead @class("table-info")>
          <tr>
            {{-- <th @class('text-capitalize')>ID</th> --}}
            <th @class('text-capitalize')>théme</th>
            <th @class('text-capitalize')>destination</th>
            <th @class('text-capitalize')>départ</th>
            <th @class('text-capitalize')>arrivée</th>
            <th @class('text-capitalize')>adulte<span @class('text-lowercase')>(s)</span></th>
            <th @class('text-capitalize')>enfant<span @class('text-lowercase')>(s)</span></th>
            <th @class('text-capitalize')>actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($ThemeActivites as $th_act)
            <tr>
              <td @class("align-middle")>{{ $th_act->activite->theme ?? '' }}</td>
              <td @class("align-middle")>{{ $th_act->destination ?? '' }}</td>
              <td @class("align-middle")>{{ $th_act->depart ?? '' }}</td>
              <td @class("align-middle")>{{ $th_act->arrive ?? '' }}</td>
              <td @class("align-middle")>{{ $th_act->adulte ?? '' }}</td>
              <td @class("align-middle")>{{ $th_act->enfant ?? '' }}</td>
              <td @class("align-middle")>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".edit{{'-'.$th_act->id }}">
                  <i @class(["mdi","mdi-pencil"])></i>
                </button>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".delete{{'-'.$th_act->id }}">
                  <i @class(["mdi","mdi-trash-can"])></i>
                </button>
              </td>
            </tr>

            {{-- model edit --}}
            <div class="modal fade edit{{'-'.$th_act->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header py-2 bg-info">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier d'activité du théme : {{ $th_act->activite->theme }}</h5>
                          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('theme-activite.update',$th_act) }}" method="post">
                      @csrf
                      @method("PUT")
                      <div @class(["form-group","mb-2"])>
                      </div>
                      <div @class(["row","row-cols-2","mb-2"])>
                        <div @class(["col"])>
                          <div @class(["form-group"])>
                            <label @class("form-label")>Théme</label>
                            <select name="activite" class="form-select form-select-sm" id="">
                              <option value="" disabled>Choisir le théme d'activité</option>
                              @foreach ($activites as $act)
                                <option value="{{ $act->id }}" {{ $th_act->activite_id == $act->id ? "selected" :"" }}>{{ $act->theme }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div @class(["col"])>
                          <div @class(["form-group"])>
                            <label for="" @class("form-label")>Destination</label>
                            <input type="text" name="destination" class="form-control form-control-sm" value="{{ $th_act->destination }}">
                          </div>
                        </div>
                      </div>
                      <div @class(["row","row-cols-2","mb-2"])>
                        <div @class(["col"])>
                          <div @class(["form-group"])>
                            <label @class("form-label")>Départ</label>
                            <input type="date" name="depart" @class(["form-control","form-control-sm"]) value="{{ $th_act->depart }}">
                          </div>
                        </div>
                        <div @class(["col"])>
                          <div @class(["form-group"])>
                            <label @class("form-label")>arrivée</label>
                            <input type="date" name="arrive" @class(["form-control","form-control-sm"]) value="{{ $th_act->arrive }}">
                          </div>
                        </div>
                      </div>
                      <div @class(["row","row-cols-2","mb-2"])>
                        <div @class(["col"])>
                          <div @class(["form-group"])>
                            <label @class("form-label")>Adulte</label>
                            <input type="number" name="adulte" min="1" @class(["form-control","form-control-sm"]) value="{{ $th_act->adulte }}">
                          </div>
                        </div>
                        <div @class(["col"])>
                          <div @class(["form-group"])>
                            <label @class("form-label")>Enfant</label>
                            <input type="number" name="enfant" min="0" @class(["form-control","form-control-sm"]) value="{{ $th_act->enfant }}">
                          </div>
                        </div>
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


            <div class="modal fade delete{{'-'.$th_act->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content border border-3 border-danger border-solid">
                  <div class="modal-header bg-danger py-2">
                    <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                      Confirmer la suppression
                    </h6>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('theme-activite.destroy',$th_act) }}" method="post">
                      @csrf
                      @method("DELETE")
                      <div @class(["text-center","mb-2"])>
                        <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                        <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                        <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $th_act->destination }}</h6>
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
                <td colspan="7">
                  <h6 @class(["text-center","text-danger","m-0"])>
                    <i @class(["mdi","mdi-alert-rhombus-outline","mdi-18px","align-middle"])></i>
                    <span @class("text-capitalize")>aucun</span>
                    {{-- <span>&nbsp;</span> --}}
                    <span>donnée trouvée</span>
                  </h6>
                </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- ajouter les thémes d'activités --}}
    <div class="modal fade activite-add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-info py-2">
            <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter théme</h5>
          </div>
          <div class="modal-body">
            <form action="{{ route('theme-activite.store') }}" method="post">
              @csrf
              <div @class(["row","row-cols-2","mb-2"])>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize"])>théme</label>
                    <select name="activite_id" id="" class="form-select form-select-sm @error('activite_id') is-invalid @enderror">
                      <option value="">Choisir le théme</option>
                      @foreach ($activites as $theme)
                        <option value="{{ $theme->id }}">{{ $theme->theme }}</option>
                      @endforeach
                    </select>
                    @error('activite_id')
                    <strong @class(['invalid-feedback'])>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize"])>destination</label>
                    <input type="text" name="destination" id="" class="form-control form-control-sm @error('destination') is-invalid @enderror">
                    @error('destination')
                      <strong @class(['invalid-feedback'])>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize"])>départ</label>
                    <input type="date" name="depart" id="" class="form-control form-control-sm @error('depart') is-invalid @enderror">
                    @error('depart')
                      <strong @class(['invalid-feedback'])>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize"])>arrivée</label>
                    <input type="date" name="arrive" id="" class="form-control form-control-sm @error('arrive') is-invalid @enderror">
                    @error('arrive')
                      <strong @class(['invalid-feedback'])>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize","d-flex","justify-content-between"])>
                      <span>enfant</span>
                      <span @class(["text-primary","fw-normal","text-lowercase"]) style="font-size: .75rem">< 15 ans</span>
                    </label>
                    <input type="number" name="enfant" min="0" id="" class="form-control form-control-sm @error('enfant') is-invalid @enderror">
                    @error('enfant')
                      <strong @class(['invalid-feedback'])>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class(["col","mb-2"])>
                  <div @class("form-group")>
                    <label for="" @class(["form-label","text-capitalize","d-flex","justify-content-between"])>
                      <span>adulte</span>
                      <span @class(["text-primary","fw-normal","text-lowercase"]) style="font-size: .75rem">> 15 ans</span>
                    </label>
                    <input type="number" name="adulte" min="1" id="" class="form-control form-control-sm @error('adulte') is-invalid @enderror">
                    @error('adulte')
                      <strong @class(['invalid-feedback'])>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
              </div>
              <div @class(['d-flex','justify-content-between'])>
                <button type="button" @class(["btn","btn-outline-secondary","btn-sm"]) data-bs-dismiss="modal" aria-label="Close">
                  <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
                  <span>Fermer</span>
                </button>
                <button type="submit" @class(['btn','btn-info','btn-sm']) id="env">
                  <i @class(["mdi","mdi-checkbox-marked-circle-outline","mdi-18px","align-middle"])></i>
                  <span>Enregistrer</span>
                </button>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
</div>
@endsection
@section('script')
    <script>
      $(document).ready(function(){
        // $("#theme").on("change",function(){
        //   var theme = $(this).val();
        //   $.ajax({
        //     url:"{{ route('filter') }}",
        //     type:"GET",
        //     data:{"id":theme},
        //     success:function(data){
        //       console.log(data.length);
        //       var theme_activites = data;
        //       var out = "";
        //       if(theme_activites.length > 0){

        //         for(let i = 0;i < theme_activites.length; i++){
        //           out+='<tr>';
        //             out+='<td>'+theme_activites[i]['theme']+'</td>';
        //             out+='<td>'+theme_activites[i]['destination']+'</td>';
        //             out+='<td>'+theme_activites[i]['depart']+'</td>';
        //             out+='<td>'+theme_activites[i]['arrive']+'</td>';
        //             out+='<td>'+theme_activites[i]['adulte']+'</td>';
        //             out+='<td>'+theme_activites[i]['enfant']+'</td>';


        //             out+='</tr>';
        //           }
        //         }
        //         else if(theme=="tout"){
        //         $("#the").hide();
        //         out+='<tr>';
        //           out+='<td colspan="6" @class("text-center")>';
        //             out+='<a href="{{ route('theme-activite.index') }}">Voit le tout théme</a>';
        //           out+='</td>';
        //         out+='</tr>';
        //       }

        //       else{
        //         out+='<tr><td colspan="7" @class(["text-center"])><h6 @class(["m-0","text-danger"])>Aucun information</h6></td></tr>';
        //       }
        //       $("#tbody").html(out);
        //     }
        //   });
        // });

        // $("form").submit(function(){
        //   var clikedForm = $(this);
        //   if (clikedForm.find("[name='depart']").val() == '') {
        //   alert('Enter Valid mobile number');
        //   return false;
        // }

        // })
      });
    </script>
{{-- <script>
  var edit = document.getElementsByClassName("edit");
  setTimeout(function(){edit[0].style.backgroundColor="#FFCB42"}, 0000);
  setInterval(function(){edit[0].style.backgroundColor="white"}, 2000);

</script> --}}

@endsection