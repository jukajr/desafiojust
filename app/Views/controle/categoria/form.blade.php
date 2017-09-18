@extends('layouts.controle')
@section('conteudo')
<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">{{ isset($categoria) ? 'Alterar' : 'Nova' }} Categoria</h3>
			</div>
			<div class="box-body">
				<form action="/controle/categoria/{{ isset($categoria) ? 'update' : 'save' }}" method="post">
					@if(isset($categoria))
						<input type="hidden" name="id" value="{{ $categoria->id }}">
					@endif
					<div class="form-group">
						<label>Nome</label>
						<input type="text" class="form-control" required="" name="nome" value="{{ isset($categoria) ? $categoria->nome : '' }}">
					</div>
					<button type="submit" class="btn btn-default">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
