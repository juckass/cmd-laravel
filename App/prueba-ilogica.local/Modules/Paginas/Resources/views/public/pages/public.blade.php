@extends('paginas::public.layouts.master')

@push('css')
{!! $page->head !!}
@endpush


@section('content')
    <nav class="navbar navbar-expand-lg navbar-light navbar-floating">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="/assets/favicon.png" alt="" width="40">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-lg-5 mt-3 mt-lg-0">
                
                @foreach ($menus as $key => $item)
                    @if ($item['parent'] != 0)
                        @break
                    @endif
                    @include('paginas::public.pages.menu', ['item' => $item])
                @endforeach


                {{-- <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
                </li>
        
                <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
                </li> --}}
            </ul>
        
            </div>
        </div>
    </nav>



    
{!! $page->body !!}

@endsection
@push('scripts')
{!! $page->footer !!}
@endpush
