<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Knowledgebank;
use App\Models\Knowledgebankcategory;

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
            'description' => 'required|string|min:2'
        ]);

        $knowledgebank = new Knowledgebank();
        $knowledgebank->category = $request->category;
        $knowledgebank->title = $request->title;
        $knowledgebank->subtitle = $request->subtitle;
        $knowledgebank->description = $request->description;

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
        $request->validate([
            'category' => 'required',
            'title' => 'required|string|min:2|max:255',
            'subtitle' => 'required|string|min:2',
            'description' => 'required|string|min:2'
        ]);

        Knowledgebank::where('id', $id)->update([
            'category' => $request->category,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description
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
