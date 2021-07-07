@extends('admin::layouts.master')


@push('css')
    <link href="{{ asset('librerias/jQuery-File-Upload/css/jquery.fileupload.css') }}" rel="stylesheet">
@endpush



@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">{{ __('Nueva Pagina') }}</div>

                <div class="card-body ">
                    <form method="POST" action="{{ route('guardar.pages') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="nombre_pagina" class="col-md-4"><b>{{ __('Nombre Pagina') }}</b></label>
                                <input id="nombre_pagina" type="text" class="form-control" name="titulo" value="" required autocomplete="nombre_pagina" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="slug" class="col-md-4"><b>{{ __('Url Amigable') }}</b></label>
                                <input id="slug" type="text" class="form-control" name="slug" value="" required autocomplete="nombre_pagina" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="head" class="col-md-4 col-form-label"><b>{{ __('Cabecera HTML') }}</b>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUploadFile">
                                    Cargar Archivo
                                </button>
                            </label>
                            <textarea id= "head" class="form-control" rows="6" style="width: 100%;" name="head"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cuerpo" class="col-md-4 col-form-label"><b>{{ __('Cuerpo de la pagina') }}</b></label>
                            <textarea id= "cuerpo" class="ckeditor form-control" name="body"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="footer" class="col-md-4 col-form-label"><b>{{ __('Pie HTML') }}</b> 
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUploadFile">
                                Cargar Archivo
                            </button>
                            </label>
                            <textarea id= "footer" class="form-control" rows="6" style="width: 100%;" name="footer"></textarea>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalUploadFile" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="fileupload-buttonbar">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="btn btn-success fileinput-button col-12">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Agregar Archivo...</span>
                                <input type="file" name="files[]" multiple />
                            </span>
                            <!-- The global file processing state -->
                            <span class="fileupload-process"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
@push('scripts')

<script src="{{ asset('librerias/ckeditor/ckeditor.js') }}" ></script>

<!-- The basic File Upload plugin -->
<script src="{{ asset('librerias/jQuery-File-Upload/js/vendor/jquery.ui.widget.js') }}" ></script>
<script src="{{ asset('librerias/jQuery-File-Upload/js/jquery.iframe-transport.js') }}" ></script>
<script src="{{ asset('librerias/jQuery-File-Upload/js/jquery.fileupload.js') }}" ></script>

<!-- The File Upload processing plugin -->
<script src="{{ asset('librerias/jQuery-File-Upload/js/jquery.fileupload-process.js') }}" ></script>
<!-- The File Upload validation plugin -->
<script src="{{ asset('librerias/jQuery-File-Upload/js/jquery.fileupload-validate.js') }}" ></script>
<!-- The File Upload user interface plugin -->
<script src="{{ asset('librerias/jQuery-File-Upload/js/jquery.fileupload-ui.js') }}" ></script>


<script type="text/javascript">
    $(document).ready(function () {
        //$('.ckeditor').ckeditor();

        $('#fileupload').fileupload({
            url: "{{ route('uploadFile.pages') }}",
            autoUpload: true,
        }).bind('fileuploaddone', function (e, data) {
            var files = data._response.result.files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i].replace(/^.*\/\/[^\/]+/, ''),
                    ext = /(?:\.([^.]+))?$/.exec(file)[1];
                
                if (ext) {
                    ext = ext.toLowerCase();
                    if (ext == 'js') {
                        var html = '<script src="' + file + '"><\/script>';
                        $("#footer").val($("#footer").val() + "\n" + html);
                    } else if (ext == 'css') {
                        var html = '<link type="text\/css" rel="stylesheet" href="' + file + '" \/>';
                        $("#head").val($("#head").val() + "\n" + html);
                    }
                }
            }
            $("#modalUploadFile").modal('hide');
        });
    

            $('#nombre_pagina').on('keyup', function(){
                const dato = string_to_slug( $('#nombre_pagina').val(), '-' );
                $('#slug').val(dato);
            });

            $('#slug').on('blur', function(){
                const dato = string_to_slug( $('#slug').val(), '-' );
                $('#slug').val(dato);
            });


        function string_to_slug(str, separator) {
            str = str.trim();
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            const from = "åàáãäâèéëêìíïîòóöôùúüûñç·_,:;";
            const to = "aaaaaaeeeeiiiioooouuuunc------";

            for (let i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
            }

            return str
                .replace(/[^a-z0-9 -\/]/g, "") // remove invalid chars
                .replace(/\s+/g, "-") // collapse whitespace and replace by -
                .replace(/-+/g, "-") // collapse dashes
                .replace(/^-+/, "") // trim - from start of text
                .replace(/-+$/, "") // trim - from end of text
                .replace(/-/g, separator);
        }
    });
</script>
@endpush
