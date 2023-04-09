<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Image;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::latest()->get();

        return view('admin.portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ], [
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',
        ]);

        $image = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
        $save_url = 'upload/portfolio/' . $name_gen;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Portfolio Inserted Successfully',
            'alert-type' => 'success'
        );

        return to_route('portfolio.index')->with($notification);
    }

    public function edit($id)
    {
        $editData = Portfolio::findOrFail($id);
        
        return view('admin.portfolio.edit', compact('editData'));
    }

    public function update(Request $request)
    {
        $portfolio_id = $request->id;

        if ($request->file('portfolio_image')) {
            $image = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(1020, 519)->save('upload/portfolio/' . $name_gen);
            $save_url = 'upload/portfolio/' . $name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Portfolio Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return to_route('portfolio.index')->with($notification);
        } else {
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);

            $notification = array(
                'message' => 'Portfolio Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return to_route('portfolio.index')->with($notification);
        }
    }

    public function delete($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $img = $portfolio->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Image Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);     
    }

    public function single($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('frontend.single-portfolio', compact('portfolio'));
    }

    public function Portfolio()
    {
        $portfolio = Portfolio::latest()->get();

        return view('frontend.page-portfolio', compact('portfolio'));
    }
}
