@extends('layouts.app')
@section('styles')
@stop
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <h1>Relação de Compras:</h1>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">Cliente: <b>{{$data['cliente']->nome}}</b></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Valor</th>
                                <th>Quantidade</th>
                                <th>Data da Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['cliente']->compra as $compra)
                                @foreach($compra->produto as $produto)
                                <tr>
                                
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->valor}}</td>
                                    <td>{{$produto->pivot->quantidade}}</td>
                                    <td>{{$compra->data}}</td>
                                    
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop