@extends('layouts.master')
@section('content')
    <div @class('card')>
      <div @class(['card-body', 'p-2'])>
        <div @class(['d-flex','align-items-center','mb-2'])>
          <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
            <i @class(['mdi','mdi-home','mdi-18px'])></i>
          </a>
          <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
            Ajouter un transport
          </h4>
        </div>

        <form action="{{ route('transportAvion.store') }}" method="post">
          @csrf
            <div @class(['form-group','mb-2'])>
              <select name="" id="type">
                <option value="transport">Transport</option>
                <option value="avion">avion</option>
              </select>
            </div>
            <div @class(['row','row-cols-2']) id="avion">
              {{-- <div @class('col')>
                <label for="" @class('form-label')>Matricule</label>
                <input type="text" name="matricule" @class(["form-control","form-control-sm"])>
                <input type="number" name="capacite" min="1" @class(["form-control","form-control-sm"])>
              </div> --}}

            </div>
            <div @class(['row','row-cols-2'])  id="transport">
              <div @class('col')>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Matricule</label>
                  <input type="text" name="matricule" @class(["form-control","form-control-sm"])>
                </div>
                <div @class('form-group')>
                  <label for="" @class('form-label')>capacité</label>
                  <input type="number" name="capacite" min="1" @class(["form-control","form-control-sm"])>
                </div>
              </div>

          {{-- <div class="d-flex justify-content-between">
            <a href="{{ route('transport.index') }}" @class(['btn','btn-primary','btn-sm'])>Retour</a>
            <button type="submit" class="btn btn-sm btn-success">Enregistrer</button>
          </div> --}}
        </form>
      </div>
    </div>
@endsection
@section('script')
  <script>
    // $(document).ready(function(){
    //   $("#add").on('click',function(){
    //     var out = " ";
    //     out+='<tr>';
    //     out+='<td><input type="text" name="matricule[]" @class(["form-control","form-control-sm"=>true])></td>';
    //     out+='<td><input type="number" name="capacite[]" min="1" @class(["form-control","form-control-sm"=>true])></td>';
    //     out+='<td><button type="button" @class(["btn","btn-sm"=>true,"btn-danger"]) id="remove"><i @class(["mdi","mdi-trash-can"])></i></button></td>';
    //     out+='</tr>';
    //     $('tbody').append(out);
    //   })
    // })
    // $(document).on('click','#remove',function() {
    // $(this).closest('tr').remove();
    // })
    $(document).ready(function(){
      $("#type").on('change',function(){
        var avion = " ";
        var transport = " ";
        var typeSelect = $("#type").val();
        if(typeSelect=="avion"){
          avion+='<div>';
            avion+='<label>Nom d\'avion</label>';
            avion+='<input type="number">';
          avion+='</div>';
          $("#c").show();
          // $('#avion').append(avion);
          // transport.hide();
        }
        if(typeSelect=="transport"){
          // transport+='<div>';
          //   transport+='<label>Nom d\'transport</label>';
          //   transport+='<input type="number">';
          // transport+='</div>';
          // $('#transport').append(transport);

          $("#c").hide();
          $("#cc").show();


        }

      })
    })

  </script>
@endsection