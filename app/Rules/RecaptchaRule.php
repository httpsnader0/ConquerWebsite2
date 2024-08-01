<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class RecaptchaRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $endpoint = config('services.googleRecaptcha');

        $response = Http::asForm()->post($endpoint['url'], [
            'secret' => $endpoint['secretKey'],
            'response' => $value,
        ])->json();

        if (!$response['success']) {
            $fail($response['error-codes'][0] . ' , Please Try Again');
        } else if ($response['score'] < 0.5) {
            $fail(__('Your reCAPTCHA Score Is Not High , Please Try Again'));
        }
    }
}
