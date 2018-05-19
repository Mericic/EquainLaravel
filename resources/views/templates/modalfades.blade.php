{{--modal header--}}



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalHeader" aria-labelledby="modalHeader" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="modalHeaderTitre">Modier l'image et le texte "haut"</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('modifElement') }}" id="modalHeaderForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value />
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Titre</label>
                                <input type="text" class="form-control" id="HeaderTitle" name="Title">
                                {!! $errors->first('HeaderTitle', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Contenu</label>
                                <textarea class="form-control" id="HeaderContenu" name="Contenu"></textarea>
                                <script>CKEDITOR.replace('HeaderContenu'); // Pour utiliser l'éditeur de texte doc ici: http://docs.cksource.com/Main_Page </script>

                                {!! $errors->first('HeaderContenu', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                            </div>

                            <div class="form-group files">
                                <label>Changer l'image de fond </label>
                                <input type="file" class="form-control" multiple="" name="photo">
                            </div>
                </form>
                <style>
                    .files input {
                        outline: 2px dashed #92b0b3;
                        outline-offset: -10px;
                        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        padding: 120px 0px 85px 35%;
                        text-align: center !important;
                        margin: 0;
                        width: 100% !important;
                    }
                    .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
                        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
                    }
                    .files{ position:relative}
                    .files:after {  pointer-events: none;
                        position: absolute;
                        top: 60px;
                        left: 0;
                        width: 50px;
                        right: 0;
                        height: 56px;
                        content: "";
                        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
                        display: block;
                        margin: 0 auto;
                        background-size: 100%;
                        background-repeat: no-repeat;
                    }
                    .color input{ background-color:#f1f1f1;}
                    .files:before {
                        position: absolute;
                        bottom: 10px;
                        left: 0;  pointer-events: none;
                        width: 100%;
                        right: 0;
                        height: 57px;
                        content: " Déposez le fichier ici ";
                        display: block;
                        margin: 0 auto;
                        color: #2ea591;
                        font-weight: 600;
                        text-transform: capitalize;
                        text-align: center;
                    }
                </style>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="modalHeaderSave">Save changes</button>
            </div>
            <script>
                $('#modalHeaderSave').click(function(){
                    $('#modalHeaderForm').submit();
                })
            </script>
        </div>
    </div>
</div>
<script>

    $('#modalHeader').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var titre = button.data('titre') // Extract info from data-* attributes
        var contenu = button.data('contenu') // Extract info from data-* attributes
        var id = button.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#HeaderTitle').val(titre)
        modal.find('#HeaderTitle').val(titre)
        modal.find('#id').val(id)
        CKEDITOR.instances['HeaderContenu'].setData(contenu)
    })
</script>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalElement" aria-labelledby="modalElement" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="modalElementTitre">Modier l'image et le texte</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <button type="button" class="btn btn-primary modalElementSave">Save changes</button>

                    <form method="post" action="{{ route('modifElement') }}" id="modalElementForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="idElement" value />
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Titre</label>
                        <input type="text" class="form-control" id="ElementTitle" name="Title">
                        {!! $errors->first('ElementTitle', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Contenu</label>
                        <textarea class="form-control" id="ElementContenu" name="Contenu"></textarea>
                        <script>CKEDITOR.replace('ElementContenu'); // Pour utiliser l'éditeur de texte doc ici: http://docs.cksource.com/Main_Page </script>

                        {!! $errors->first('ElementContenu', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Lien</label>
                        <select class="form-control" id="ElementLien" name="Lien">
                            @foreach($pages as $page)
                                <option value="{{ $page->nom_page }}"> {{ $page->nom_page }}</option>
                            @endforeach
                                <option value="autre">Autre</option>
                        </select>
                        <input class="form-control" type="text" placeholder="ex: http://www.google.fr" name="Lien_particulier" id="ElementLien_particulier" style="display:none"/>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutPage">Ajouter une page</button>

                    </div>
                        <script>
                            $('#ElementLien').change(function(){
                                console.log('coucou');
                                if($('#ElementLien').val()=='autre'){
                                    $('#ElementLien_particulier').show();
                                }else{
                                    $('#ElementLien_particulier').hide();
                                }
                            })
                        </script>
                    <div class="form-group files">
                        <label>Changer l'image </label>
                        <input type="file" class="form-control" multiple="" name="photo">
                    </div>
                </form>
                <style>
                    .files input {
                        outline: 2px dashed #92b0b3;
                        outline-offset: -10px;
                        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        padding: 120px 0px 85px 35%;
                        text-align: center !important;
                        margin: 0;
                        width: 100% !important;
                    }
                    .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
                        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
                    }
                    .files{ position:relative}
                    .files:after {  pointer-events: none;
                        position: absolute;
                        top: 60px;
                        left: 0;
                        width: 50px;
                        right: 0;
                        height: 56px;
                        content: "";
                        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
                        display: block;
                        margin: 0 auto;
                        background-size: 100%;
                        background-repeat: no-repeat;
                    }
                    .color input{ background-color:#f1f1f1;}
                    .files:before {
                        position: absolute;
                        bottom: 10px;
                        left: 0;  pointer-events: none;
                        width: 100%;
                        right: 0;
                        height: 57px;
                        content: " Déposez le fichier ici ";
                        display: block;
                        margin: 0 auto;
                        color: #2ea591;
                        font-weight: 600;
                        text-transform: capitalize;
                        text-align: center;
                    }
                </style>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{ route('delElement') }}" style="margin-right: 50%">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="supprModalId_contenu_element">
                    <input type="submit" class="btn btn-danger" id="SupprElement" value="Suppr Element">
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary modalElementSave">Save changes</button>

            </div>
            <script>
                $('.modalElementSave').click(function(){
                    $('#modalElementForm').submit();
                })
            </script>
        </div>
    </div>
</div>
<script>
    $('#modalElement').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var titre = button.data('titre') // Extract info from data-* attributes
        var contenu = button.data('contenu') // Extract info from data-* attributes
        var id = button.data('id') // Extract info from data-* attributes
        var ElementLien = button.data('lien') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#ElementTitle').val(titre)
        modal.find('#idElement').val(id)
        modal.find('#supprModalId_contenu_element').val(id)
        modal.find('#ElementLien').val(ElementLien)
        CKEDITOR.instances['ElementContenu'].setData(contenu)
    })
</script>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalAjoutElement" aria-labelledby="modalAjoutElement" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="modalAjoutElementTitre">Ajouter un élément</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="button" class="btn btn-primary modalElementSave">Save changes</button>

                <form method="post" action="{{ route('addElement') }}" id="modalAjoutElementForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_element" id="id_element" value />
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Titre</label>
                        <input type="text" class="form-control" id="AjoutElementTitle" name="Title">
                        {!! $errors->first('AjoutElementTitle', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Contenu</label>
                        <textarea class="form-control" id="AjoutElementContenu" name="Contenu"></textarea>
                        <script>CKEDITOR.replace('AjoutElementContenu'); // Pour utiliser l'éditeur de texte doc ici: http://docs.cksource.com/Main_Page </script>
                        {!! $errors->first('AjoutElementContenu', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Lien</label>
                        <input type="text" class="form-control" id="AjoutElementLien" name="Lien">
                        {!! $errors->first('AjoutElementLien', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjoutPage">Ajouter une page</button>

                    </div>
                    <div class="form-group files">
                        <label>Changer l'image </label>
                        <input type="file" class="form-control" multiple="" name="photo">
                    </div>
                </form>
                <style>
                    .files input {
                        outline: 2px dashed #92b0b3;
                        outline-offset: -10px;
                        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        padding: 120px 0px 85px 35%;
                        text-align: center !important;
                        margin: 0;
                        width: 100% !important;
                    }
                    .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
                        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
                        transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
                    }
                    .files{ position:relative}
                    .files:after {  pointer-events: none;
                        position: absolute;
                        top: 60px;
                        left: 0;
                        width: 50px;
                        right: 0;
                        height: 56px;
                        content: "";
                        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
                        display: block;
                        margin: 0 auto;
                        background-size: 100%;
                        background-repeat: no-repeat;
                    }
                    .color input{ background-color:#f1f1f1;}
                    .files:before {
                        position: absolute;
                        bottom: 10px;
                        left: 0;  pointer-events: none;
                        width: 100%;
                        right: 0;
                        height: 57px;
                        content: " Déposez le fichier ici ";
                        display: block;
                        margin: 0 auto;
                        color: #2ea591;
                        font-weight: 600;
                        text-transform: capitalize;
                        text-align: center;
                    }
                </style>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary modalAjoutElementSave">Save changes</button>
            </div>
            <script>
                $('.modalAjoutElementSave').click(function(){
                    $('#modalAjoutElementForm').submit();
                })
            </script>
        </div>
    </div>
</div>
<script>
    $('#modalAjoutElement').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id_element = button.data('id_element') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#id_element').val(id_element)
    })
</script>

<div class="modal fade" id="modalAjoutPage" tabindex="-1" role="dialog" aria-labelledby="modalAjoutPageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAjoutPageLabel">Nouvelle Page</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('addPage') }}" id="modalAjoutPageForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="titrePage" class="col-form-label">Titre de la page</label>
                        <input class="form-control" type="text" name="titrePage" id="titrePage"/>

                    </div>
                    <div class="form-group">
                        <label for="titrePage" class="col-form-label">Texte entête</label>
                        <textarea class="form-control" id="entete" name="entete"></textarea>
                        <script>CKEDITOR.replace('entete'); // Pour utiliser l'éditeur de texte doc ici: http://docs.cksource.com/Main_Page </script>
                    </div>
                    <div class="form-group files">
                        <label>Ajouter une image d'entête </label>
                        <input type="file" class="form-control" multiple="" name="photo_entete">
                    </div>
                    <div class="form-group">
                        <label for="AjoutPageContenu">Contenu de la page</label>
                        <textarea class="form-control" id="AjoutPageContenu" name="contenuPage"></textarea>
                        <script>CKEDITOR.replace('AjoutPageContenu'); // Pour utiliser l'éditeur de texte doc ici: http://docs.cksource.com/Main_Page </script>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="bouton_enregistrer_page" class="btn btn-primary">Enregistrer</button>
                <script>
                    $('#bouton_enregistrer_page').click(function(){
                        $('#modalAjoutPageForm').submit();
                    })
                </script>
            </div>
        </div>
    </div>
</div>