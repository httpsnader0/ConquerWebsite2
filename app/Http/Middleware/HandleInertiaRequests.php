<?php

namespace App\Http\Middleware;

use App\Models\User;
use Inertia\Middleware;
use App\Classes\MenuWebsite;
use Illuminate\Http\Request;
use App\Classes\MenuDashboard;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Rawilk\Settings\Facades\Settings;
use Illuminate\Support\Facades\Session;
use LaravelLang\Locales\Facades\Locales;
use App\Http\Resources\Dashboard\AdminResource;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app', $userAbilities = [], $menu = [], $user = null;

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $this->setUserAbilitiesIfAuthed($request);

        $this->setUserData($request);

        return array_merge(parent::share($request), [
            'auth' => $this->user,
            'assetUrl' => asset(''),
            'locale' => App::getLocale(),
            'locales' => Locales::installed(),
            'toastr' => $this->getToastrEnvelopesFromSession($request),
            'settings' => $this->getSettings(),
            'recaptchaSiteKey' => config('services.googleRecaptcha.siteKey'),
            'menu' => $this->menu,
            'permissions' => $this->userAbilities,
        ]);
    }

    protected function setUserData($request): void
    {
        if ($request->route()->named('dashboard.*') && !$request->route()->named('dashboard.login.*')) {
            $this->user = new AdminResource(User::query()->with(['notifications' => fn($q) => $q->orderByDesc('created_at')->limit(20)])->find($request->user()?->id));
            $this->menu = MenuDashboard::getMenu();
        } else {
            $this->user = null;
            $this->menu = MenuWebsite::getMenu();
        }
    }

    protected function setUserAbilitiesIfAuthed($request): void
    {
        if ($request->user() && method_exists($request->user(), 'getAbilities')) {
            $this->userAbilities = $request->user()->getAbilities()->pluck('name')->toArray();
            Session::put('userAbilities', $this->userAbilities);
        }
    }

    public function getSettings()
    {
        return [
            'title' => Settings::get('title'),
            'icon' => Settings::get('icon'),
            'logo' => Settings::get('logo'),
            'sliders' => Settings::get('sliders'),
        ];
    }

    protected function getToastrEnvelopesFromSession($request)
    {
        return collect($request->session()->pull('flasher::envelopes'))->map(function ($item) {
            $notification = $item->getNotification();
            return [
                'type' => $notification->getType(),
                'message' => $notification->getMessage(),
            ];
        });
    }
}
