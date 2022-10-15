<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" type="text/css" />
  <title>GV</title>
</head>
<body>
  <div @class(['container-fluid','m-auto']) id="top-page">
      @include('layouts.navbar')
      @yield('content')
  </div>
  <div @class('container-fluid')>
    @yield('contenu')
  </div>
</body>
</html>