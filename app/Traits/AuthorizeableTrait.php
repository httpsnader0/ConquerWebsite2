<?php

namespace App\Traits;

use App\Enums\AbilityEnum;
use App\Enums\SubscriberAbilityEnum;

trait AuthorizeableTrait
{
    public function authorize(): bool
    {
        if (isset($this->ability)) {

            return request()->user()?->can($this->ability->value);

        }

        return true;
    }
}
