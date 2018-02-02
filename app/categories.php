<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	// TODO Add handle to categories
}
