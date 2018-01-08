<form action="/post/edit/{{ $data->id }}" method="post">
	<textarea name="content">{{ $data->content }}</textarea>
	{{ csrf_field() }}
	<button type="submit">Edit</button>
</form>