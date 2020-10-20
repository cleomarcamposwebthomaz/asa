<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Page;
use Illuminate\View\Component;

class Navbar extends Component
{
    protected $page;
    protected $category;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Page $page, Category $category)
    {
        $this->page = $page;
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $categories = $this->category
            ->query()
            ->where('active', true)
            ->where('show_menu', true)
            ->where('parent_id', null)
            ->with(['children' => function ($query) {
                $query->with('children');
            }])
            // ->groupBy('categories.id')
            ->get();

            // dd($categories->toArray());

        $pages = $this->page->query()->where('active', true)->get();

        // dd($categories->toArray());

        return view('components.navbar', [
            'pages' => $pages,
            'categories' => $categories,
        ]);
    }
}