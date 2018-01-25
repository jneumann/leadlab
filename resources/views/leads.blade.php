@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<ul>
						<li><a href="#">My Leads</a></li>
						<li><a href="#">All Leads</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Leads
					<div class="add_lead">
						<a href="/admin/leads/new"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Lead</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover lead_table">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Status</th>
								<th>Income</th>
								<th>Credit Score</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($leads as $lead)
							<tr data-id="{{ $lead->id }}">
								<td>{{ $lead->first_name }}</td>
								<td>{{ $lead->last_name }}</td>
								<td>{{ $lead->phone1 }}</td>
								<td>{{ $lead->email }}</td>
								<td>{{ $lead->status }}</td>
								<td>{{ $lead->income }}</td>
								<td>{{ $lead->credit_score }}</td>
							</tr>
							@empty
							<tr>
								<td colspan="7" style="text-align: center">
									No leads yet, why don't you try adding some?
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
