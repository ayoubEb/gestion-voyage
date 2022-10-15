@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','py-2','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','fs-5','m-0'])>
      Liste du clients
    </div>
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['list-unstyled','m-0','d-flex','align-items-center'])>
        <li>
          <a href="{{ route('home') }}">
            <i @class(['mdi','mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class('mx-2')>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('client.index') }}">
            Liste du clients
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body','p-2'])>
    <div @class('table-responsive')>
      <table @class(['table','table-bordered','table-sm','m-0'])>
        <thead>
          <tr>
            <th>Name</th>
            <th>Téléphone</th>
            <th>E-mail</th>
            <th>Genre</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
            <tr>
              <td @class('align-middle')>{{ $client->name ?? '' }}</td>
              <td @class('align-middle')>{{ $client->telephone ?? '' }}</td>
              <td @class('align-middle')>{{ $client->email ?? '' }}</td>
              <td @class('align-middle')>{{ $client->genre ?? '' }}</td>
              <td @class('align-middle')>
                <a href="{{ route('client.edit',$client) }}" @class(['btn','btn-sm','btn-info'])>
                  <i @class(['mdi','mdi-pencil'])></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection