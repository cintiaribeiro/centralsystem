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
                            <a class="btn btn-secondary mr-2" href="{{route('user.edit', $user->id)}}" role="button">Editar</a>
                            <button type="button" class="btn btn-danger deletarUsuario" id="{{$user->id}}">Deletar</button>
                        </div>
                    </div>    
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <strong>Nome</strong> : <span>{{$user->name}}</span>
                            </div>
                            <div class="col">
                                <strong>Email</strong> : <span>{{$user->email}}</span>
                            </div>
                            <div class="col">
                                <strong>Telefone</strong> : <span>(21) 9 9559-9087</span>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Naticias</th>
                                    <th scope="col">Publicação</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @isset($user->noticias)
                                        @foreach ($user->noticias as $noticia)                                            
                                            <tr>
                                                <th scope="row">{{$noticia->id}}</th>
                                                <td>{{$noticia->titulo}}</td>
                                                <td>{{$user->create_at}}</td>
                                                <td>                                                                                        
                                                    <a class="btn btn-secondary" href="{{route('user.edit', $noticia->id)}}">Visualizar</a>                                                
                                                </td>                                   
                                            </tr>
                                        @endforeach
                                    @endisset                                                                                               
                                </tbody>
                              </table>
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