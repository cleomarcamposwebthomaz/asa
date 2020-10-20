<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelFilters\BlogFilter;
use App\Models\Post;

class PostController extends Controller
{
  protected $post;

  /**
   * Class constructor.
   */
  public function __construct(Post $post)
  {
    $this->post = $post;
  }

  public function index(Request $request)
  {
    $posts = $this->post
      ->query()
      ->filter($request->all(), BlogFilter::class)
      ->active()
      ->orderBy('posts.id', 'desc');

    return view('front.pages.blog.index', [
      'posts' => $posts->get(),
    ]);
  }

  public function show($id)
  {
    $post = $this->post->findOrFail($id);

    return view('front.pages.blog.show', [
      'post' => $post
    ]);
  }
}