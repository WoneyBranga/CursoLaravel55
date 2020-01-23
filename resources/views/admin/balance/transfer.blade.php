@extends('adminlte::page')

@section('title', 'AdminPage')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class=""> -> Balance</li>
        <li class="active"> -> Transferencia</li>
    </ol>
    <hr>

@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3>Fazer Transferencia</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('confirm.transfer') }}">
                @csrf
                <div class="form-group">
                    <input class='form-control' type="text" name='sender' placeholder="Informação de quem vai receber valor (nome ou email)">
                </div>
                <div class="form-group">
                    <button class='btn btn-warning' type="submit">Proxima Etapa</button>
                </div>
            </form>
        </div>
    </div>

@stop
