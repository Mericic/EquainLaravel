@extends('templates.template')

@section('titre')
    Equ'ain
@endsection


@section('contenu')
    <div style="margin-top: -50px !important;text-align: center; display: flex; justify-content: space-around; padding:0 10%; " class="row">
        {{--@foreach($petits as $petit)--}}
            {{--<div class="col-md-4" style="padding: 0; margin: 0;">--}}
                {{--<div class="enSavoirPlus">--}}
                    {{--@role('Administrateur')--}}
                    {{--<div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">--}}
                        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $petit->id_contenu_element !!}" data-lien="{{ $petit->lien_next }}" data-titre="{!! $petit->	titre_element !!}" data-contenu="{!! $petit->contenu_element !!}">mod</button>--}}
                    {{--</div>--}}
                    {{--@endrole--}}
                    {{--<img src="{{ asset($petit->lien_image) }}" style="overflow: hidden">--}}
                    {{--<h3>{{ $petit->	titre_element }}</h3>--}}
                    {{--{!! $petit->contenu_element !!}--}}
                    {{--<a href="{{ $petit->lien_next }}" class="boutonRond btnOrange btnBas">En savoir plus</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}


    @foreach($petits as $petit)

        <div class="card col-lg-4">
            @role('Administrateur')
            <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $petit->id_contenu_element !!}" data-lien="{{ $petit->lien_next }}" data-titre="{!! $petit->	titre_element !!}" data-contenu="{!! $petit->contenu_element !!}">mod</button>
            </div>
            @endrole
            <img class="card-img-top" src="{{ asset($petit->lien_image) }}" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title">{{ $petit->	titre_element }}</h3>
                <p class="card-text">{!! $petit->contenu_element !!}</p>
                <a href="{{ $petit->lien_next }}" class="boutonRond btnOrange btnBas">En savoir plus</a>
            </div>
        </div>
    @endforeach

    </div>

    @role('Administrateur')
    <div style="background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutElement" data-id_element="2">Ajouter une vignette.</button>
    </div>
    @endrole

    <div class="row">
        @foreach($grands as $grand)
            <div class="ActuGrand col-md-12" style="margin: 0 0 20px 0;">
                @role('Administrateur')
                <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $grand->id_contenu_element !!}" data-titre="{!! $grand->	titre_element !!}" data-contenu="{!! $grand->contenu_element !!}">mod</button>
                </div>
                @endrole
                <img src="{{ asset($grand->lien_image) }}">
                <h3>{{ $grand->titre_element }}</h3>
                {!! $grand->contenu_element !!}
            </div>
        @endforeach
    </div>

    @role('Administrateur')
    <div style="background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutElement" data-id_element="2">Ajouter une actu.</button>
    </div>
    @endrole















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
