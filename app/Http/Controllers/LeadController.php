<?php

namespace App\Http\Controllers;

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
			$leads = DB::table('leads')->get();

			return view('leads', [
				'leads' => $leads
			]);
    }

		public function create() {
			$faker = Factory::create();

			return view('create_leads', [
				'user_id' => Auth::id(),
				'faker' => $faker,
			]);
		}

		public function new_lead(Request $request) {
			$data = $request->except('_token');

			array_add($data, 'created_at', date("Y-m-d H:i:s"));
			array_add($data, 'updated_at', date("Y-m-d H:i:s"));

			DB::table('leads')->insert($data);

			return $this->index();
		}
}
