@extends('adminlte::page')

@section('title', 'Historico de Movimentaçẽos')

@section('content_header')

<h1>Saldo</h1>

<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class=""> -> Balance</li>
    <li class="active"> -> Histórico</li>
</ol>

@stop

@section('content')
<div class="col">

    <div class="card card-solid">
        <div class="card-header">
            <form action="{{ route('historic.search')}}" method="post" class='form form-inline'>
                @csrf
                <input type="text" name="id" class='form-control' placeholder="ID">
                <input type="date" name="date" class=  'form-control'>
                <select name="type" class='form-control'>
                    <option value="">>-- Selecione --<</option>
                    @foreach ($types as $key => $type)
                    <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                </select>
                <button class='btn btn-primary form-control' type="submit">Pesquisar</button>
            </form>
        </div>
        <div class="card-body">
            <table class='table table-striped table-bordered table-hover text-center'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>?Sender?</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($historics as $historic)

                    <tr>
                        <td>{{ $historic->id }}</td>
                        <td>{{ number_format($historic->amount, 2, ',','.') }}</td>
                        <td>{{ $historic->type($historic->type) }}</td>
                        <td>{{ $historic->date }}</td>
                        <td>
                            @if( $historic->user_id_transaction )
                            {{ $historic->userSender->name }}
                            @else
                            -
                            @endif

                        </td>
                    </tr>
                    @empty
                    <p>Sem Dados de historico.</p>
                    @endforelse
                </tbody>
            </table>
            @if (isset($dataForm))
            {!! $historics->appends($dataForm)->links() !!}
            @else
            {!! $historics->links() !!}
            @endif

        </div>
    </div>
</div>
@stop
