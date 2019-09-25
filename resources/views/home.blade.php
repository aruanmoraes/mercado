@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Painel</div>
    <div class="card-body">

        <h6>Bem vindo!</h6>
        <hr>

        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Clientes</div>
                    <div class="card-body">
                        {{$data['clientes']}}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">COMPRAS</div>
                    <div class="card-body">
                        {{$data['compras']}}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">PRODUTOS</div>
                    <div class="card-body">
                        {{$data['produtos']}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop