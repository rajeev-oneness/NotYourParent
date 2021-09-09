<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CrudController extends Controller
{
    public function howToWorkIndex()
    {
        $howitworks = Settings::where('key', 'how_it_works_child')->orWhere('key', 'how_it_works_main')->get();
        return view('admin.howitworks.index', compact('howitworks'));
    }

    public function howToWorkEdit($id) {
        $howitworks = Settings::where('id', $id)->first();
        return view('admin.howitworks.edit', compact('howitworks'));
    }

    public function howToWorkUpdate(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('image')) {
            $oldImage = public_path(Settings::find($id)->image);
            File::delete($oldImage);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('front/images/'), $fileName);
            $image ='front/images/'.$fileName;
            Settings::where('id', $id)->update([
                'image' => $image,
            ]);
        }
        Settings::where('id', $id)->update([
            'heading' => $request->heading,
            'description' => $request->description,
            'link' => $request->link,
        ]);
        return redirect()->route('admin.howItWorks.index');
    }

    public function aboutUsIndex()
    {
        $aboutus = Settings::where('key', 'about_us_main')->get();
        return view('admin.aboutUs.index', compact('aboutus'));
    }

    public function aboutUsEdit($id) {
        $aboutus = Settings::where('id', $id)->first();
        return view('admin.aboutus.edit', compact('aboutus'));
    }

    public function aboutUsUpdate(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('image')) {
            $oldImage = public_path(Settings::find($id)->image);
            File::delete($oldImage);
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('front/images/'), $fileName);
            $image ='front/images/'.$fileName;
            Settings::where('id', $id)->update([
                'image' => $image,
            ]);
        }
        Settings::where('id', $id)->update([
            'heading' => $request->heading,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.aboutUs.index');
    }
}
