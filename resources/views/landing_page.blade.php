<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

		 <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Open+Sans+Condensed:300|Yanone+Kaffeesatz:700" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/landing_page.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
			<div class="container">
				<div class="jumbotron">
					<div class="row">
						<div class="col-sm-12">
							<h1>Find Your Mortgage Broker Today!</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-8 col-md-6 col">
							<div class="content">
								<p>
								Buying a home is a large investment, but we help you by making the process of getting a mortgage quicker and eaiser. We have one of the largest networks of lenders in the area. Wherever you are in your life, we have the right lender for you. We specialize in home buyers with low credit scores.
								</p>
								<p>
								We are a mortgage broker, that means that we specialize in helping you get your home mortgage. Banks and credit unions are great for some things, but when it comes to mortgages they just want your money. We will help you through the home buying process, because this is what we do all the time.
								</p>
								<p>
								Is this your first time buying a house? That's ok, we will help you out. Buying a house can be a scary process, but geting a mortgage doesn't have to be. We will help you every step of the way. There are no surprises when you work with us, we are up front with what we need from you and there are no surprises when you work with us.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<form method="POST">
								<div class="form-group">
									<label for="first_name">First Name</label>
									<input type="text" class="form-control" name="first_name" placeholder="John" value="{{ $faker->firstName }}">
								</div>
								<div class="form-group">
									<label for="last_name">Last Name</label>
									<input type="text" class="form-control" name="last_name" placeholder="Doe" value="{{ $faker->lastName }}">
								</div>
								<div class="form-group">
									<label for="email">Email Address</label>
									<input type="email" class="form-control" name="email" placeholder="jDoe@gmail.com" value="{{ $faker->email }}">
								</div>
								<div class="form-group">
									<label for="phone">Phone Number</label>
									<input type="tel" class="form-control" name="phone" placeholder="(815) 867-5309" value="{{ $faker->phoneNumber }}">
								</div>
								<div class="form-group">
									<label for="credit_score">Credit Score</label>
									<select name="credit_score" class="form-control">
										<option value="<400">Under 400</option>
										<option value="400">400-500</option>
										<option value="500" selected>500-600</option>
										<option value="600">600-700</option>
										<option value="700+">700+</option>
									</select>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default">Find a Lender</button>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="offering">
								<h2>What we offer</h2>
								<ul>
									<li>Competitive rates for real estate purchases, refinances and construction</li>
									<li>Fixed rate and adjustable rate mortgages</li>
									<li>100% Financing with USDA Rural Housing Loans</li>
									<li>Construction loans</li>
									<li>FHA/VA loans</li>
									<li>Personalized and attentive service from beginning to end</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="calculator">
								<h2>How much home can you afford?</h2>
								<div class="row">
									<div class="input">
										<div class="col-sm-4 col-xs-6">
											<h3>Down Payment</h3>
											$ <input class="down_payment" type="number" min="0" value="5000"> 
										</div>
										<div class="col-sm-4 col-xs-6">
											<h3>Monthly Payment</h3>
											 $<input class="monthly_payment" type="number" min="0" max="5000" value="750">
										</div>
										<div class="col-sm-4 col-xs-12">
											<h3>Interst Rate</h3>
											<input class="interest_rate" type="number" min="0" max="10" value="3.5"> %
										</div>
									</div>
								</div>
								<div class="row">
									<div class="total">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/landing_page.js') }}"></script>
</body>
</html>
