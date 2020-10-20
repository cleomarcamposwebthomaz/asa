<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class Posts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $posts = Post::query()->active()->limit(2)->orderBy('posts.id', 'DESC')->get();

        return view('components.posts', [
            'posts' => $posts,
        ]);
    }
}