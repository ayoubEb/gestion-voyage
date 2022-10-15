@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','justify-content-between','mb-2','align-items-center'])>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Liste du rôles
        </h4>
        @can('role-create')
          <a href="{{ route('roles.create') }}" @class(['btn','btn-info','btn-sm','d-flex','align-items-center','fw-bolder'])>
            <i @class(['mdi','mdi-plus-circle-outline','mdi-18px','me-1'])></i>
            <span>Ajouter un rôle</span>
          </a>
        @endcan
      </div>
      <table class="table table-bordered table-sm m-0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
            <tr>
            <td class="align-middle">{{ $role->name }}</td>
            <td class="align-middle">
            @can('role-show')
            <a @class(['btn','btn-sm','btn-warning']) href="{{ route('roles.show',$role->id) }}">Voir</a>
            @endcan
            @can('role-edit')
            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
            @endcan
            </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    </div>
  </div>
@endsection