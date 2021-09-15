<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CrudController extends Controller
{
    // HOW IT WORKS
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

    // ABOUT US
    public function aboutUsIndex()
    {
        $aboutus = Settings::where('key', 'about_us_main')->get();
        return view('admin.aboutus.index', compact('aboutus'));
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

    // TERMS AND CONDITIONS
    public function termsAndConditionsIndex()
    {
        $data = Settings::where('key', 'terms_and_conditions')->get();
        return view('admin.terms-and-conditions.index', compact('data'));
    }

    public function termsAndConditionsEdit($id) {
        $data = Settings::where('id', $id)->first();
        return view('admin.terms-and-conditions.edit', compact('data'));
    }

    public function termsAndConditionsUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
        ]);
        Settings::where('id', $id)->update([
            'description' => $request->description,
        ]);
        return redirect()->route('admin.termsAndConditions.index');
    }

    // PRIVACY POLICY
    public function privacyPolicyIndex()
    {
        $data = Settings::where('key', 'privacy_policy')->get();
        return view('admin.privacy-policy.index', compact('data'));
    }

    public function privacyPolicyEdit($id) {
        $data = Settings::where('id', $id)->first();
        return view('admin.privacy-policy.edit', compact('data'));
    }

    public function privacyPolicyUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
        ]);
        Settings::where('id', $id)->update([
            'description' => $request->description,
        ]);
        return redirect()->route('admin.privacyPolicy.index');
    }
}
