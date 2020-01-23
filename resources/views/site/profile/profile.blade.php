@extends('site.layouts.app')

@section('title', 'Meu Perfil')

@section('content')
<h1>Meu Perfil</h1>

<div class="row">
   @include('admin.includes.alerts')
</div>

<div class="row">
    <div class="col-6">

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" value="{{ auth()->user()->name }}" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" value="{{ auth()->user()->email }}"  placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input class="form-control" type="password" name="password" placeholder="Senha">
            </div>
            <div class="form-group">
                @if (auth()->user()->image != null)
                    <img src="{{ asset('storage/users/'.auth()->user()->image)}}" alt="{{ auth()->user()->image }}">
                @endif
                <label for="image">Foto</label>
                <input class="form-control" type="file" name="image" placeholder="Imagem">
            </div>
            <button class='form-control btn btn-primary' type="submit">Atualizar Dados</button>
        </form>
    </div>
</div>

@endsection
