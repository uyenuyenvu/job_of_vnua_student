<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        die();
        $categories = Category::all();
        $posts = Post::all();
        $companies = Company::all();
        return view('home')->with([
            'categories'=>$categories,
            'posts'=>$posts,
            'companies'=>$companies
        ]);
    }
}
