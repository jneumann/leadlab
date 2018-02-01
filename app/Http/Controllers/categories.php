<?php

namespace App\Http\Controllers;

use App\Categories as CategoryModel;
use Illuminate\Http\Request;

class categories extends Controller
{
    public function __construct() {
			$this->middleware('auth');
    }

    public function index()
    {
			$categories = CategoryModel::get();

			return view('categories/all', [
				'categories' => $categories
			]);
    }

    public function create()
    {
			return view('categories/single', [
				'category' => [],
			]);
    }

    public function store(Request $request)
    {
			$model = new CategoryModel;

			$model->title = $request->title;
			$model->description = $request->description;

			$model->save();

			return $this->index();
    }

    public function show($id)
    {
			$category = CategoryModel::where('id', $id)->first();

			return view('categories/single', [
				'category' => $category,
			]);
    }

    public function update(Request $request, $id)
    {
			$model = CategoryModel::find($id);

			$model->title = $request->title;
			$model->description = $request->description;

			$model->save();

			return $this->index();
    }

    // public function destroy($id) { }
}
