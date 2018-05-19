<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('titre')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/cssBootstrap/bootstrap.min.css') }}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/cssBootstrap/bootstrap.min.css.map') }}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    {{--<script src="Vue/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>--}}
    {{--    <script type="text/javascript" src="{{ asset('js/jsBootstrap/bootstrap.js') }}"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon') }}" />
    {{--<script type="text/javascript" src="Vue/Javascript/Gestion_Connexions.js"></script>--}}
    {{--<script src="Vue/ckeditor/ckeditor.js"></script><!-- editeur de texte utilisé dans les tableaux: http://docs.ckeditor.com/# -->--}}
    {{--<script src="Vue/Javascript/Modification_Accueil.js"></script>--}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119161875-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-119161875-1');
    </script>


</head>

<body>

<header>
    <input class="burger-opener" type="checkbox" />
    <div class="burger header-icon">
        |||
    </div>

    <div id="navbar">
    <ul>
        <li @if(Request::is('/') || Request::is('accueil')) style="background-color: #FF6633" @endif ><a href="{{ route('accueil') }}">Accueil</a></li>
        <li @if(Request::is('structure')||Request::is('equipe')||Request::is('cavalerie')||Request::is('oxer')) style="background-color: #FF6633" @endif class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">club</a>
            <div class="dropdown-content">
                <a @if(Request::is('structure')) style="background-color: #FF6633" @endif href="{{ route('structure') }}">Structure</a>
                <a @if(Request::is('equipe')) style="background-color: #FF6633" @endif href="{{ route('equipe') }}">Equipe</a>
                <a @if(Request::is('cavalerie')) style="background-color: #FF6633" @endif href="{{ route('cavalerie') }}">Cavalerie</a>
                <a @if(Request::is('oxer')) style="background-color: #FF6633" @endif href="{{ route('oxer') }}">L'Oxer</a>
            </div>
        </li>
        <li @if(Request::is('activite')) style="background-color: #FF6633" @endif ><a href="{{ route('activite') }}">activités</a></li>
        <li @if(Request::is('reprises')||Request::is('inscriptions_tarifs')) style="background-color: #FF6633" @endif class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">informations</a>
            <div class="dropdown-content">
                <a @if(Request::is('reprises')) style="background-color: #FF6633" @endif href="{{ route('reprises') }}">Horaires des reprises</a>
                <a @if(Request::is('inscriptions_tarifs')) style="background-color: #FF6633" @endif href="{{ route('inscriptions_tarifs') }}">Inscriptions / Tarifs</a>
            </div>
        </li>
        <li><a href="{{--{{ route('') }}--}}">écuries</a></li>
        <li><a href="{{ route('contact') }}">contact</a></li>
    </ul>
</div>
<img id="logo" src="{{ asset('images/logo2.png') }}">
<div id="imageHaut" @if($header->nom_page != 'accueil') style="height: 35em !important" @endif>
    <!--<img id="imageheader" src="equain_boxs.jpg">-->
    @role('Administrateur')
    <div style="position: absolute; bottom: 50%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalHeader" data-id="{!! $header->id_contenu_element !!}" data-titre="{!! $header->titre_element !!}" data-contenu="{!! $header->contenu_element !!}">Modifier</button>
    </div>
    @endrole
    @if($header->format == 'video/mp4')
        <video loop="loop" preload="auto" autoplay="true"> <source type="video/mp4" src="{{ asset($header->lien_image) }}" /></video>
    @else
        <img src="{{ asset($header->lien_image) }}" style="width: 100%" alt="image header">
    @endif
    <div id="message">
        <div style="margin-bottom: 60px; word-wrap: break-word">
            <h1>{!! $header->titre_element !!}</h1>
            {!! $header->contenu_element !!}
        </div>
    </div>
</div>
</header>
@yield('contenu')

<footer class="footer" style="background-image: url('{{ asset("images/footer/manege_panoramique.jpg") }}'); color:white;background-size:cover;">
    <div class="row" style="background-color: rgba(255, 102, 51, 0.8)">
        <h1 class="text-center" style="color: white;">On reste en contact</h1>
    </div>
    <div class="row"  style="background-color: rgba(255, 102, 51, 0.8)">
        <div class="col-md-3">
            <img class="img-responsive" src="{{ asset("images/footer/email.png") }}" alt="img_email">
            <div class="col-xs-8">
                <h3>MAIL</h3>
                <p>equain@orange.fr</p>
            </div>
        </div>
        <div class="col-md-3">
        <img class="col-xs-2 img-responsive" src="{{ asset("images/footer/tel.png") }}" alt="img_email">
        <div class="col-xs-10">
            <h3 style="text-transform: uppercase;">téléphone</h3>
            <p>04 78 55 23 02</p>
        </div>
    </div>
    <div class="col-md-3">
        <img class="col-xs-3 img-responsive" src="{{ asset("images/footer/facebook.png") }}" alt="img_email">
        <div class="col-xs-9">
            <h3>FACEBOOK</h3>
            <p>ecurie.equain</p>
        </div>
    </div>
    <div class="col-md-3">
            <img class="col-xs-3 img-responsive" src="{{ asset("images/footer/adresse.png") }}" alt="img_email">
            <div class="col-xs-9">
                <h3>ADRESSE</h3>
                <p>Equ'Ain E.M.L.S -</p>
                <p>Parc de Miribiel Jonage</p>
                <p>1 Chemin des Iles</p>
                <p>01700 MIRIBEL - France</p>
            </div>
    </div>
</footer>

@role('Administrateur')
@extends('templates.modalfades')
@endrole


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


</html>