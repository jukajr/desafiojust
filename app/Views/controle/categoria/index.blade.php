@extends('layouts.controle')
@section('conteudo')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Categoria</h3>
  </div>
  <div class="box-body">
  	@include('includes.mensagem')
    @if(count($categorias))
		<table>
			<table class="table table-striped">
			<thead>
				<tr>
					<th>NOME</th>
					<th  style="width:150px;">OPÇÕES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categorias as $categoria)
					<tr>
						<td>{{ $categoria->nome }}</td>
						<td>
							<a class="btn btn-default btn-xs" href="/controle/categoria/form/{{ $categoria->id }}" data-toggle="tooltip" data-original-title="Editar" name="Editar"><i class="fa fa-edit"></i></a>
							<a class="btn btn-danger btn-xs atencao" href="#" data-href="/controle/categoria/delete/{{ $categoria->id }}" data-toggle="tooltip" data-original-title="Excluir" name="Excluir" ><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
			</table>
		</table>
    @else
		Não foram encontrados registros.
    @endif
  </div>
  <div class="box-footer">
    <a href="/controle/categoria/form" class="btn btn-success pull-right">NOVO</a>
  </div>
</div>
@stop
