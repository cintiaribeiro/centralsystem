@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                    
                    <div class="d-flex justify-content-around">
                        <a href="{{route('user.index')}}" class="dash">Usuários</a>
                        <a href="{{route('news.index')}}" class="dash">Notícias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
