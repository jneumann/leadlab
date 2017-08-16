<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class LandingPage extends Controller
{
	public function index() {
		$faker = Factory::create();

		return view('landing_page', [
			'faker' => $faker,
		]);
	}

	public function post(Request $request) {
		$lead = new Lead;

		$lead->owner = null;
		$lead->first_name = $request->first_name;
		$lead->last_name = $request->last_name;
		$lead->email = $request->email;
		$lead->phone1 = $request->phone;
		$lead->credit_score = $request->credit_score;

		$lead->save();

		return view('landing_page');
	}

	private function verification() {
		// TODO Add some sort of external verification. Possible from the following:
		// White Pages
	}
}
