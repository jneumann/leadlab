@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Contents
				</div>
				<div class="panel-body">
					@if (!empty($content['id']))
					<form method="POST" action="/admin/contents/{{ $content['id'] }}">
					@else
					<form method="POST" action="/admin/contents">
					@endif
						<input type="hidden" name="owner" value="{{ $user_id }}">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" id="title" name="title" placeholder="John" value="{{ $content['title'] }}">
						</div>
						<div class="form-group col-md-12">
							<textarea name="contents" class="form-control" name="notes" rows="5">{{ $content['content'] }}</textarea>
						</div>
						<div class="form-group col-md-12">
							<label for="post_type">Post Type</label>
							<select class="custom-select" id="post_type" name="post_type">
								<option value="page">Page</option>
								<option value="post">Post</option>
								<option value="landing page">Landing Page</option>
							</select>
						</div>
						{{ csrf_field() }}
						<div class="form-group col-md-2">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
