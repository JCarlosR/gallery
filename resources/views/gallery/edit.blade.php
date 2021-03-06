@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar galería seleccionada</div>

                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Nombre de la galería</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $gallery->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description', $gallery->description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection