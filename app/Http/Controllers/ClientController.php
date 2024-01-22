<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
class ClientController extends Controller
{
    public function index()
    {
        $clientes = Client::all();

        return view('client.index', compact('clientes'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $Client = new Client;
        $Client->nome = $request->nome;
        $Client->email = $request->email;
        $Client->telefone = $request->telefone;
        $Client->saldo = $request->saldo;
        $Client->cpf = $request->cpf;
        $Client->rg = $request->rg;
        $Client->data_nascimento = $request->data_nascimento;

        $Client->save();
        
        return redirect()->route('clientes.index');
    }

    public function edit(Client $cliente)
    {
        return view('client.edit', compact('cliente'));
    }

    public function update(Request $request, Client $cliente)
    {
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->saldo = $request->saldo;
        $cliente->cpf = $request->cpf;
        $cliente->rg = $request->rg;
        $cliente->data_nascimento = $request->data_nascimento;

        $cliente->save();

        return redirect()->route('clientes.index');
    }

    public function destroy(Client $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}
