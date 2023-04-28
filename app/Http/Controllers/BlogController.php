<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::latest()->get();

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('name','ASC')->get();

        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(430, 327)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'tags' => $request->tags,
            'description' => $request->description,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.index')->with($notification);
    }

    // public function show(Blog $blog)
    // {
    // }

    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('admin.blog.edit', compact('blogs', 'categories'));
    }

    public function update(Request $request, $id)
    {

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
    
            Image::make($image)->resize(430, 327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
    
            Blog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => $request->tags,
                'description' => $request->description,
                'image' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Blog Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('blog.index')->with($notification);

        } else {

            Blog::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'tags' => $request->tags,
                'description' => $request->description,
            ]);
    
            $notification = array(
                'message' => 'Blog Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('blog.index')->with($notification);
        }

    }

    public function delete($id)
    {
        $blogs = Blog::findOrFail($id);
        $img = $blogs->image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Fontend
    // Single Blog
    public function single($id)
    {
        $blogs = Blog::findOrFail($id);
        $recentBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('frontend.single-blog',compact('blogs','recentBlogs','categories'));
    }
    // Archive Category
    public function category($id)
    {
        $blogs = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $recentBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('name','ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);

        return view('frontend.category',compact('blogs','recentBlogs','categories','categoryname'));
     }
    //  Archive Blog
     public function Blog()
     {
        $blogs = Blog::latest()->paginate(3);
        $recentBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('frontend.page-blog', compact('blogs',  'recentBlogs','categories'));
     }
}
