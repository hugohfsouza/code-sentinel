<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarClienteRequest;
use App\Models\Cliente;
use App\Models\ClienteUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::query()->paginate(10);

        return view('clientes', [
            'clientes' => $clientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = new Cliente();
        
        return view('clientes_form', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalvarClienteRequest $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->token_acesso = $request->token_acesso;
        $cliente->save();

        return redirect()->route('clientes.index');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes_form', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalvarClienteRequest $request, Cliente $cliente)
    {
        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->token_acesso = $request->token_acesso;
        $cliente->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    /**
     * Recuperar a lista de clientes.
     */
    public function getClientesApi(Request $request)
    {
        $clientes = Cliente::all();

        return json_encode($clientes);
    }

    /**
     * Recuperar a lista de clientes.
     */
    public function getClienteApi(Request $request, $id)
    {   

        $cliente = DB::table("clientes")
            ->whereRaw('id='.$id)
            ->first();

        return json_encode($cliente);
    }


    public function cadastrarUsuarioCliente(Request $request)
    {

        $cliente = Cliente::query()->where('token_acesso', '=', $request->token_acesso)->first();

        $novoUsuario = new ClienteUsuario();
        $novoUsuario->cliente_id = $cliente->id;
        $novoUsuario->name = $request->name;
        $novoUsuario->login = $request->login;
        $novoUsuario->password = $request->password;
        $novoUsuario->permissao = $request->permissao;
        $novoUsuario->save();

        $listaUsuariosCliente = ClienteUsuario::query()->where('cliente_id', '=', $cliente->id)->get();
        return json_encode($listaUsuariosCliente);
    }

    
}
