@extends('templates.template')

@section('titre')
    Equ'ain - contact
@endsection


@section('contenu')
    <div class="container-fluid" style="margin-top: -50px;">

        <div style="margin-top: -50px; padding:0 10%;" class="row">
            @foreach($contacts as $key=>$contact)
                <div class="col-md-6">
                    <div class="infosCarres" style="background-image:url('{{ asset($contact->lien_image) }}'); background-size: cover; background-repeat: no-repeat">
                        @role('Administrateur')
                        <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $contact->id_contenu_element !!}" data-lien="{{ $contact->lien_next }}" data-titre="{!! $contact->	titre_element !!}" data-contenu="{!! $contact->contenu_element !!}">mod</button>
                        </div>
                        @endrole
                        <h1>{{ $contact->titre_element }}</h1>
                        <span style="font-weight : 500; font-size: 1em;">{!!  $contact->contenu_element !!}</span>
                        <a class="boutonRond btnOrange btnBas" href="{{ $contact->lien_next }}">En savoir plus</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @role('Administrateur')
    <div style="background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutElement" data-id_element="15">Ajouter une vignette.</button>
    </div>
    @endrole

@endsection