@extends('adminlte::page')

@section('title', 'Confirmar Transferencia')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class=""> -> Balance</li>
        <li class=""> -> Transferencia</li>
        <li class="active"> -> confirmar</li>
    </ol>
    <hr>

@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3>Confirmar Transferencia de saldo</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <p>
                <strong>Recebedor: </strong> {{ $sender->name }}</p>
            <p>
                <strong>Saldo Atual R$: </strong> {{ number_format($balance->amount,2,',','') }}</p>
            <form method="POST" action="{{ route('transfer.store') }}">
                @csrf
                <input type="hidden" name="sender_id" value={{$sender->id}}>
                <div class="form-group">
                    <input class='form-control' type="text" name='value' placeholder="Valor">
                </div>
                <div class="form-group">
                    <button class='btn btn-warning' type="submit">Transferir</button>
                </div>
            </form>
        </div>
    </div>

@stop
