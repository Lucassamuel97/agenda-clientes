@extends('layouts.app') <!-- Se você tiver um layout, adicione-o aqui -->

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Lista de Clientes</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{ route('clientes.create') }}" class="btn btn-success btn-sm">Novo cliente</a>
      </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Saldo</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefone }}</td>
                <td>{{ $cliente->saldo }}</td>
                <td>{{ $cliente->cpf }}</td>
                <td>{{ $cliente->getDataNascimentoformatada()}}</td>
                <td>
                    <!-- Adicione botões de ação aqui, como Editar e Excluir -->
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form method="POST" action="{{ route('clientes.destroy', $cliente->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection