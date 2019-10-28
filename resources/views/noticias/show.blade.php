@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif                
                <div class="card">
                    <div class="card-header">
                        <div class=" row justify-content-end">
                            <a class="btn btn-secondary mr-2" href="{{route('news.edit', $news->id)}}" role="button">Editar</a>
                            <button type="button" class="btn btn-danger deletarNoticia" id="{{$news->id}}">Deletar</button>
                        </div>
                    </div>    
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <strong>Publicada por: </strong> <span>{{$news->users->name}}</span>
                            </div>
                            <div class="col">
                                <strong>Publicada em: </strong> <span>{{$news->created_at}}</span>
                            </div>                            
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <p><strong>{{$news->titulo}}</strong></p>
                                <p>{{$news->noticia}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="formExcuir">
        @method('DELETE')
        @csrf
    </form> 
@endsection