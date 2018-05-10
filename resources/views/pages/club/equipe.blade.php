@extends('templates.template')

@section('titre')
    Equ'ain - equipe
@endsection


@section('contenu')
    <div  style="margin-top: 50px;text-align: center;  padding:0 10%; ">

        @foreach($equipes as $equipe)
            <div class="equipe" style="margin: 20px;">
                <img src="{{ asset($equipe->lien_image) }}">
                <h3>{{ $equipe->titre_element }}</h3>
                {!! $equipe->contenu_element !!}
            </div>
        @endforeach
    </div>
@endsection