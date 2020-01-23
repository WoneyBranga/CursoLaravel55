@extends('adminlte::page')

@section('title', 'AdminPage')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class=""> -> Balance</li>
        <li class="active"> -> Recarga</li>
    </ol>
    <hr>

    <h1 >Fazer uma Recarga</h1>
@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3>Fazer Recarga</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('deposit.store') }}">
                @csrf
                <div class="form-group">
                    <input class='form-control' type="text" name='value' placeholder="Valor Recarga">
                </div>
                <div class="form-group">
                    <button class='btn btn-success' type="submit">Recarregar</button>
                </div>
            </form>
        </div>
    </div>

@stop
