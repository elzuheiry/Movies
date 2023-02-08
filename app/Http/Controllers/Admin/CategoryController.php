<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(["role:superadmin||admin"]);
    }

    public function index()
    {
        return view("admin.categories.index", [
            "categories" => Category::latest()->get(),
        ]);
    }

    public function create()
    {
        return view("admin.categories.create");
    }

    public function store(CategoryRequest $request)
    {
        $attribute = $request->validated();
        $attribute["slug"] = Str::slug($request->title, "-");
        Category::create($attribute);

        return redirect()->route("admin.categories.index");
    }


    public function edit(Category $category)
    {
        return view("admin.categories.edit", [
            "category" => $category
        ]);
    }

    
    public function update(CategoryRequest $request, Category $category)
    {
        $attribute = $request->validated();

        $category->update($attribute);
        return redirect()->route("admin.categories.index");
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("admin.categories.index");        
    }
}