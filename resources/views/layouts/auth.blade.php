<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="https://i.pinimg.com/564x/bd/9c/04/bd9c04eda323d3e2eab326fc056adf19.jpg" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
  @vite('resources/css/app.css')
  @livewireStyles
  @stack('style')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400&display=swap');
    .no-select {
          -webkit-user-select: none; /* Safari */
          -moz-user-select: none; /* Firefox */
          -ms-user-select: none; /* IE 10+ */
          user-select: none; /* Standard syntax */
        }
    </style>
</head>
<body>
  @yield('content')

    @stack('script')
  @livewireScripts
</body>
</html>
