<?php

namespace App\Http\Controllers;

use App\{Category, Story, Tag};
use App\Http\Requests\StoryRequest;
use Illuminate\Http\Request;

class StoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Story $story)
    {
        //
        $stories = auth()->user()->stories()->latest()->paginate(6);
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
        return view('stories.create', [
            'story' => New Story,
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
       
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,jpg,png,svg|max:2048s'
        ]);

        $thumbnail = request()->file('thumbnail');

        $slug = \Str::slug(request('title'));
        $attr['slug'] =$slug;

        $thumbnailUrl = $thumbnail->storeAs("images/story","{$slug}.{$thumbnail->extension()}");
        
        $gambar = $thumbnail ? $thumbnailUrl : null;
        
        // this is code clean boy
        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnailUrl;
        
        $story = auth()->user()->stories()->create($attr);

        $story->tags()->attach(request('tags'));

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
        return view('stories.edit', [
            'story'         => $story,
            'categories'    => Category::get(),
            'tags'          => Tag::get()
        ]);
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
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,jpg,png,svg|max:2048s'
        ]);
        $this->authorize('update', $story);
        if (request()->file('thumbnail')) {
            \Storage::delete($story->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/story");
        } else {
            $thumbnail = $story->thumbail;
        }
        

        $attr = $request->all();
        // tidak harus mengupdate slug

        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnail;

        $story->update($attr);
        $story->tags()->sync(request('tags'));

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
        $stories = Story::onlyTrashed()->paginate(10);
        $count = Story::count();
        return view('stories.trash', compact('stories','count'));
    }

    public function restore(Story $story, $id )
    {
        $guru = Story::onlyTrashed()->where('id',$id);
        $guru->restore();
        
        return back();
    }

    public function restoreall()
    {
        $story = Story::onlyTrashed();
        $story->restore();

        return back();
    }
    public function deletebyOne(Story $story, $id)
    {
        $guru = Story::onlyTrashed()->where('id',$id);
        $story->tags()->detach();
        $guru->forceDelete();
        return back();
    }
    public function deleteall(Story $story)
    {
        $this->authorize('delete', $story);
        \Storage::delete($story->thumbnail);
        $story->tags()->detach();
        $story = Story::onlyTrashed();
        $story->forceDelete();
        return back()->with('warning','Semua cerita telah terhapus secara permanen');
    }
}
