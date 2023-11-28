@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    <form method="post" action="{{ route('clientes.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{$cliente->nome}}" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" value="{{$cliente->email}}" name="email">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" value="{{$cliente->telefone}}" name="telefone">
        </div>

        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="number" step="0.01" class="form-control" id="saldo" name="saldo" value="{{$cliente->saldo}}">
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{$cliente->cpf}}">
        </div>

        <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" value="{{$cliente->rg}}">
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" value="{{$cliente->data_nascimento}}" name="data_nascimento">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
