@extends('layouts.site')
@section('conteudo')
<div class="row">
	<div class="span8">
		<ul class="unstyled post-list">
			@foreach($posts as $post)

			<li>
				<article class="post">
					@if(!empty($post->imagem))
					<div class="item-pic">
						<a href="/post/{{ $post->slug }}">
							<img src="/data/post/{{ $post->imagem }}">
							<span class="overlay"></span>
							<span class="item-zoom"><i class="icon-plus"></i></span>
						</a>
					</div>
					@endif
					<ul class="unstyled inline post-meta">
						<li>{{ $post->created_at }}</li>
						<li>/</li>
						<li>{{ $post->categoria }}</li>
					</ul>

					<div class="clearfix"></div>
					<h4><a href="/post/{{ $post->slug }}">{{ $post->titulo }}</a></h4>
					<p>{{ substr($post->texto, 0, 100) }}</p>
					<a href="/post/{{ $post->slug }}" class="btn btn-small btn-success">Leia +</a>
				</article><!--/.post -->
			</li>
			@endforeach
		</ul>
	</div>
	<div class="span4 sidebar">
		<div class="widget well">
			<h4 class="section-header"><span>//</span>Filtro Categorias</h4>
			<ul class="recent-posts">
				@foreach($categorias as $categoria)
				<li>
					<a href="/?categoria={{ $categoria->id }}">
						<span class="post-title">{{ $categoria->nome }}</span>
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div><!--/.sidebar -->
</div>
@stop
