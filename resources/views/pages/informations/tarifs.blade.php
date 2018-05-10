@extends('templates.template')

@section('titre')
    Equ'ain
@endsection


@section('contenu')

    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Forfaits</th>
                    <th scope="col">Prix</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tarifs as $tarif)
                <tr>
                    <td>{{ $tarif->nom_tarif }}</td>
                    <td>{{ $tarif->tarif }} {{ $tarif->unite }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection