@extends('templates.template')

@section('titre')
    Equ'ain - equipe
@endsection


@section('contenu')
    <div class="row" style="margin-top: 50px;text-align: center;  padding:0 10%; ">

        @foreach($equipes as $equipe)
            <div class="equipe col-md-6" style="margin: 0 0 20px 0;">
                @role('Administrateur')
                <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $equipe->id_contenu_element !!}" data-titre="{!! $equipe->	titre_element !!}" data-contenu="{!! $equipe->contenu_element !!}">mod</button>
                </div>
                @endrole
                <img src="{{ asset($equipe->lien_image) }}">
                <h3>{{ $equipe->titre_element }}</h3>
                {!! $equipe->contenu_element !!}
            </div>
        @endforeach
    </div>
    @role('Administrateur')
    <div style="background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutElement" data-id_element="6">Ajouter un membre de l'équipe</button>
    </div>
    @endrole
@endsection