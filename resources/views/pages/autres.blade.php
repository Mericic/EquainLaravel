@extends('templates.template')

@section('titre')
    Equ'ain - {!! $contenu->titre_element  !!}
@endsection


@section('contenu')
    <div class="container" style="text-align: center; margin-top: 3em; margin-bottom: 150px;">
        @role('Administrateur')
        <div style="position: relative; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $contenu->id_contenu_element !!}" data-lien="{{ $contenu->lien_next }}" data-titre="{!! $contenu->	titre_element !!}" data-contenu="{!! $contenu->contenu_element !!}">mod</button>
        </div>
        @endrole
        <h1>{{ $contenu->titre_element }}</h1>
        {!! $contenu->contenu_element !!}
    </div>
@endsection
