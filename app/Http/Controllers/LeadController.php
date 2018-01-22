<?php

namespace App\Http\Controllers;

use App\Lead;
use DB;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function __construct() {
			$this->middleware('auth');
    }

    public function index() {
			$leads = DB::table('leads')
				->select('first_name', 'last_name', 'phone1', 'email', 'status', 'income', 'credit_score', 'id')
				->get();

			return view('leads', [
				'leads' => $leads,
			]);
    }

		public function create() {
			$faker = Factory::create();

			// TODO Figure out how to remove faker from production while keeping it in testing
			return view('create_leads', [
				'user_id' => Auth::id(),
				'faker' => $faker,
			]);
		}

		public function edit($id) {
			$lead = DB::table('leads')
				->where('id', $id)
				->first();

			return view('edit_lead', [
				'user_id' => Auth::id(),
				'id' => $id,
				'lead' => $lead,
			]);
		}

		public function update($id, Request $request) {
			$lead = Lead::find($id);

			$lead->owner = Auth::id();
			$lead->first_name = $request->first_name;
			$lead->last_name = $request->last_name;
			$lead->email = $request->email;
			$lead->phone1 = $request->phone1;
			$lead->phone2 = $request->phone2;
			$lead->income = $request->income;
			$lead->address1 = $request->address1;
			$lead->address2 = $request->address2;
			$lead->city = $request->city;
			$lead->state = $request->state;
			$lead->zip = $request->zip;
			$lead->notes = $request->notes;
			$lead->credit_score = $request->credit_score;

			$lead->save();

			return $this->index();
		}

		public function new_lead(Request $request) {
			$lead = new Lead;

			$lead->owner = $request->id || Auth::id();
			$lead->first_name = $request->first_name;
			$lead->last_name = $request->last_name;
			$lead->email = $request->email;
			$lead->phone1 = $request->phone1;
			$lead->phone2 = $request->phone2;
			$lead->income = $request->income;
			$lead->address1 = $request->address1;
			$lead->address2 = $request->address2;
			$lead->city = $request->city;
			$lead->state = $request->state;
			$lead->zip = $request->zip;
			$lead->notes = $request->notes;
			$lead->credit_score = $request->credit_score;

			$lead->save();

			return $this->index();
		}

		// TODO Update leads
		public function update_lead(Request $request) {
		}
}
