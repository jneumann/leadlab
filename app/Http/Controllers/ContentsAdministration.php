<?php

namespace App\Http\Controllers;

use App\Content as ContentModel;
use DB;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// TODO Make EVERYTHING singular
class ContentsAdministration extends Contents
{
    public function __construct(Request $req) {
			$this->req = $req;
			$this->middleware('auth');
    }

		public function list() {
			if (!empty($this->req->type)) {
				$contents = DB::table('contents')
					->where('type', $this->req->type)
					->select('id', 'title', 'handle')
					->get();
			} else {
				$contents = DB::table('contents')
					->select('id', 'title', 'handle')
					->get();
			}

			return view('contents/all', [
				'contents' => $contents,
				'type' => $this->req->type,
			]);
		}

		public function create() {
			$faker = Factory::create();

			return view('contents/single', [
				'user_id' => Auth::id(),
				'content' => [
					'title' => $faker->sentence(),
					'content' => '<p>' . $faker->paragraph . '</p>',
				],
			]);
		}

		public function edit($id) {
			$contents = DB::table('contents')
				->where('id', $id)
				->first();

			return view('contents/single', [
				'user_id' => Auth::id(),
				'content' => (array) $contents,
			]);
		}

		public function update($id) {
			$contents = ContentModel::find($id);

			$contents->id = $this->req->id;
			$contents->title = $this->req->title;
			$contents->content = $this->req->contents;

			$contents->save();

			return $this->list();
		}

		public function new_content(Request $request) {
			$contents = new ContentModel;

			$contents->title = $this->req->title;
			$contents->content = $this->req->contents;
			$contents->type = $this->req->post_type;
			$contents->owner = $this->req->owner;

			$contents->save();

			return $this->list();
		}
}
