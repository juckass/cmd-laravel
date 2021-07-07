@extends('admin::layouts.master')

@section('content')
    
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="container">
    <div class="card">
        <div class="card-header tealBG">
            <span class="card-title">Listado de Usuarios</span>
            <span class="float-right elevation-1"><a class="btn btn-sm btn-success" href="{{ route('crear.user')    }}"><i class="fa fa-plus-circle"></i> Nuevo</a> </span>
        </div>
        <div class="card-body">
            <table class="table dataTable table-bordered table-hover" id="datatable" style="text-align: center;">
                <thead>
                <th>Nombre</th>
                <th>Email</th>
                <th>Opciones</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@push('scripts')
<script>
    
        var url_datatable = "{{  route('datatable.user') }}";
        var url_eliminar = "{{  route('delete.user') }}";
        var url_editar =  "{{ route('edit.user', [0]) }}";
    
</script>

<script src="{{ asset('js/user/user.js') }}" ></script>


@endpush
