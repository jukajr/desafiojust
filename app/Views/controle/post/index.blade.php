@extends('layouts.controle')
@section('conteudo')
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Post</h3>
  </div>
  <div class="box-body">
  	@include('includes.mensagem')
    @if(count($posts))
		<table>
			<table class="table table-striped">
			<thead>
				<tr>
					<th style="width:150px;">Imagem</th>
					<th>Título</th>
					<th>Categoria</th>
					<th  style="width:150px;">OPÇÕES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<td>
							@if(!empty($post->imagem))
								<img style="max-width: 100px;" src="/data/post/{{ $post->imagem }}">
							@endif
						</td>
						<td>{{ $post->titulo }}</td>
						<td>{{ $post->categoria }}</td>
						<td>
							<a class="btn btn-default btn-xs" href="/controle/post/form/{{ $post->id }}" data-toggle="tooltip" data-original-title="Editar" name="Editar"><i class="fa fa-edit"></i></a>
							<a class="btn btn-danger btn-xs atencao" href="#" data-href="/controle/post/delete/{{ $post->id }}" data-toggle="tooltip" data-original-title="Excluir" name="Excluir" ><i class="fa fa-trash"></i></a>
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
    <a href="/controle/post/form" class="btn btn-success pull-right">NOVO</a>
  </div>
</div>
@stop
