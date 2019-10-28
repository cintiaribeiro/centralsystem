@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Publicada por</th>
                            <th scope="col">Publicada em</th>
                            <th scope="col"><a class="btn btn-primary" href="{{route('news.create')}}" role="button">Nova Notícia</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($noticias) > 1)
                            @foreach ($noticias as $noticia)
                                <tr>
                                    <th scope="row">{{$noticia->id}}</th>
                                    <td>{{$noticia->titulo}}</td>
                                    <td>{{$noticia->users->name}}</td>
                                    <td>{{$noticia->created_at}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('news.show', $noticia->id)}}">Visualizar</a>                                        
                                        <a class="btn btn-secondary" href="{{route('news.edit', $noticia->id)}}">Editar</a>
                                        <button type="button" class="btn btn-danger deletarNoticia" id="{{$noticia->id}}">Deletar</button>
                                    </td>                                   
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    Não há usuário cadastrado no sistema
                                </td>
                            </tr>
                        @endif                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="formExcuir">
        @method('DELETE')
        @csrf
    </form> 
@endsection