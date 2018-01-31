<?php

namespace App\Http\Controllers;

use App\Content as ContentModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Contents extends Controller
{
	public function __construct(Request $req) {
		$this->req = $req;
	}

	public function show($handle = '') {
		$content = ContentModel::where('handle', $handle)->take(1)->get();

		$split = preg_split('/\//', $_SERVER['PHP_SELF']);

		$raw_template = Storage::get('template/' . $split[2] . '.tmpl');

		$raw_template = str_replace('{{ title }}', $content[0]->title, $raw_template);
		$raw_template = str_replace('{{ content }}', $content[0]->content, $raw_template);

		return $raw_template;
	}
}
