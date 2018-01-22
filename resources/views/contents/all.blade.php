@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<ul>
						<li><a href="/contents?type=page">Pages</a></li>
						<li><a href="/contents?type=post">Posts</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					@if ($type != '') 
					{{ $type }}
					@else
					Contents
					@endif
					<div class="add_content">
						<a href="/contents/new"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Contents</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover content_table">
						<thead>
							<tr>
								<th>Title</th>
								<th>Handle</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($contents as $content)
							<tr data-id="{{ $content->id }}">
								<td>{{ $content->title }}</td>
								<td>{{ $content->handle }}</td>
							</tr>
							@empty
							<tr>
								<td colspan="6" style="text-align: center">
									No contents yet, why don't you try adding some?
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
