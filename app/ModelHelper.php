<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHelper extends Model
{
	public function handleize($title) {
		$handle = strtolower($title);
		$handle = preg_replace("/'/", '', $handle);
		$handle = preg_replace('/[^a-z0-9]/', '-', $handle);
		$handle = preg_replace('/-$/', '', $handle);
		$handle = preg_replace('/^-/', '', $handle);
		$handle = preg_replace('/--*/', '-', $handle);

		return $handle;
	}
}
