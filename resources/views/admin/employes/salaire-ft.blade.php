@extends('layouts.master')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-2">
  <h5 class="text-uppercase m-0 px-1 title py-1 rounded">
    Fiche technique des employés
  </h5>

</div>

<div class="card">

  <div class="card-body p-2">
    <div class="table-responsive">
      <table class="table table-striped mb-0 table-sm">
        <thead>
          <tr>
            <th class="text-capitalize">name</th>
            <th class="text-capitalize">année</th>
            <th class="text-capitalize">fiche technique</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($salaire_annee as $s_a)
            <tr>
              <td class="align-middle">
                <button type="button" class="btn btn-sm ps-0 waves-effect waves-light btn-link fw-bolder" data-bs-toggle="modal" data-bs-target=".show-{{ $s_a->employe_id }}">
                  <h6 class="m-0">{{ $s_a->name }}</h6>
                </button>
              </td>
              <td class="align-middle">{{ $s_a->annee }}</td>
              <td class="align-middle">
                <a href="{{ route('employe-annee.pdf',["id"=>$s_a->employe_id,"annee"=>$s_a->annee]) }}">
                  <i class="mdi mdi-file-outline mdi-18px"></i>
                </a>
              </td>
            </tr>
            {{-- model show employe --}}
            <div class="modal fade show-{{$s_a->employe_id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Information d'utilisateur : {{ $s_a->name }}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body p-2">
                    <ul class="list-group mb-2">
                      <div class="row row-cols-2">
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">CNIE</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->cnie }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">name</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->name }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">adresse</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->adresse }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">ville</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->ville }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">pays</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->pays }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">nationalité</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->nationalite }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">e-mail</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->email }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">téléphone</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->telephone }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">genre</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->genre }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">poste</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->poste }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">travail</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $s_a->travail }}
                          </li>
                        </div>

                      </div>
                    </ul>
                      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-dark btn-sm me-2 fw-bolder">
                        <i class="mdi mdi-close-thick mdi-18px align-middle"></i>
                        <span>Fermer</span>
                      </button>

                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          @empty

          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection