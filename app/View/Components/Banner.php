<?php

namespace App\View\Components;

use App\Models\Banner as ModelsBanner;
use Illuminate\View\Component;

class Banner extends Component
{
    protected $banner;
    protected $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsBanner $banner, $type)
    {
        $this->banner = $banner;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $banners = $this->banner->query()->where('banner_type_id', $this->type)->active()->get();

        return view('components.banner', [
            'banners' => $banners
        ]);
    }
}