<?php

namespace App\Actions;

use App\Actions\Action;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LocaleUpdateAction extends Action
{
    public function handle()
    {
        $locale = request()->locale ?? (App::getLocale() === 'ar' ? 'en' : 'ar');
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
}
