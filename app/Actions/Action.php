<?php

namespace App\Actions;

use App\Traits\AuthorizeableTrait;
use App\Traits\ExportableTrait;
use App\Traits\JsonResponseTrait;
use App\Traits\TransformerTrait;
use Lorisleiva\Actions\Concerns\AsAction;

class Action
{
    use AsAction, AuthorizeableTrait, JsonResponseTrait, ExportableTrait, TransformerTrait;

    public function setFlashProp(array $data): void
    {
        session()->put('flashProp', $data);
    }
}
