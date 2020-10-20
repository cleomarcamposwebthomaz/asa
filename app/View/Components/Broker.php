<?php

namespace App\View\Components;

use App\Models\Broker as ModelsBroker;
use Illuminate\View\Component;

class Broker extends Component
{
    protected $broker;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelsBroker $broker)
    {
        $this->broker = $broker;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $brokers = $this->broker->query()->active()->get();

        return view('components.broker', [
            'brokers' => $brokers
        ]);
    }
}