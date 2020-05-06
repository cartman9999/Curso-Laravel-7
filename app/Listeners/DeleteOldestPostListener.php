<?php

namespace App\Listeners;

use App\Events\NewPostCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Post;

class DeleteOldestPostListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewPostCreatedEvent  $event
     * @return void
     */
    public function handle(NewPostCreatedEvent $event)
    {
        info('Entra a borrar post mas viejo');

        sleep(15);

        $post = Post::whereUserId($event->post->user_id)
                    ->orderBy('created_at', 'asc')
                    ->first();

        $post_delete = Post::find($post->id);
        // $post_delete->delete();

        dump('Post Eliminado'); 
    }
}
