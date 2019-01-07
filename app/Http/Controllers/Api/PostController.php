<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\HttpForbiddenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPosts(Request $request)
    {
        $posts = $this->postRepository->all();
        return response()->json($posts);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPost(int $id)
    {
        $post = $this->postRepository->find($id);
        return response()->json($post);
    }

    public function createPost(PostCreateRequest $request)
    {
        $validatedData = $request->only(['subject','content','is_published']);
        $post = $this->postRepository->create($validatedData);
        return response()->json($post,201);
    }
}