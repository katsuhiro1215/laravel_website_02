<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{

    public function edit(Footer $footer)
    {
        $footer = Footer::find(1);

        return view('admin.footer.index', compact('footer'));
    }

    public function update(Request $request)
    {
        
    }

}
