<?php

namespace App\Http\Controllers;

use App\Content as ContentModel;
use App\Categories;
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
			$categories = Categories::get();

			return view('contents/single', [
				'user_id' => Auth::id(),
				'content' => [],
				'categories' => $categories,
			]);
		}

		public function edit($id) {
			$content = ContentModel::where('id', $id)
				->first();

			$categories = Categories::get();

			return view('contents/single', [
				'user_id' => Auth::id(),
				'content' => $content,
				'categories' => $categories,
			]);
		}

		public function update($id) {
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
