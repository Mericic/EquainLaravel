@extends('templates.template')

@section('titre')
    Equ'ain
@endsection


@section('contenu')
    <div style="margin-top: -50px;text-align: center; display: flex; justify-content: space-around; padding:0 10%; ">
        @foreach($petits as $petit)
            <div class="enSavoirPlus">
                <img src="{{ asset($petit->lien_image) }}" style="overflow: hidden">
                <h3>{{ $petit->	titre_element }}</h3>
                {!! $petit->contenu_element !!}
                <a href="{{ $petit->lien_next }}" class="boutonRond btnOrange btnBas">En savoir plus</a>
            </div>
        @endforeach



    </div>













    <!--<div class="container-fluid" style="text-align: center; margin-bottom: 60px;">
        <h3 style="width: 100%; background-color: black; color: white">La passion du Cheval</h3>
        <p>Le directeur du centre, Sébastien Berthet, est instructeur formé au Cadre Noir de Saumur.<br>

            Une équipe de 6 moniteurs diplômés et 2 élèves monitrices dispensent des cours adaptés pour tous niveaux, allant jusqu’à la compétition pour ceux qui le désirent.<br>

            Une grande exigence sur une cavalerie adaptée pour satisfaire tous les cavaliers.</p>

            <h3>Le Centre équestre Equ’Ain EMLS : un centre conviviale et dynamique !</h3>
    </div>-->



    {{--<div class="alert alert-success" style="text-align: center; margin-top: 50px;">--}}
        {{--<p>Ce site web est encore en développement. Merci de votre compréhension.<br>Si vous souhaitez revenir sur l'ancien site web,--}}
            {{--<a href="http://www.equain.fr/EquAin/Accueil.html">cliquez ici</a></p>--}}
        {{--<p>Votre avis nous intéresse! <a href="index.php?page=LeSiteWeb">Ecrivez-nous</a></p>--}}
    {{--</div>--}}



    <div class="container-fluid">


    </div>
    <!-- /END THE FEATURETTES -->





@endsection
