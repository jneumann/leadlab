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
						<a href="/leads/new"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Lead</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Status</th>
								<th>Income</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Jake</td>
								<td>Neumann</td>
								<td>(815) 867-5309</td>
								<td>thejakeneumann@gmail.com</td>
								<td>Called</td>
								<td>$70,000</td>
							</tr>
							<tr>
								<td>Aaron</td>
								<td>Cantrall</td>
								<td>(217) 555-5309</td>
								<td>acantrall@gmail.com</td>
								<td>Processing</td>
								<td>$35,000</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
