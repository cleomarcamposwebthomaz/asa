<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function show($id)
    {
        $page = $this->page->findOrFail($id);

        return view('front.pages.show', [
            'page' => $page
        ]);
    }
}