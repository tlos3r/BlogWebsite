<?php

namespace App\Repositories\Comment;

use App\Repositories\BaseRepository;


class CommentRepository extends BaseRepository
{
  public function getModel()
  {
    return \App\Models\Comment::class;
  }
}