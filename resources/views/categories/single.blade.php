@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Category
				</div>
				<div class="panel-body">
					@if (!empty($category['id']))
					<form method="POST" action="/admin/categories/{{ $category['id'] }}" class="row">
					@else
					<form method="POST" action="/admin/categories" class="row">
					@endif
						<div class="form-group col-md-12">
							@if (isset($category['title']))
							<input type="text" class="form-control" id="title" name="title" placeholder="Category Title" value="{{ $category['title'] }}">
							@else
							<input type="text" class="form-control" id="title" name="title" placeholder="Category Title" value="">
							@endif
						</div>
						<div class="form-group col-md-12">
							@if (isset($category['description']))
							<textarea name="description" class="form-control" rows="5">{{ $category['description'] }}</textarea>
							@else
							<textarea name="description" class="form-control" rows="5"></textarea>
							@endif
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
