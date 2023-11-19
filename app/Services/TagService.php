<?php

namespace App\Services;

use App\Repositories\Tag\TagRepository;
use Illuminate\Support\Str;

class TagService
{
  protected $tagRepository;

  public function __construct(TagRepository $tagRepository)
  {
    $this->tagRepository = $tagRepository;
  }

  public function saveTag($data)
  {
    return $this->tagRepository->create([
      'name' => $data->name,
      'slug' => Str::slug($data->name)
    ])
      ? redirect()->back()->with(['success' => 'Add Tag Successful'])
      : redirect()->back()->with(['fail' => "Tag can't updated"]);
  }

  public function editTag($id, $data)
  {
    $this->tagRepository->update($id, [
      'name' => $data->name,
      'slug' => Str::slug($data->name)
    ]);
    return redirect('/tag')->with(['success' => 'Edit Tag Successful']);
  }

  public function deleteTag($id)
  {
    $this->tagRepository->delete($id);

    return redirect('/tag')->with(['success' => 'Remove Tag successful']);
  }
}
?>