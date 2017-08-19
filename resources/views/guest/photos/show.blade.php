@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $photo->name }}</div>

                    <div class="panel-body">
                        <img src="/images/photos/{{ $photo->file_name }}"
                             alt="Foto {{ $photo->name }}" class="img-responsive">
                        <p>{{ $photo->description }}</p>
                        <p>
                            <em>
                                Esta foto le pertenece a
                                <a href="/{{ '@' . $user->username }}">
                                    {{ $user->username }}
                                </a>
                            </em>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Comentarios de la foto</div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach ($photo->comments as $comment)
                            <li class="list-group-item">
                                <img src="{{ $comment->user->social_image }}" alt="Imagen de perfil" class="img-sm img-circle">
                                <p>{{ $comment->user->name }}</p>
                                <p>{{ $comment->content }}</p>
                            </li>
                            @endforeach
                            <li class="list-group-item" id="item-new-comment">
                                <form action="/photos/{{ $photo->id }}/comments" method="post">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" name="content" class="form-control" placeholder="Escribe un mensaje ..." aria-describedby="basic-button">
                                        <span class="input-group-btn" id="basic-button">
                                            <button class="btn btn-primary">Enviar</button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.Echo.channel('comments').listen('CommentCreated', function (data) {
            // console.log(data);
            const comment = data.comment;
            const user = data.user;
            var commentHtml = '<li class="list-group-item">';
            commentHtml += '<img src="'+user.social_image+'" alt="Imagen de perfil" class="img-sm img-circle">';
            commentHtml += '<p>'+user.name+'</p>';
            commentHtml += '<p>'+comment.content+'</p>';
            commentHtml += '</li>';
            $('#item-new-comment').before(commentHtml);
        });
    </script>
@endsection
