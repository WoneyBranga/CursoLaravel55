@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')

<h1>Saldo</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class=""> -> Balance</li>
    <li class="active"> -> Saldo</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-solid">
            <div class="card-header">
                <a href="{{ route('balance.deposit')}}" class="btn btn-primary"><i class="fas fa-money-check-alt"></i> Recarregar</a>
                @if($amount > 0)
                <a href="{{ route('balance.withdraw')}}" class="btn btn-danger"><i class="fas fa-money-check-alt"></i> Sacar</a>
                <a href="{{ route('balance.transfer')}}" class="btn btn-warning"><i class="fas fa-cart-arrow-down"></i> Transferir</a>
                @endif
            </div>
            <div class="card-body">
                @include('admin.includes.alerts')
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>R$ {{ number_format($amount,2,'.','')}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer">Histórico <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
