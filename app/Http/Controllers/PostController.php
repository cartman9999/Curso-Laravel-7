<?php

namespace App\Http\Controllers;

use App\Events\NewPostCreatedEvent;
use App\Models\{Post};
use App\Repositories\{PostRepository, PostApiRepository};
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;
    private $postApiRepository;

    public function __construct(PostRepository $post, PostApiRepository $post_api) 
    {
        $this->postRepository = $post;
    }

    /**
     *
     * @param
     * @return
     */
    public function index(Request $request)
    {
        // $posts = $this->postRepository->getPosts();
        // $posts = $this->postApiRepository->getPosts();

        // WEB
        $posts = $this->postRepository->getPostFromUser($request->user_id);

        // API
        // $posts = $this->postRepository->getPostFromUser($request->user_id);

    	return $posts;
    }

    // /**
    //  *
    //  * @param
    //  * @return
    //  */
    // public function getPostFromUser($user_id)
    // {
    //     return Post::whereUserId($user_id)->get();
    // }
    

    /**
     *
     * @param
     * @return
     */
    public function create(Request $request)
    {
    	$post = $this->postRepository->createPost($request->user_id, $request->title, $request->content);

        event(new NewPostCreatedEvent($post));

        // Enviar Mail a Usuarios
        // Borrar Post más antiguo

        


    	return $post;
    }    
    
    // /**
    //  *
    //  * @param
    //  * @return
    //  */
    // public function createPost($title, $content, $user_id)
    // {
    //         $post           = new Post;
    //         $post->title    = $title;
    //         $post->content  = $content;
    //         $post->user_id  = $user_id;
    //         $post->save();

    //         return $post;
    // }
    

    /**
     *
     * @param
     * @return
     */
    public function update(Request $request)
    {
    	$post = $this->postRepository->updatePost($request->post_id, $request->title, $request->content);

    	return $post;
    }

    // /**
    //  *
    //  * @param
    //  * @return
    //  */
    // public function updatePost($post_id, $title, $content)
    // {
    //         $post           = Post::find($post_id);
    //         $post->title    = $title;
    //         $post->content  = $content;
    //         $post->update();
    // }


    /**
     *
     * @param
     * @return
     */
    public function delete(Request $request)
    {
        $this->postRepository->deletePost($request->post_id);

    	return 'Post Deleted :(';
    }

    // /**
    //  *
    //  * @param
    //  * @return
    //  */
    // public function deletePost($post_id)
    // {
    //     $post = Post::find($post_id);
    //     $post->delete();
    // }
}