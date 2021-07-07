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
                    <form method="POST" action="{{ route('guardar.menu') }}"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="ids" >
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre"  name="nombre" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Slug">Slug Página</label>
                                <select id="slug" class="form-control" name="slug">
                                    <option  value="">Seleccione</option>

                                    @foreach($paginas as $pagina)
                                        <option  value="{{ $pagina }}">{{$pagina}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Orden</label>
                                <input type="number" class="form-control" id="orden" placeholder="orden" name="orden" required>
                            </div>
                            
                        </div>

                        <hr>

                        <div class="form-group">
                            <center><div class="">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
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
                <div class="card-header">{{ __('Menu items') }}</div>

                <div class="card-body ">
                    <table class="table dataTable table-bordered table-hover" id="datatable" style="text-align: center;">
                        <thead>
                        <th>Nombre</th>
                        <th>slug</th>
                        <th>Orden</th>
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
    
    const url_datatable = "{{  route('datatable.menu') }}";
    const url_eliminar = "{{  route('eliminar.menu') }}";
    const url_editar = "{{  route('editar.menu') }}";

</script>
<script src="{{ asset('js/menu/menu.js') }}" ></script>

@endpush
