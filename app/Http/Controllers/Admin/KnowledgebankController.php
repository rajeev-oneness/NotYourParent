<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Knowledgebank;
use App\Models\Knowledgebankcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class KnowledgebankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledgebank = Knowledgebank::join('knowledgebankcategories', 'knowledgebankcategories.id', '=', 'knowledgebanks.category')->select('knowledgebanks.*', 'knowledgebankcategories.name')->get();
        // $knowledgebank = Knowledgebank::get();
        return view('admin.knowledgebank.index', compact('knowledgebank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $knowledgebankcategory = Knowledgebankcategory::all();
        return view('admin.knowledgebank.add', compact('knowledgebankcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required|string|min:2|max:255',
            'subtitle' => 'required|string|min:2',
            'description' => 'required|string|min:2',
            'image' => 'required|mimes:jpg, jpeg, png, gif, svg|max: 2048'
        ]);

        $fileName = time().'.'.strtolower($request->image->extension());
        $request->image->move(public_path('defaultImages/knowledgebank/'), $fileName);
        $image ='defaultImages/knowledgebank/'.$fileName;

        $user_id = Auth::user()->id;
        $knowledgebank = new Knowledgebank();
        $knowledgebank->image = $image;
        $knowledgebank->category = $request->category;
        $knowledgebank->title = $request->title;
        $knowledgebank->subtitle = $request->subtitle;
        $knowledgebank->description = $request->description;
        $knowledgebank->created_by = $user_id;

        $knowledgebank->save();
        return redirect()->route('admin.knowledgebank.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
        //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $knowledgebank = Knowledgebank::find($id);
        $knowledgebankcategory = Knowledgebankcategory::all();
        return view('admin.knowledgebank.edit', compact('knowledgebank', 'knowledgebankcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $knowledgebank = Knowledgebank::find($id);

        $request->validate([
            'category' => 'required',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')) {
            $oldImage = public_path($knowledgebank->image);
            File::delete($oldImage);

            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('defaultImages/knowledgebank/'), $fileName);
            $image ='defaultImages/knowledgebank/'.$fileName;
            $knowledgebank->update([
                'image' => $image,
            ]);
        }

        $knowledgebank->update([
            'category' => $request->category,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.knowledgebank.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Knowledgebank::where('id', $id)->delete();
        return redirect()->route('admin.knowledgebank.index');
    }
}
