@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Compras</div>
    <div class="card-body">

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">Compras do cliente <b>{{$data['cliente']->nome}}</b></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Produto 1</th>
                                <th>Produto 2</th>
                                <th>Produto 3</th>
                                <th>Data da compra</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['cliente']->compras as $compra)
                                <tr>
                                    <td>{{$compra->id}}</td>
                                    <td>{{$compra->livros[0]->nome}}</td>
                                    <td>{{$compra->livros[1]->nome}}</td>
                                    <td>{{$compra->livros[2]->nome}}</td>
                                    <td>{{$compra->compra}}</td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
</div>
@stop