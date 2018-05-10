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
                <form method="post" action=" {{ route('modifElement') }}" id="modalHeaderForm"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    {{--<input type="hidden" name="_method" value="put" />--}}
                    <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Titre</label>
                                <input type="text" class="form-control" id="HeaderTitle" name="HeaderTitle">
                                {!! $errors->first('HeaderTitle', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Contenu</label>
                                <textarea class="form-control" id="HeaderContenu" name="HeaderContenu"></textarea>
                                <script>CKEDITOR.replace('HeaderContenu'); // Pour utiliser l'éditeur de texte doc ici: http://docs.cksource.com/Main_Page </script>

                                {!! $errors->first('HeaderContenu', '<div class="alert alert-danger col-md-6" role="alert">:message</div>') !!}
                            </div>

                            <div class="form-group files">
                                <label>Changer l'image de fond </label>
                                <input type="file" class="form-control" multiple="" name="photo">
                            </div>
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
                </form>
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