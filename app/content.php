<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
	// TODO look at mutators
	// https://laravel.com/docs/5.5/eloquent-mutators

	// TODO Write unit tests
	public function save(array $options=[]) {
		if (empty($options['id'])) {
			$options['id'] = $this->id;
		}
		if (empty($options['title'])) {
			$options['title'] = $this->title;
		}
		if (empty($options['content'])) {
			$options['content'] = $this->content;
		}
		if (empty($options['type'])) {
			$options['type'] = $this->type;
		}
		if (empty($options['owner'])) {
			$options['owner'] = $this->owner;
		}

		$current_contents = collect([]);
		if (array_key_exists('id', $options)) {
			$current_contents = DB::table('contents')
				->where('id', $options['id'])
				->get();
		}

		if ($current_contents->isNotEmpty()) {
			DB::table('contents')
				->where('id', $options['id'])
				->update([
					'title' => $options['title'],
					'handle' => $this->handleize($options['title']),
					'content' => $options['content'],
					'type' => $options['type'],
					'owner' => $options['owner'],
				]);
		} else {
			DB::table('contents')
				->insert([
					'title' => $options['title'],
					'handle' => $this->handleize($options['title']),
					'content' => $options['content'],
					'type' => $options['type'],
					'owner' => $options['owner'],
				]);
		}
	}

	// TODO Ensure handles are unique
	private function handleize($title) {
		$handle = strtolower($title);
		$handle = preg_replace('/[^a-z0-9]/', '-', $handle);
		$handle = preg_replace('/-$/', '', $handle);
		$handle = preg_replace('/^-/', '', $handle);

		return $handle;
	}
}
