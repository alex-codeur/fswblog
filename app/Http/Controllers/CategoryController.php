<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function add_category(REquest $request)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:2|max:50'
        ]);

        $category = New Category();
        $category->cat_name = $request->cat_name;
        $category->save();

        return ['message' => 'OK'];
    }
}
