@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Forwarded URLs</div>

				<div class="panel-body">
					<table>
						<tr>
							<th>Url</th>
							<th>Notes</th>
							<th></th>
						</tr>
						<tr>
							<td>ashleyholloway.org</td>
							<td></td>
							<td><a href="#" class="edit_url">Edit</a></td>
						</tr>
						<tr>
							<td>lead_lab.org</td>
							<td></td>
							<td><a href="#" class="edit_url">Edit</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
