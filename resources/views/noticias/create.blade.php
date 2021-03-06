@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Cadastro de Notícia
                        </div>
                        <a href="{{route('news.index')}}" class="btn voltar">Voltar</a>
                    </div>    
                    <div class="card-body">
                        <form method="POST" action="{{route('news.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo">
                            </div>
                            <div class="form-group">
                                <label for="noticia">Notícia</label>
                                <textarea class="form-control" id="noticia" rows="10" name="noticia" ></textarea>
                            </div>                                      
                            <button type="submit" class="btn btn-primary submit">Salvar</button>
                        </form>                       
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection