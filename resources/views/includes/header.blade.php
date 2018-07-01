<!DOCTYPE HTML>

<HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- OUTSIDE LINKS TO CSS -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JATS - Home</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libs.css')}}">
    <link href="//fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- Link to Icon -->
    <link rel="shortcut icon" href="{{public_path() . 'images/icon-jpa.png'}}">

</head>

<body>

    <header>
        <div class="header-img">
            <img src="{{$app->make('url')->to('/images/JPA-Logo_sml.jpg')}}" alt="logo">
        </div>
        <div class="header-title">
            Alumni Tracking System
        </div>        
    </header>

