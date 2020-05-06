<?php

namespace App\Repositories\Interfaces;

use App\Models\Post;

interface PostRepositoryInterface
{
	public function getPosts():array;
	public function getPostFromUser($user_id);
	public function createPost($user_id, $title, $content);
	public function updatePost($post_id, $title, $content);
}