<?php

namespace App\Actions\Website\ContactUs;

use App\Actions\Action;
use Inertia\Inertia;

class ContactUsIndexAction extends Action
{
    public function handle()
    {
        return Inertia::render('Website/ContactUs/Index');
    }
}
