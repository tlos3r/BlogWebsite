<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository
{
  public function getModel()
  {
    return Tag::class;
  }
}