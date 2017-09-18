@extends('layouts.controle')
@section('styles')
<link rel="stylesheet" href="/assets_controle/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@stop
@section('conteudo')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">{{ isset($post) ? 'Alterar' : 'Novo' }} Post</h3>
			</div>
			<div class="box-body">
				<form action="/controle/post/{{ isset($post) ? 'update' : 'save' }}" method="post" enctype="multipart/form-data">
					@if(isset($post))
						<input type="hidden" name="id" value="{{ $post->id }}">
					@endif
					<div class="form-group">
						<label>Título</label>
						<input type="text" class="form-control" required="" name="titulo" value="{{ isset($post) ? $post->titulo : '' }}">
					</div>
					<div class="form-group">
						<label>Categoria</label>
						<select class="form-control" required="" name="categoria_id">
							<option value="">Selecione</option>
							@foreach($categorias as $categoria)
							<option value="{{ $categoria->id }}" {{ isset($post) && $post->categoria_id == $categoria->id ? 'selected' : ''}}>{{ $categoria->nome }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Imagem</label>
						<input type="file" name="imagem">
					</div>
					<div class="form-group">
						<label>Texto</label>
						<textarea name="texto" class="form-control textarea">
							{{ isset($post) ? $post->texto : '' }}
						</textarea>
					</div>
					<button type="submit" class="btn btn-default">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')
<script src="/assets_controle/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    $('.textarea').wysihtml5()
  })
</script>
@stop
