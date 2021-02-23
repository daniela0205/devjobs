<?php

namespace App\Http\Controllers;

use App\Category;
use App\Position;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function show(Category $category)
    {
        $positions = Position::where('category_id', $category->id)->where('active',true)->paginate(10);

        return view('category.show', compact('positions', 'category'));
    }


}
