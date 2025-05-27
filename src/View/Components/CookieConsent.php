<?php
declare(strict_types=1);

namespace MartinSchenk\CookieConsent\View\Components;

use Illuminate\View\Component;
use MartinSchenk\CookieConsent\Services\CookieConsentService;

class CookieConsent extends Component
{
    /**
     * Configuration for cookie consent JavaScript.
     *
     * @var array
     */
    public array $config;

    /**
     * Create a new component instance.
     *
     * @param CookieConsentService $cookieConsentService
     * @return void
     */
    public function __construct(CookieConsentService $cookieConsentService)
    {
        $this->config = $cookieConsentService->getJsConfig();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('cookie-consent::components.cookie-consent');
    }
}
