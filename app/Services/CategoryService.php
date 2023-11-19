<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Str;

class CategoryService
{
  protected $categoryRepository;
  public function __construct(CategoryRepository $categoryRepository)
  {
    $this->categoryRepository = $categoryRepository;
  }

  public function saveCategory($data)
  {
    $this->categoryRepository->save($data);
    return redirect()->back()->with(['success' => 'Add Category Successful']);
  }

  public function editCategory($id, $data)
  {
    $this->categoryRepository->update($id, [
      'name' => $data->name,
      'slug' => Str::slug($data->name)
    ]);
    return redirect('/category')->with(['success' => 'Edit Category Successful']);
  }

  public function deleteCategory($id)
  {
    $this->categoryRepository->delete($id);

    return redirect('/category')->with(['success' => 'Remove Category successful']);
  }
}