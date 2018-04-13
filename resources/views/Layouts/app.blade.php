<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">

    <title>{{ config('app.name') }}</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/slidr.css') }}">     
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">  
    <link id="preset" rel="stylesheet" href="{{ asset('css/presets/preset1.css') }}">   
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- icons -->
    <link rel="icon" href="{{ asset('images/ico/favicon.ico') }}"> 
    <link rel="apple-touch-icon" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!-- icons -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Template Developed By ThemeRegion -->
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('ckeditor/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    
  </head>
  <body>
    <!-- header -->
    @include('Partials/header')
    <!-- header -->

    <!-- content -->
    @yield('content')
    <!-- content -->

    <!-- footer -->
    @include('Partials/footer')
    <!-- footer -->
    
    <!-- JS -->

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/price-range.js') }}"></script>   
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/switcher.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
   <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
  </body>
</html>