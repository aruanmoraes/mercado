@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Produtos</div>
    <div class="card-body">

        <div class="col-md-12">
            <div class="text-right">
                <a href="{{url('produtos/create')}}" class="btn btn-success">Novo Produto</a>
                <a href="{{url('emprestimos/create')}}" class="btn btn-primary">Nova Compra</a>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">Produtos Ativos</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan='3'>Nome</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['produtosAtivos'] as $produto)
                                <tr>
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->valor}}</td>

                                    <td><a href="{{url('produtos/'.$produto->id.'/compras')}}" class="btn btn-info">Compras</td>
                                    <td><a href="{{url('produtos/'.$produto->id.'/edit')}}" class="btn btn-warning">Editar</td>
                                    <td>
                                        <form action="{{url('produtos', [$produto->id])}}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                                <input type="submit" class="btn btn-danger" value="Desativar"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">produtos Inativos</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['produtosInativos'] as $produto)
                                <tr>
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->valor}}</td>
                                    
                                    <td>
                                        <form action="{{url('produtos', [$produto->id])}}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                                <input type="submit" class="btn btn-success" value="Ativar"/>
                                        </form>
                                    </td>
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