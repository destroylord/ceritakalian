<?php

namespace App\Http\Controllers;

use App\Story;
use App\Http\Requests\StoryRequest;
use Illuminate\Http\Request;

class StoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stories = Story::latest()->paginate(6);
        return view('stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stories.create', ['story' => New Story]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $attr = $request->all();

        // this is code clean boy
        $attr['slug'] = \Str::slug(request('title'));
        Story::create($attr);

        return redirect('/story/my-stories')->with('success','Tambah cerita Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
        return view('stories.show',compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //
        return view('stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request,  Story $story)
    {

        $attr = $request->all();
        // tidak harus mengupdate slug

        $story->update($attr);

        return redirect('story/my-stories')->with('success','Ceritaku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();

        return back()->with('danger','cerita telah dihapus');
    }
    public function trash()
    {
        // menampilkan data yang di softdeletes
        $stories = Story::onlyTrashed()->get();

        return view('stories.trash', compact('stories'));
    }
}
