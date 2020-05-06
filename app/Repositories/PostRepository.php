<?php

namespace App\Repositories;

use App\Models\{Post};
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
	/**
	 *
	 * @param
	 * @return
	 */
	public function getPosts() : array
	{
		return Post::get()->toArray();
	}
	

	/**
	 *
	 * @param
	 * @return
	 */
	public function getPostFromUser($user_id)
	{
		return Post::whereUserId($user_id)->get();
	}
	
	/**
	 *
	 * @param
	 * @return
	 */
	public function createPost($user_id, $title, $content) : Post
	{
		$post 			= new Post;
		$post->title 	= $title;
		$post->content 	= $content;
		$post->user_id 	= $user_id;
		$post->save();

		return $post;
	}

	/**
	 *
	 * @param
	 * @return
	 */
	public function updatePost($post_id, $title, $content) : Post
	{
		$post 			= Post::find($post_id);
		$post->title 	= $title;
		$post->content 	= $content;
		$post->update();

		return $post;
	}
	
	/**
	 *
	 * @param
	 * @return
	 */
	public function deletePost($post_id)
	{
		$post = Post::find($post_id);
		$post->delete();
	}
}