@extends('admin::layouts.master')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4"> 
            <div class="card" style="">
                <img src="images/diferencia-entre-usuario-grupo-usuarios.jpeg" class="card-img-top" alt="..." style="border-bottom: 1px solid #dfdfdf; height: 200px;">
                <div class="card-body" style="min-height: 150px;">
                  <h5 class="card-title">Administrador de Usuarios</h5>
                  <p class="card-text">Administrador de Usuarios</p>
                  <a href="{{  route('user') }}" class="btn btn-primary">Administrar usuarios</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="">
                <img src="images/descarga.jpeg" class="card-img-top" alt="..." style="border-bottom: 1px solid #dfdfdf; height: 200px;">
                <div class="card-body" style="min-height: 150px;">
                  <h5 class="card-title">Administrador de páginas</h5>
                  <p class="card-text">Administrador de páginas</p>
                  <a href="{{  route('paginas') }}" class="btn btn-primary">Administrar Páginas</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="">
                <img src="images/Multimedia.jpeg" class="card-img-top" alt="..." style="border-bottom: 1px solid #dfdfdf; height: 200px;">
                <div class="card-body" style="min-height: 150px;">
                  <h5 class="card-title">Administrador de multimedia</h5>
                  <p class="card-text">Administrador de multimedia</p>
                  <a href="{{  route('media') }}" class="btn btn-primary">Administrar multimedia</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
