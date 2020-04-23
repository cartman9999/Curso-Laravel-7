@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Generos</div>

                <div class="card-body">
                    <a href="">
                        <h2>Drama</h2>
                    </a>
                    <a href="">
                        <h2>Suspenso</h2>
                    </a>
                    <a href="">
                        <h2>Terror</h2>
                    </a>
                    <a href="{{ route('peliculas.comedia', ['romantica']) }}">
                        <h2>Comedia</h2>
                    </a>
                    <a href="{{ url('/peliculas/adultos') }}">
                        <h2>Adultos</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
