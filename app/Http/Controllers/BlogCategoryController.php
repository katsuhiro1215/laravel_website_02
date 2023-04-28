<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogcategory = BlogCategory::latest()->get();

        return view('admin.blog_category.index', compact('blogcategory'));
    }

    public function create()
    {
        return view('admin.blog_category.create');
    }

    public function store(Request $request)
    {
        BlogCategory::insert([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'ブログカテゴリーの登録に成功しました。', 
            'alert-type' => 'success'
        );

        return redirect()->route('blog_category.index')->with($notification);
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);

        return view('admin.blog_category.edit', compact('blogcategory'));
    }

    public function update(Request $request, $id)
    {
        BlogCategory::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'ブログカテゴリーの更新に成功しました。', 
            'alert-type' => 'success'
        );

        return to_route('blog_category.index')->with($notification);
    }

    public function delete($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'ブログカテゴリーの削除に成功しました。', 
            'alert-type' => 'success'
        );

        return to_route('blog_category.index')->with($notification);
    }
}
