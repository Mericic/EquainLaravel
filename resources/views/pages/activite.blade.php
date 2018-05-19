@extends('templates.template')

@section('titre')
    Equ'ain - Activités
@endsection


@section('contenu')
    <div class="row">

        @foreach($activites as $key=>$activite)
            <div class="col-lg-4 activites">
                @role('Administrateur')
                <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $activite->id_contenu_element !!}" data-titre="{!! $activite->	titre_element !!}" data-contenu="{!! $activite->contenu_element !!}">mod</button>
                </div>
                @endrole
                <img src="{{ asset($activite->lien_image) }}" style="overflow: hidden">
                <h3>{{ $activite->	titre_element }}</h3>
                {!! $activite->contenu_element !!}
                <a href="{{ $activite->lien_next }}" class="boutonRond btnOrange btnBas">En savoir plus</a>
            </div>

        @endforeach
    </div>


@endsection