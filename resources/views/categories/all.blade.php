@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<ul>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Categories
					<div class="add_content">
						<a href="/admin/categories/new"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Category</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover category_table">
						<thead>
							<tr>
								<th>Title</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($categories as $category)
							<tr data-id="{{ $category->id }}">
								<td>{{ $category->title }}</td>
							</tr>
							@empty
							<tr>
								<td colspan="1" style="text-align: center">
									No categories yet, why don't you try adding some?
								</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
