<?php

namespace App\Http\Controllers;

use App\Models\ApprovedPost;
use App\Services\PostService;
use Illuminate\Http\Request;

class ApprovedPostController extends Controller
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
        return view('approvedpost.index')->with('approvedposts', ApprovedPost::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ApprovedPost $approvedPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApprovedPost $approvedPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApprovedPost $approvedPost)
    {
        //
        $this->postService->approvedPost($request);

        return redirect()->back()->with('success', 'Approved Post success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, ApprovedPost $approvedPost)
    {
        $this->postService->refusePost($request);

        return redirect()->back()->with('success', 'Refuse post success');
    }
}