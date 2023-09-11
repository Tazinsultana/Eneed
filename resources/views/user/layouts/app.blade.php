 <!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title> @yield('page_title') </title>
      {{-- <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content=""> --}}
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('home/images/fevicon.png" type="image/gif')}}" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('home/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{asset('home/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      @stack('inlinecss')
   </head>
   <body>

    @include('user.layouts.header')

  <div class="container py-6 pt-5 pb-6">
  

  @yield('content')

  </div>
  
  @include('user.layouts.footer')
  </body>
  </html>

  