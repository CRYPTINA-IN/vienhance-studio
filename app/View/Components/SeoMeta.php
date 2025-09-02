<?php

namespace App\View\Components;

use App\Services\SeoService;
use Illuminate\View\Component;

class SeoMeta extends Component
{
    public $routeName;

    public $customData;

    /**
     * Create a new component instance.
     */
    public function __construct($routeName = null, $customData = [])
    {
        $this->routeName = $routeName;
        $this->customData = $customData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        if ($this->routeName) {
            SeoService::setSeoForPage($this->routeName, $this->customData);
        }

        return view('components.seo-meta');
    }
}
