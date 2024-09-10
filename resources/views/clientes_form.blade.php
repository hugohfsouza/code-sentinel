<x-app-layout>

	<div class="mt-4">
		@if (isset($cliente->id))
			<h1>Editar Cliente</h1>
		@else
			<h1>Criar Cliente</h1>
		@endif
	</div>

   
			<form action="{{ $cliente->id ? route('clientes.update', $cliente->id) : route('clientes.store') }}" method="POST">
                @csrf
				<div class="card">
					<div class="card-body">
							@if (isset($cliente->id))
								@method('PUT')
							@endif
							

							<div class="row mt-2">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="subject">Nome<span style="color: red">*</span></label>
										<input type="text"
											class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" id="nome"
											name="nome" placeholder=""
											value="{{ $cliente->nome == '' ? old('nome') : $cliente->nome }}">
										@if ($errors->has('nome'))
											<div class="invalid-feedback" style="display: unset;">
												<div class="error">{{ $errors->first('nome') }}</div>
											</div>
										@endif
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="subject">Endereço<span style="color: red">*</span></label>
										<input type="text"
											class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" id="endereco"
											name="endereco" placeholder=""
											value="{{ $cliente->endereco == '' ? old('endereco') : $cliente->endereco }}">
										@if ($errors->has('endereco'))
											<div class="invalid-feedback" style="display: unset;">
												<div class="error">{{ $errors->first('endereco') }}</div>
											</div>
										@endif
									</div>
								</div>
							</div>

							<div class="row mt-2">
								<div class="col-12 col-md-12">
									<div class="form-group">
										<label for="subject">Token acesso<span style="color: red">*</span></label>
										<input type="password"
											class="form-control {{ $errors->has('token_acesso') ? 'is-invalid' : '' }}" id="token_acesso"
											name="token_acesso" placeholder=""
											value="{{ $cliente->token_acesso == '' ? old('token_acesso') : $cliente->token_acesso }}">
										@if ($errors->has('token_acesso'))
											<div class="invalid-feedback" style="display: unset;">
												<div class="error">{{ $errors->first('token_acesso') }}</div>
											</div>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-12">
							<div class="card shadow-sm sm:rounded-lg border-0 p-2 d-flex flex-row-reverse">
								<button type="submit" class="btn btn-success btn-sm ms-2">Salvar</button>
								<a type="button" href="{{ route('clientes.index') }}"
									class="btn btn-outline-secondary btn-sm mr-2">Cancelar</a>
				
							</div>
						</div>
					</div>

              </form>
		


	
</x-app-layout>
