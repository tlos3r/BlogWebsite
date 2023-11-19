<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository
{
  public function getModel()
  {
    return Category::class;
  }

  public function save($data)
  {
    $this->model->create([
      'name' => $data->name,
      'slug' => Str::slug($data->name)
    ]);
  }

  public function getById($id)
  {
    return $this->model->find($id);
  }
}