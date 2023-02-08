<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MovieRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;



class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware(["role:superadmin||admin"]);
    }

    public function index()
    {
        return view("admin.movies.index", [
            "movies" => Movie::latest()->paginate(15),
            "categories" => Category::where("status", "active")->get(),
        ]);
    }

    // 
    public function data(Request $request)
    {
        if($request->ajax()){
            return view("admin.movies.filterMovies", [
                "movies" => Movie::latest()->filter(
                    request(["search", "category", "rate"])
                )->paginate(15)
            ]);
        }
    }

    public function create()
    {
        return view("admin.movies.create", [
            "categories" => Category::where("status", "active")->get()
        ]);
    }

    public function store(MovieRequest $request)
    {
        $attribute = $request->validated();
        $attribute["user_id"] = Auth::user()->id;
        $attribute["slug"] = Str::slug($request->title, "-");

        // Storage photo of Movie
        $file_extension = request('thumbnail')->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        Image::make(request("thumbnail"))->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('upload_files/movie/' . $file_name));

        $attribute["thumbnail"] = $file_name;
        Movie::create($attribute);

        return redirect()->route("admin.movies.index");
    }


    public function edit(Movie $movie)
    {
        return view("admin.movies.edit", [
            "movie" => $movie,
            "categories" => Category::where("status", "active")->get(),
        ]);
    }

    
    public function update(MovieRequest $request, Movie $movie)
    {
        $attribute = $request->validated();

        if($request->thumbnail){
            Storage::disk('public_upload')->delete('/movie/' . $movie->thumbnail);

            // Storage photo of Movie
            $file_extension = request('thumbnail')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            Image::make(request("thumbnail"))->resize(350, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('upload_files/movie/' . $file_name));

            $attribute["thumbnail"] = $file_name;
        }

        $movie->update($attribute);
        return redirect()->route("admin.movies.index");
    }

    
    public function destroy(Movie $movie)
    {
        $movie->delete();
        Storage::disk('public_upload')->delete('/movie/' . $movie->thumbnail);
        return redirect()->route("admin.movies.index");        
    }
}