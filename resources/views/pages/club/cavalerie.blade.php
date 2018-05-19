@extends('templates.template')

@section('titre')
    Equ'ain - cavalerie
@endsection


@section('contenu')
    <div  style="margin-top: 50px;text-align: center;  padding:0 10%; ">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Chevaux</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Poneys</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Demi-Pensions</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    @foreach($chevaux as $cheval)
                        <div class="cavalerie col-lg-3" style="">
                            @role('Administrateur')
                            <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $cheval->id_contenu_element !!}" data-titre="{!! $cheval->	titre_element !!}" data-contenu="{!! $cheval->contenu_element !!}">mod</button>
                            </div>
                            @endrole
                            <img src="{{ asset($cheval->lien_image) }}">
                            <h3>{{ $cheval->titre_element }}</h3>
                            {!! $cheval->contenu_element !!}
                        </div>
                    @endforeach
                </div>
                @role('Administrateur')
                <div style="background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutElement" data-id_element="9">Ajouter un cheval</button>
                </div>
                @endrole
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    @foreach($poneys as $poney)
                        <div class="cavalerie col-lg-3" style="">
                            @role('Administrateur')
                            <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $poney->id_contenu_element !!}" data-titre="{!! $poney->	titre_element !!}" data-contenu="{!! $poney->contenu_element !!}">mod</button>
                            </div>
                            @endrole
                            <img src="{{ asset($poney->lien_image) }}">
                            <h3>{{ $poney->titre_element }}</h3>
                            {!! $poney->contenu_element !!}
                        </div>
                    @endforeach
                </div>
                @role('Administrateur')
                <div style="background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutElement" data-id_element="10">Ajouter un poney</button>
                </div>
                @endrole
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                @foreach($Demi_Pensions as $Demi_Pension)
                    <div class="equipe" style="margin: 20px;">
                        @role('Administrateur')
                        <div style="position: absolute; top: 0%; right: 0; z-index: 100; background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalElement" data-id="{!! $Demi_Pension->id_contenu_element !!}" data-titre="{!! $Demi_Pension->	titre_element !!}" data-contenu="{!! $Demi_Pension->contenu_element !!}">mod</button>
                        </div>
                        @endrole
                        <img src="{{ asset($Demi_Pension->lien_image) }}">
                        <h3>{{ $Demi_Pension->titre_element }}</h3>
                        {!! $Demi_Pension->contenu_element !!}
                    </div>
                @endforeach
                @role('Administrateur')
                <div style="background-color: rgba(255,255,255,0.5); width: 25%; padding: 10px">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutElement" data-id_element="11">Ajouter une Demi-Pension</button>
                </div>
                @endrole
            </div>
        </div>


    </div>

@endsection