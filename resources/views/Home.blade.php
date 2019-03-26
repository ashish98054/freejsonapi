@extends('Shared/Layouts/Master')

@section('navigation')
@include('Shared/Partials/Navigation')
@endsection

@section('content')
<section class="hero">
	<h1>Free JSON API</h1>
	<h2>Real quick api for building your client application</h2>
<pre>
<code class="language-javascript">
fetch('https://freejsonapi.com/posts/1')
	.then(response => response.json())
	.then(json => console.log(json))
</code>
</pre>
<button type="button" class="btn btn-light">Try it</button>
</section>

<section class="section section-demo-free-json-api">
<h2 class="title">using freejsonapi</h2>
<article>
<div>
	<p>
		freejsonapi has a complete set of api resources for making a full fledged application.
	</p>
	<table class="table table-borderless">
	<tbody>
		<tr>
			<td><a href="#">/posts</a></td>
			<td>200 posts</td>
		</tr>
		<tr>
			<td><a href="#">/posts/1/comments</a></td>
			<td>30 comments on every single post</td>
		</tr>
		<tr>
			<td><a href="#">/users</a></td>
			<td>200 users</td>
		</tr>
		<tr>
			<td><a href="#" class="disabled">/login</a></td>
			<td>user authentication</td>
		</tr>
		<tr>
			<td><a href="#" class="disabled">/register</a></td>
			<td>user registration</td>
		</tr>
	</tbody>
	</table>
</div>
</article>
</section>
@endsection