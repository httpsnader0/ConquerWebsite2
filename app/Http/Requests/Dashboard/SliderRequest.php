<?php

namespace App\Http\Requests\Dashboard;

use App\Classes\Rules;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'slider.*.image' => ['required', 'image', 'max:' . Rules::MAX_AVATAR],
            'slider.*.text.*' => ['required'],
            'slider.*.url' => ['required', 'url'],
        ];
    }
}
