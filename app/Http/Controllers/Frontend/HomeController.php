<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        $list_posts=[];
        foreach ($posts as $post){
            $list_posts[$post->id]['info'] = $post;
            $list_posts[$post->id]['image'] = Company::find($post['company_id'])->logo;;
        }
        $companies = Company::all();
        return view('frontend.page.home')->with([
            'categories'=>$categories,
            'posts'=>$list_posts,
            'companies'=>$companies
        ]);
    }

}
