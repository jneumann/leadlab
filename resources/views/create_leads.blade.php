@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Lead
				</div>
				<div class="panel-body">
					<form method="POST" action="/admin/leads">
						<input type="hidden" name="owner" value="{{ $user_id }}">
						<div class="form-group col-md-6">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="John" value="{{ $faker->firstName }}">
						</div>
						<div class="form-group col-md-6">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Smith" value="{{ $faker->lastName }}">
						</div>
						<div class="form-group col-md-12">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="jSmith@gmail.com" value="{{ $faker->email }}">
						</div>
						<div class="form-group col-md-6">
							<label for="phone1">Home Phone Number</label>
							<input type="tel"class="form-control" id="phone1" name="phone1" placeholder="(217) 867-5309" value="{{ $faker->phoneNumber }}"> 
						</div>
						<div class="form-group col-md-6">
							<label for="phone2">Work Phone Number</label>
							<input type="tel"class="form-control" id="phone2" name="phone2" placeholder="(217) 867-5309"> 
						</div>
						<div class="form-group col-md-4">
							<label for="income">Income</label>
							<input name="income" type="number" placeholder="100000" value="{{ $faker->numberBetween(10000, 100000) }}">
						</div>
						<div class="form-group col-md-4">
							<label for="credit_score">Credit Score</label>
							<input name="credit_score" id="credit_score"  placeholder="650" value="{{ $faker->numberBetween(350, 850) }}">
						</div>
						<hr class="col-md-12">
						<div class="form-group col-md-12">
							<label for="address1">Street Address</label>
							<input type="text" class="form-control" id="address1" name="address1" placeholder="1600 Pennsylvania Avenue" value="{{ $faker->streetAddress }}">
						</div>
						<div class="form-group col-md-12">
							<label for="address2">Street Address (Cont.)</label>
							<input type="text" class="form-control" id="address2" name="address2" placeholder="Apt 9">
						</div>
						<div class="form-group col-md-5">
							<label for="city">City</label>
							<input type="text" class="form-control" id="city" name="city" placeholder="Beverly Hills" value="{{ $faker->city }}">
						</div>
						<div class="form-group col-md-5">
							<label for="state">State</label>
							<input type="text" class="form-control" id="state" name="state" placeholder="California" value="{{ $faker->state }}">
						</div>
						<div class="form-group col-md-2">
							<label for="zip">Postal Code</label>
							<input type="text" class="form-control" id="zip" name="zip" placeholder="90210" value="{{ $faker->postcode }}">
						</div>
						<hr class="col-md-12">
						<div class="form-group col-md-12">
							<label for="notes">Notes</label>
							<textarea class="form-control" name="notes" rows="3">
							</textarea>
						</div>
						{{ csrf_field() }}
						<div class="form-group col-md-2">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
