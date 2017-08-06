@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('notification'))
                    <div class="alert alert-success">
                        {{ session('notification') }}
                    </div>
                    @endif

                    <p>Bienvenido {{ auth()->user()->name }} :)</p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Galerías</div>

                <div class="panel-body">
                    <a href="/galleries/create" class="btn btn-primary">Nueva galería</a>

                    <ul>
                        @foreach ($galleries as $gallery)
                            <li>
                                <a href="/galleries/{{ $gallery->id }}">
                                    {{ $gallery->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
