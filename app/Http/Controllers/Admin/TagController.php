<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::latest()->paginate(10);

        return view('common.tags.index', compact('tags'));
    }

    public function store(StoreTagRequest $request) {
        $this->authorize('create', Tag::class);

        Tag::create($request->validated());

        return redirect()->route('common.tags.index')->with('success', 'Tag inserted sucessfully.');
    }

    public function edit(Tag $tag) {
        $this->authorize('update', $tag);

        return view('common.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag) {
        $this->authorize('update', $tag);

        $tag->update($request->validated());

        return redirect()->route('common.tags.index')->with('success', 'Tag updated sucessfully.');
    }

    public function destroy(Tag $tag) {
        $this->authorize('delete', $tag);

        $tag->delete();

        return redirect()->route('common.tags.index')->with('success', 'Tag deleted sucessfully.'); 
    }

    public function trash() {
        $deletedTags = Tag::onlyTrashed()->latest()->paginate(10);

        return view('common.tags.trash', compact('deletedTags'));
    }

    public function restore($id) {
        Tag::withTrashed()->find($id)->restore();

        return redirect()->route('common.tags.index')->with('success', 'Tag updated sucessfully.');
    }

    public function permanentlyDelete($id) {
        Tag::onlyTrashed()->find($id)->forceDelete();
        
        return redirect()->back()->with('success', 'Tag deleted sucessfully.');
    }
}
