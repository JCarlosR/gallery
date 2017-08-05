@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <img src="{{ auth()->user()->social_image }}" alt="Imagen de perfil">
                    <p>Bienvenido {{ auth()->user()->name }} :)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
