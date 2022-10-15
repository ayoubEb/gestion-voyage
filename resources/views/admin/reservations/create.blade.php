@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class('card-header')>
    <div @class(['card-title','mb-2','fs-5'])>
      Ajouter du reservation
    </div>
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['list-unstyled','m-0','d-flex'])>
        <li>
          <a href="{{ route('home') }}">
            <i @class(['mdi','mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class(['mx-2'])>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('reservation.index') }}">
            Liste du reservations
          </a>
        </li>
        <li @class(['mx-2'])>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('reservation.create') }}">
            Ajouter du reservation
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body','p-2'])>
    <form action="{{ route('reservation.store') }}" method="post">
      @csrf
      <h5 @class(['m-0','mb-2','d-flex','align-items-center'])>
        <span>Client & Paiement</span>
      </h5>
      <div id="accordion" class="custom-accordion">
        <div class="card mb-1 shadow-none">
          <a href="#collapseClient" class="text-dark mb-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseClient">
            <div class="card-header" id="headingClient">
              <h6 class="m-0">
                Client
                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
              </h6>
            </div>
          </a>
          <div id="collapseClient" class="collapse show" aria-labelledby="headingClient" data-bs-parent="#accordion" style="">
            <div class="card-body px-2 p-0">
              <div @class(['row','row-cols-md-2','row-cols-1','mb-md-2'])>
                <div @class('col')>
                  <div @class('form-group')>
                    <input type="text" name="name" id="" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                      <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class('col')>
                  <div @class('form-group')>
                    <input type="text" name="telephone" id="" class="form-control form-control-sm @error('telephone') is-invalid @enderror" placeholder="Téléphone" value="{{ old('telephone') }}">
                    @error('telephone')
                      <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
              </div>
              <div @class(['row','row-cols-md-2','row-cols-1','mb-md-2'])>
                <div @class('col')>
                  <div @class('form-group')>
                    <input type="email" name="email" id="" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="E-mail"  value="{{ old('email') }}">
                    @error('email')
                      <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class('col')>
                  <div @class('form-group')>
                    <select name="genre" id="" class="form-select form-select-sm @error('genre') is-invalid @enderror">
                      <option value="">Choisir le genre</option>
                      <option value="homme">Homme</option>
                      <option value="femme">Femme</option>
                    </select>
                    @error('genre')
                      <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="#collapseCT" class="text-dark mb-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseCT">
            <div class="card-header" id="headingCT">
              <h6 class="m-0">
                Chauffeur & Transport
                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
              </h6>
            </div>
          </a>
          <div id="collapseCT" class="collapse show" aria-labelledby="headingCT" data-bs-parent="#accordion" style="">
            <div class="card-body px-2 p-0">
              <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
                <div @class(['col','mb-md-0','mb-2'])>
                  <div @class('form-group')>
                    <label for="" @class('form-label')>Matricule du transport</label>
                    <select name="transport_id" id="" class="form-select form-select-sm @error('transport_id') is-invalid @enderror">
                      <option value="">Choisir du transport</option>
                      @foreach ($transports as $transport)
                        <option value="{{ $transport->id }}">{{ $transport->matricule }}</option>
                      @endforeach
                    </select>
                    @error('transport_id')
                      <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
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
                    @error('chauffeur_id')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="#collapsePaiement" class="text-dark mb-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapsePaiement">
            <div class="card-header" id="headingPaiement">
              <h6 class="m-0">
                  Paiement
                  <i class="mdi mdi-minus float-end accor-plus-icon"></i>
              </h6>
            </div>
          </a>
          <div id="collapsePaiement" class="collapse show" aria-labelledby="headingPaiement" data-bs-parent="#accordion" style="">
            <div class="card-body px-2 p-0">
              <div @class(['row','row-cols-md-2','row-cols-1','mb-md-2'])>
                <div @class('col')>
                  <div @class('form-group')>
                    <select name="mode" id="" class="form-select form-select-sm @error('mode') is-invalid @enderror">
                      <option value="">Choisir le mode du paiement</option>
                      <option value="espèce">Espèce</option>
                      <option value="cash">Cash</option>
                    </select>
                    @error('mode')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class('col')>
                  <div @class('form-group')>
                    <select name="statut" id="" class="form-select form-select-sm @error('statut') is-invalid @enderror">
                      <option value="">Choisir le statut du paiement</option>
                      <option value="payer">Payer</option>
                      <option value="en cours">En cours</option>
                    </select>
                    @error('statut')
                      <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="#collapseVoyage" class="text-dark mb-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseVoyage">
            <div class="card-header" id="headingVoyage">
              <h6 class="m-0">
                Voyage
                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
              </h6>
            </div>
          </a>
          <div id="collapseVoyage" class="collapse show" aria-labelledby="headingVoyage" data-bs-parent="#accordion" style="">
            <div class="card-body px-2 p-0">
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
                    <label for="" @class('form-label')>Gens voyage</label>
                    <select name="gens_voyage" class="form-select form-select-sm @error('gens_voyage') is-invalid @enderror">
                      <option value="">Choisir du gens voyage</option>
                      <option value="amis">Amis</option>
                      <option value="en coople">En couple</option>
                      <option value="famille">Famille</option>
                    </select>
                    @error('gens_voyage')
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
              <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
                <div @class(['col','mb-md-0','mb-2'])>
                  <div @class('form-group')>
                    <label for="" @class('form-label')>Gens voyage</label>
                    <select name="agence" class="form-select form-select-sm @error('agence') is-invalid @enderror">
                      <option value="">Choisir d'agence</option>
                      @foreach ($agences as $agence)
                        <option value="{{ $agence->id }}">{{ $agence->nom }} ==> {{ $agence->ice }}</option>
                      @endforeach
                    </select>
                    @error('agence')
                      <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div>
                </div>
                <div @class(['col','mb-md-0','mb-2'])>
                  {{-- <div @class('form-group')>
                    <label for="" @class('form-label')>Ville de déstination </label>
                    <input type="text" name="ville_destination" id="" class="form-control form-control-sm @error('ville_destination')
                      is-invalid
                    @enderror" value="{{ old('ville_destination') }}">
                    @error('ville_destination')
                      <strong @class('invalid-feedback')>{{ $message }}</strong>
                    @enderror
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div @class(['d-flex','justify-content-center'])>
        <button type="submit" @class(['btn','btn-sm','btn-info',])>Enregistrer</button>
      </div>
    </form>
  </div>
</div>

{{-- <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLgLabel" style="display: none;" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4" id="exampleModalLgLabel">Large modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div> --}}


<div @class(['modal','fade']) id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div @class('modal-dialog')>
    <div @class('modal-content')>
      <div @class('modal-header')>
        <h5 @class('modal-title') id="exampleModalLabel">Ajouter du voyage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
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
