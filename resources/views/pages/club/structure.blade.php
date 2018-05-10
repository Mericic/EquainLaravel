@extends('templates.template')

@section('titre')
    Equ'ain - structure
@endsection


@section('contenu')
    <div class="container">

        @foreach($moyens as $key=>$moyen)
            @if($key%2 == 0)
                <div style="margin-top: -50px;text-align: center; display: flex; justify-content: space-around; padding:0 10%;">
            @endif
                <div class="infosCarres" style="background-image:url('{{ asset($moyen->lien_image) }}'); background-size: cover; background-repeat: no-repeat">
                    <h1>{{ $moyen->titre_element }}</h1>
                    {!!  $moyen->contenu_element !!}
                </div>
            @if($key%2!=0)
                </div>
            @endif
        @endforeach

        {{--<div style="margin-top: -50px;text-align: center; display: flex; justify-content: space-around; padding:0 10%;">--}}
            {{--<div class="infosCarres" style="background-image:url('{{ asset('images/elements/carriere.PNG') }}')">--}}
                {{--<h1>Carrières</h1>--}}
                {{--<p>Une carrière d'honneur, une carrière CSO, un manège Olympique</p>--}}
            {{--</div>--}}
            {{--<div class="infosCarres" style="background-image:url('{{ asset('images/elements/horseball.PNG') }}'); background-size: auto;">--}}
                {{--<h1>Manège</h1>--}}
                {{--<p></p>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div style="margin-top: -50px;text-align: center; display: flex; justify-content: space-around; padding:0 10%;">--}}

            {{--<div class="infosCarres" style="background-image:url('{{ asset('images/ticket/horseball.PNG') }}')">--}}
                {{--<h1>Cross</h1>--}}
                {{--<p>Un Cross de 150 héctares</p>--}}
            {{--</div>--}}
            {{--<div class="infosCarres" style="background-image:url('{{ asset('images/club/paddock.PNG') }}'); background-size: contain;">--}}
                {{--<h1>Paddock</h1>--}}
                {{--<p>Plusieurs Paddocks à disposition de vos chevaux</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection