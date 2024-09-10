<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Clientes</h2>
                <a href="/clientes/create" class="btn btn-primary">Novo Cliente</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th style="width:200px">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($clientes as $cliente )
                      <tr>
                        <th scope="row">{{$cliente->id}}</th>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->endereco}}</td>
                        <td>
                          <a href="/clientes/{{$cliente->id}}/edit" class="btn btn-sm btn-primary">Editar</a>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>

            <div class="card mt-4">
              <div class="card-body">
                {{ $clientes->links() }}
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
