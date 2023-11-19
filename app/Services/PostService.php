<?php

namespace App\Services;

use App\Events\GetCategories;
use App\Events\GetTags;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\Post\PostRepository;

class PostService
{
  protected $postRepository;

  public function __construct(PostRepository $postRepository)
  {
    $this->postRepository = $postRepository;
  }

  public function savePost($data)
  {
    $post = new Post();
    $post->fill($data);
    $post->save();
    $post->tags()->attach($data['tag']);
  }

  public function approvedPost($data)
  {
    $approvedPost = ['approved' => (int) $data->approved];
    $this->postRepository->update($data->id, $approvedPost);
  }

  public function getApprovedPost()
  {
    event(new GetCategories(new Category()));

    event(new GetTags(new Tag()));

    $approvedPost = Post::whereNot('approved', '0')->latest()->paginate(7);
    return $approvedPost;
  }

  public function refusePost($data)
  {
    $this->postRepository->delete($data->id);
  }

}