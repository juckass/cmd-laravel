@extends('admin::layouts.master')


@push('css')

@endpush

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">{{ __('Carga de archivos') }}</div>
                <div class="card-body ">
                    <form method="POST" action="{{ route('guardar.media') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="file">
                            <label class="custom-file-label" for="customFile">Carga de Archivo</label>
                        </div>
                        <hr>
                        <div class="form-group">
                            <center><div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Subir archivos') }}
                                </button>
                            </div></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body ">
                    <table class="table dataTable table-bordered table-hover" id="datatable" style="text-align: center;">
                        <thead>
                        <th>slug</th>
                        <th>archivo</th>
                        <th>Opciones</th>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

<script>
    
    const url_datatable = "{{  route('datatable.media') }}";
    const url_eliminar = "{{  route('eliminar.media') }}";
    const url = "{{  url('/') }}";

</script>
<script src="{{ asset('js/media/media.js') }}" ></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            // $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });
</script>
@endpush
