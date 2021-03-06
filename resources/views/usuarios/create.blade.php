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
                            Cadastro de Usuário                       
                        </div>
                        <a href="{{route('user.index')}}" class="btn voltar">Voltar</a>
                    </div>    
                    <div class="card-body">
                        <form method="POST" action="{{route('user.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>                                      
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>                                      
                            <button type="submit" class="btn btn-primary submit">Salvar</button>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection