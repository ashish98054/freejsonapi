@extends('Shared/Layouts/Master')

@section('navigation')
@include('Shared/Partials/Navigation')
@endsection

@section('content')
<section class="section hero">
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

<section class="section">
<h2 class="title">Resources</h2>
<article>
<div>
	<p>
		freejsonapi has a complete set of api resources for making a full fledged application.
	</p>
	<table class="table table-striped table-sm">
	<tbody>
		<tr>
			<td>GET</td>
			<td><a href="#posts_all">/posts</a></td>
			<td>200 posts</td>
		</tr>
		<tr>
			<td>POST</td>
			<td><a href="#posts_create">/posts</a></td>
			<td>create post</td>
		</tr>
		<tr>
			<td>GET</td>
			<td><a href="#posts_get">/posts/2</a></td>
			<td>get post</td>
		</tr>
		<tr>
			<td>PUT</td>
			<td><a href="#posts_update">/posts/2</a></td>
			<td>update post</td>
		</tr>
		<tr>
			<td>DELETE</td>
			<td><a href="#posts_delete">/posts/2</a></td>
			<td>delete post</td>
		</tr>
		<tr>
			<td>GET</td>
			<td><a href="#">/posts/1/comments</a></td>
			<td>30 comments on every single post</td>
		</tr>
		<tr>
			<td>POST</td>
			<td><a href="#">/posts/1/comments</a></td>
			<td>create comment on post</td>
		</tr>
		<tr>
			<td>PUT</td>
			<td><a href="#">/comments/1</a></td>
			<td>update comment</td>
		</tr>
		<tr>
			<td>DELETE</td>
			<td><a href="#">/comments/1</a></td>
			<td>delete comment from post</td>
		</tr>
		<tr>
			<td>GET</td>
			<td><a href="#">/users</a></td>
			<td>200 users</td>
		</tr>
		<tr>
			<td>GET</td>
			<td><a href="#">/users/1</a></td>
			<td>get user</td>
		</tr>
		<tr>
			<td>POST</td>
			<td><a href="#">/login</a></td>
			<td>user authentication</td>
		</tr>
		<tr>
			<td>POST</td>
			<td><a href="#">/register</a></td>
			<td>user registration</td>
		</tr>
	</tbody>
	</table>
</div>
</article>
</section>

<section class="section section-demo-endpoints">
<h2 class="title">How to</h2>

<article id="posts_all">
<h3 class="sub-title">Get posts</h3>
<p><span class="bg bg-light p-1">GET /posts</span> will return a paginated list of posts.</p>
<p>Optional query parameters:</p>
<ul>
	<li><span class="bg bg-light p-1">page</span> when set to a numeric value, will return paginated list of posts for given page.</li>
</ul>
<pre>
<code class="language-javascript">
GET /posts
Host: freejsonapi.com
Content-Type: application/json

{
"data": [{
	"id": 60,
	"url": "http://localhost:8000/posts/60",
	"comments_url": "http://localhost:8000/posts/60/comments",
	"title": "assdasd",
	"slug": "assdasd",
	"featured_image": "http://localhost:8000",
	"body": "jjj",
	"created_at": "2019-03-31 19:58:16",
	"updated_at": "2019-03-31 19:58:16",
	"user": {
		"data": {
			"id": 1,
			"url": "http://localhost:8000/users/1",
			"name": "Jamison Ritchie",
			"email": "danielle.tromp@example.org",
			"email_verified_at": "2019-03-23T19:18:20.000000Z",
			"created_at": "2019-03-23 19:18:20",
			"updated_at": "2019-03-31 19:56:29"
		}
	}
}],
"meta": {
	"pagination": {
		"total": 58,
		"count": 15,
		"per_page": 15,
		"current_page": 1,
		"total_pages": 4,
		"links": {
			"next": "http://localhost:8000/posts?page=2"
		}
	}
}
}
</code>
</pre>
</article>


<article id="posts_create">
<h3 class="sub-title">Create post</h3>
<p><span class="bg bg-light p-1">POST /posts</span> will create a post.</p>
<p><b><small>Example JSON request</small></b></p>
<pre>
<code class="language-javascript">
POST /posts
Host: freejsonapi.com
Content-Type: application/json
Authorization: Bearer {access_token}

{
	title: 'example title',
	body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
	featured_image : ''
}
</code>
</pre>
<p>This endpoint will return 201 Created with the current JSON representation of the post if the creation was a success. See the <a href="#posts_get">Get a post</a> endpoint for more info on the payload. 
</article>


<article id="posts_get">
<h3 class="sub-title">Get post</h3>
<p><span class="bg bg-light p-1">GET /posts/1</span> will return the post with an ID of 1</p>
<pre>
<code class="language-javascript">
GET /posts/1
Host: freejsonapi.com
Content-Type: application/json

{
"data": {
	"id": 1,
	"url": "http:\/\/localhost:8000\/posts\/2",
	"comments_url": "http:\/\/localhost:8000\/posts\/2\/comments",
	"title": "Voluptate debitis animi et voluptates.",
	"slug": "voluptate-debitis-animi-et-voluptates",
	"featured_image": "http:\/\/localhost\/storage\/post\/1FMt6dnW9wWWallxnC6zQxCTWHyZ2sh55gVduNA4.jpeg",
	"body": "Aut ut maxime iusto veniam. Itaque suscipit distinctio dolores temporibus quisquam ad porro id. Dolores maxime molestiae maiores quod est. Officia ea reiciendis est vero aut.",
	"created_at": "2019-03-23 19:18:23",
	"updated_at": "2019-03-23 19:18:23",
	"user": {
		"data": {
			"id": 22,
			"url": "http:\/\/localhost:8000\/users\/22",
			"name": "Mr. Alden Abshire III",
			"email": "utillman@example.net",
			"email_verified_at": "2019-03-23T19:18:22.000000Z",
			"created_at": "2019-03-23 19:18:22",
			"updated_at": "2019-03-23 19:18:22"
		}
	}
}
}
</code>
</pre>
</article>



<article id="posts_get">
<h3 class="sub-title">Delete post</h3>
<p><span class="bg bg-light p-1">DELETE /posts/1</span> will remove the post with an ID of 1</p>
<p><b><small>Example JSON request</small></b></p>

<pre>
<code class="language-javascript">
DELETE /posts/1
Host: freejsonapi.com
Content-Type: application/json
Authorization: Bearer {access_token}
</code>
</pre>

<p>No parameters required. Returns 204 No Content if successful.</p>
</article>


</section>
@endsection