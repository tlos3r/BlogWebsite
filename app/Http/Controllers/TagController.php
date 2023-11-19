<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Services\TagService;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tag.index')->with('tags', Tag::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        return $this->tagService->saveTag($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
        return view('tag.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        return $this->tagService->editTag($tag->id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        return $this->tagService->deleteTag($tag->id);
    }
}