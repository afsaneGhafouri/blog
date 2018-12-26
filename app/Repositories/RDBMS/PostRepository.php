<?php

namespace App\Repositories\RDBMS;

use App\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    private $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getAllPublishedWithCount()
    {
        return $this->model->withCount('comments')->where('is_published', true)->get();
    }

    public function find(int $id)
    {
       return $this->model->findOrFail($id);
    }

    public function showBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    public function create(array $attribute)
    {
        $attribute['slug'] = str_slug($attribute['subject'] , "-");

        return $this->model->create($attribute);
    }

    public function update(array $attribute, int $id)
    {
        $attribute['slug'] = str_slug($attribute['subject'] , "-");

        return $this->model->find($id)->update($attribute);

    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function addComments(array $commentAttribute, int $postId)
    {
        $commentAttribute['user_id'] = \auth()->user()->getAuthIdentifier();

        return $this->model->find($postId)->comments()->create($commentAttribute);
    }
}
