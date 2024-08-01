<?php

namespace App\Traits;

trait NotificationTrait
{
    public function typeIcon($type)
    {
        switch ($type) {

            case 'Notifications':
                return 'bell';

        }
    }
}
