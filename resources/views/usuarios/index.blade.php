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
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone</th>
                            <th scope="col"><a class="btn btn-primary" href="{{route('user.create')}}" role="button">Novo Usuário</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 1)
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('user.show', $user->id)}}">Visualizar</a>                                        
                                        <a class="btn btn-secondary" href="{{route('user.edit', $user->id)}}">Editar</a>
                                        <button type="button" class="btn btn-danger deletarUsuario" id="{{$user->id}}">Deletar</button>
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