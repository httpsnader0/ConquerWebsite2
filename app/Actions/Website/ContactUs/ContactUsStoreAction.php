<?php

namespace App\Actions\Website\ContactUs;

use App\Classes\Rules;
use App\Actions\Action;
use App\Models\Contact;
use App\Rules\RecaptchaRule;
use Lorisleiva\Actions\ActionRequest;

class ContactUsStoreAction extends Action
{
    public function handle(ActionRequest $request)
    {
        Contact::create($request->validated());

        toastr()->success(__('Message Sended Successfully'));
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:' . Rules::MAX_NAME],
            'email' => ['required', 'email', 'max:' . Rules::MAX_EMAIL],
            'message' => ['required', 'max:' . Rules::MAX_DESCRIPTION],
            'recaptcha' => ['required', new RecaptchaRule],
        ];
    }
}
