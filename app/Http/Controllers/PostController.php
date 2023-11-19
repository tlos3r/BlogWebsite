<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('welcome')->with('posts', $this->postService->getApprovedPost());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = cache()->get('category');
        $tags = Tag::all();
        return view('post.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        $this->postService->savePost($request->all());

        return redirect()->back()->with('success', 'Post has been created successful, wait for admin approved post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('post.detail')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}