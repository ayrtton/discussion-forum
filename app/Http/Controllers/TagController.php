<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::latest()->paginate(10);

        return view('tags.index', compact('tags'));
    }

    public function store(StoreTagRequest $request) {
        Tag::create($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag inserted sucessfully.');
    }

    public function edit(Tag $tag) {
        return view('tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag) {
        $tag->update($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag updated sucessfully.');
    }

    public function destroy(Tag $tag) {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted sucessfully.'); 
    }
}
