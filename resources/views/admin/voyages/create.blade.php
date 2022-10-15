@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','py-2','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','m-0','fs-4'])>Ajouter du voyage</div>
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['d-flex','align-items-center','list-unstyled','mb-0'])>
        <li>
          <a href="">
            <i @class(['mdi', 'mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class(['mx-2'])>
          <span @class(['fs-5'])>
            <i @class(['mdi', 'mdi-chevron-double-right'])></i>
          </span>
        </li>
        <li>
          <a href="{{ route('voyage.index') }}">
            <span>Liste du voyages</span>
          </a>
        </li>
        <li @class(['mx-2'])>
          <span @class(['fs-5'])>
            <i @class(['mdi', 'mdi-chevron-double-right'])></i>
          </span>
        </li>
        <li>
          <a href="{{ route('voyage.create') }}">
            <span>Ajouter du voyage</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body', 'p-2'])>
    <form action="{{ route('voyage.store') }}" method="POST">
      @csrf
      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Nom</label>
            <input type="text" name="nom" id="" class="form-control form-control-sm @error('nom')
              is-invalid
            @enderror" value="{{ old('nom') }}">
            @error('nom')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Date départ</label>
            <input type="date" name="date_depart" id="" class="form-control form-control-sm @error('date_depart')
              is-invalid
            @enderror" value="{{ old('date_depart') }}">
            @error('date_depart')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
      </div>
      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Date de retour</label>
            <input type="date" name="date_retour" id="" class="form-control form-control-sm @error('date_retour')
              is-invalid
            @enderror"  value="{{ old('date_retour') }}">
            @error('date_retour')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Prix</label>
            <input type="text" name="prix" id="" class="form-control form-control-sm @error('prix')
              is-invalid
            @enderror" value="{{ old('prix') }}">
            @error('prix')
              <strong @class('invalid-feedback')>{{ $message.'ex : 0/0.00' }}</strong>
            @enderror
          </div>
        </div>
      </div>
      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Heure de lancement</label>
            <input type="time" name="heure_lance" id="" class="form-control form-control-sm @error('heure_lance')
              is-invalid
            @enderror" value="{{ old('heure_lance') }}">
            @error('heure_lance')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Heure de retour</label>
            <input type="time" name="heure_retour" id="" class="form-control form-control-sm @error('heure_retour')
              is-invalid
            @enderror" value="{{ old('heure_retour') }}">
            @error('heure_retour')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
      </div>
      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Ville de départ</label>
            <input type="text" name="ville_depart" id="" class="form-control form-control-sm @error('ville_depart')
              is-invalid
            @enderror" value="{{ old('ville_depart') }}">
            @error('ville_depart')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Ville de déstination </label>
            <input type="text" name="ville_destination" id="" class="form-control form-control-sm @error('ville_destination')
              is-invalid
            @enderror" value="{{ old('ville_destination') }}">
            @error('ville_destination')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
      </div>
      <h5 @class(['mb-2','m-0','text-info','fw-bolder'])>Transport & chauffeur</h5>
      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Matricule du transport</label>
            <select name="transport_id" id="" class="form-select form-select-sm @error('transport_id')
              is-invalid
              @enderror">
              <option value="">Choisir du transport</option>
              @foreach ($transports as $transport)
                <option value="{{ $transport->id }}">{{ $transport->matricule }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Nom du chauffeur</label>
            <select name="chauffeur_id" id="" class="form-select form-select-sm @error('chauffeur_id')
              is-invalid
              @enderror">
              <option value="">Choisir du chauffeur</option>
              @foreach ($chauffeurs as $chauffeur)
                <option value="{{ $chauffeur->id }}">{{ $chauffeur->nom }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <h5 @class(['mb-2','m-0','text-info','fw-bolder'])>Hotel</h5>
      <div @class(['row','row-cols-1','row-cols-md-3','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Nom d'hotel</label>
            <select name="hotel_id" id="nom-hotel" class="form-select form-select-sm @error('hotel_id') is-invalid @enderror">
              <option value="">Choisir nom d'hotel</option>
              @foreach ($hotels as $hotel)
                <option value="{{ $hotel->hotel->id }}">{{ $hotel->hotel->nom }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Caractéristique</label>
            <select name="caracteristique" id="nom" class="form-select form-select-sm">
              <option value="">Choisir du caractéristique</option>
            </select>
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Valeur du caractéristique</label>
            <select name="valeur" id="val" class="form-select form-select-sm">
              <option value="">Choisir du valeur</option>
            </select>
          </div>
        </div>
      </div>
      <div @class(['form-group','d-flex','justify-content-center'])>
        <button type="submit" @class(['btn','btn-success'])>Enregistrer</button>
      </div>
    </form>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $(document).on('change',"#nom-hotel",function(){
      var car_id = $(this).val();
      var op="";
      $.ajax({
        type:"get",
        url:"{{ route('hotel-caracter') }}",
        data:{'id':car_id},
        success:function(data){
          if(data.length>0){
            op+='<option value="" selected> -- Choisir caractéristique -- </option>';
          }
          else{
            op+='<option value="" selected="true">  -- Aucun caractéristique -- </option>';
          }
          for (var i = 0; i < data.length; i++) {
            op+='<option value="'+data[i].id+'">'+data[i].nom+'</option>'

          }
          $('#nom').html(" ");
          $('#nom').append(op);
        }
      });
    }),
    $(document).on("change","#nom",function(){
      // var caracter_id = $(this).val();
      var hotel_id = $("#nom-hotel").val();
      var op="";
      $.ajax({
        type:"get",
        url:"{{ route('caracterVal') }}",
        data:{'id':hotel_id},
        success:function(data){
          if(data.length>0){
            op+='<option value="" selected> -- Choisir valeur -- </option>';
          }
          else{
            op+='<option value="" selected="true">  -- Aucun valeur -- </option>';
          }
          for (var i = 0; i < data.length; i++) {
            op+='<option value="'+data[i].id+'">'+data[i].valeur+'</option>'

          }
          $('#val').html(" ");
          $('#val').append(op);
        }
      });
    })
  });
</script>
@endsection