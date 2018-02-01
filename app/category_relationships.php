<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class category_relationships extends Model
{
	// public function content() {
	// 	return $this->belongsToMany('App\content');
	// }

	public function save(array $options = [], $id = null) {
		if (isset($options['id'])) {
			$this->where('content_id', $options['id'])->delete();
		}

		if (!is_array($options['category'])) {
			return true;
		}

		$id = (isset($id) ? $id : $options['id']);

		foreach ($options['category'] as $k => $cat) {
			DB::table('category_relationships')->insert(
				[
					'categories_id' => $cat,
					'content_id' => $id,
				]
			);
		}
	}
}
