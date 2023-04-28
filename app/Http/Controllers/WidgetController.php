<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

class WidgetController extends Controller
{
    public function recentPost()
    {
        $recentBlogs = Blog::latest()->limit(5)->get();

        return view('frontend.sidebar.index',compact('recentBlogs'));
    }

    public function categoryList()
    {
        $categories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('frontend.sidebar.index', compact('categories'));
    }
}
