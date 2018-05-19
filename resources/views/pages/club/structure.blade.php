@extends('templates.template')

@section('titre')
    Equ'ain - structure
@endsection


@section('contenu')
    <div class="container-fluid" style="margin-top: -50px;">
        <div style=" padding:0 10%;" class="row">

            @foreach($moyens as $key=>$moyen)
                <div class="col-lg-6">
                    @role('Administrateur')
                    <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $moyen->id_contenu_element !!}" data-lien="{{ $moyen->lien_next }}" data-titre="{!! $moyen->	titre_element !!}" data-contenu="{!! $moyen->contenu_element !!}">mod</button>
                    </div>
                    @endrole
                    <div class="infosCarres" style="background-image:url('{{ asset($moyen->lien_image) }}'); background-size: cover; background-repeat: no-repeat; height: 300px;">
                        <h1>{{ $moyen->titre_element }}</h1>
                        {!!  $moyen->contenu_element !!}
                        {{--<a class="boutonRond btnOrange btnBas" href="{{ $moyen->lien_next }}">En savoir plus</a>--}}
                    </div>
                </div>
            @endforeach




        </div>
    </div>
@endsection