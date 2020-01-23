@extends('adminlte::page')

@section('title', 'AdminPage')

@section('content_header')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class=""> -> Balance</li>
        <li class="active"> -> Saque</li>
    </ol>
    <hr>

    <h1 >Fazer uma Saque</h1>
@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3>Fazer Saque</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="POST" action="{{ route('withdraw.store') }}">
                @csrf
                <div class="form-group">
                    <input class='form-control' type="text" name='value' placeholder="Valor Saque">
                </div>
                <div class="form-group">
                    <button class='btn btn-warning btn-block' type="submit">sacar</button>
                </div>
            </form>
        </div>
    </div>

@stop
