<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent\View\Components;

use Illuminate\View\Component;

class SettingsLink extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('cookie-consent::components.settings-link');
    }
}
