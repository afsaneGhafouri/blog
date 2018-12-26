<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentCreateRequest;
use App\Http\Requests\PostCreateRequest;
use App\Repositories\RDBMS\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function list()
    {
        $posts = $this->postRepository->getAllPublishedWithCount();
//        $posts = Post::withCount('comments')->where('is_published', true)->get();
        return view('posts.list', compact('posts'));
    }

    public function view(Request $request, string $slug)
    {
        $post = $this->postRepository->showBySlug($slug);
//        $post = Post::where('slug', $slug)->firstOrFail();
        $comments = $post->comments ;
        return view ('posts.view', compact('post', 'comments'));
    }

    public  function manage()
    {
        $posts = $this->postRepository->all();
//        $posts = DB::table('posts')->get();
        return view('admins.posts.management', compact('posts'));
    }

    public function createForm()
    {
        return view('admins.posts.create_form');
    }

    public function create(PostCreateRequest $request)
    {
        $validatedData = $request->only(['subject', 'content', 'is_published']);

       $this->postRepository->create($validatedData);

        return redirect('/admin/posts/management')
            ->with(
                'message',
                'posts ' . $request->subject . ' has successfully added'
            );
    }

    public function vote(int $id, string $action)
    {
        $post = $this->postRepository->find($id);
       // $post = Post::find($id);
        if ($action == "upvote") {
            $post->score++;
        } elseif ($action == "downvote") {
            $post->score-- ;
        }
        $post->save();
        return response()->json(['score' => $post->score]);
    }

    public function updateForm(int $id)
    {
        $post= $this->postRepository->find($id);
        return view('admins.posts.update_form', compact('post'));
    }

    public function update(PostCreateRequest $request, int $id)
    {
        $validatedData = $request->only(['subject', 'content', 'is_published']);
       // $validatedData['slug'] = str_slug($request->subject , "-");
       // $post = Post::find($id);
       // $post->update($validatedData);
        $this->postRepository->update($validatedData,$id);
        $post = $this->postRepository->find($id);

        return redirect('/admin/posts/management')
             ->with(
                 'message',
                 'post ' . $post->id . ' has successfully updated'
             );
    }

    public function addComment(CommentCreateRequest $request, int $postId)
    {
       // $post = Post::findOrFail($postId);

        $validatedData = $request->only(['title', 'content']);

        $this->postRepository->addComments($validatedData,$postId);

       // $validatedData['user_id'] = \auth()->user()->getAuthIdentifier();

      //  $post->comments()->create($validatedData);

        return redirect()->back()->with('message', 'Your comment has successfully added');


    }
}
