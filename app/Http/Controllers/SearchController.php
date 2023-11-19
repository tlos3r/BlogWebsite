<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $search = $request->s;
        $posts = Post::where('title', 'LIKE', '%' . $request->s . '%')
            ->orWhereHas('category', function ($query) use ($search) {
                return $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas(
                'tags',
                function ($query) use ($search) {
                    return $query->where('name', 'LIKE', '%' . $search . '%');
                }
            )->paginate();

        return view('search.result')->with('posts', $posts);
    }
}
