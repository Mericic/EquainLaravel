<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>@yield('titre')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssBootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cssBootstrap/bootstrap.min.css.map') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="Vue/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jsBootstrap/bootstrap.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon') }}" />
    {{--<script type="text/javascript" src="Vue/Javascript/Gestion_Connexions.js"></script>--}}
    {{--<script src="Vue/ckeditor/ckeditor.js"></script><!-- editeur de texte utilisé dans les tableaux: http://docs.ckeditor.com/# -->--}}
    {{--<script src="Vue/Javascript/Modification_Accueil.js"></script>--}}

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>

<body>
<header>
    <div id="navbar">
        <ul>
            <li @if(Request::is('/')) style="background-color: #FF6633" @endif ><a href="{{ route('accueil') }}">Accueil</a></li>
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
            <li><a href="{{--{{ route('') }}--}}">contact</a></li>
        </ul>
    </div>
</header>

<div class="container" style="margin-top: 150px;">
    <div class="text-center">
        <img src="{{ asset('images/erreur404.png') }}" alt="erreur 404" class="img-responsive" style="margin-left: auto; margin-right: auto">
        <p>Cette page n'existe pas. Revenez plus tard</p>
    </div>
</div>

<footer class="footer" style="background-image: url('{{ asset("images/footer/manege_panoramique.jpg") }}'); color:white;background-size:cover;">
    <div class="row" style="background-color: rgba(255, 102, 51, 0.8)">
        <h1 class="text-center" style="color: white;">On reste en contact</h1>
        <div class="col-md-3">
            <img class="col-xs-3 img-responsive" src="{{ asset("images/footer/email.png") }}" alt="img_email">
            <div class="col-xs-9">
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
    </div>
</footer>
</body>
</html>