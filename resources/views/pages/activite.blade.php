@extends('templates.template')

@section('titre')
    Equ'ain - Activités
@endsection


@section('contenu')
    <div class="row">

        @foreach($activites as $key=>$activite)
            <div class="col-md-4 activites">
                @role('Administrateur')<div style="float: right">
                    <form>

                    </form>
                </div>@endrole
                <img src="{{ asset($activite->lien_image) }}" style="overflow: hidden">
                <h3>{{ $activite->	titre_element }}</h3>
                {!! $activite->contenu_element !!}
                <a href="{{ $activite->lien_next }}" class="boutonRond btnOrange btnBas">En savoir plus</a>
            </div>

        @endforeach
    </div>


@endsection