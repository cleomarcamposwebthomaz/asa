<?php

namespace App\View\Components;

use App\Models\Banner;
use Illuminate\View\Component;

class Slideshow extends Component
{
    var $banner;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $banners = $this->banner->query()->where('banner_type_id', 1)->get();

        return view('components.slideshow', [
            'banners' => $banners
        ]);
    }
}