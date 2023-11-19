<?php

namespace App\Services;

use App\Repositories\Comment\CommentRepository;

class CommentService
{
  protected $commentRepository;

  public function __construct(CommentRepository $commentRepository)
  {
    $this->commentRepository = $commentRepository;
  }

  public function saveComment($data)
  {
    return $this->commentRepository->create($data);
  }
}