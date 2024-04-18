<?php

namespace App\View\Components;

use App\Models\Settings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class socialLinks extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data['setting'] = Settings::select('facebook', 'instagram', 'twitter', 'youtube')->first();
        return view('components.social-links')->with($data);
    }
}
