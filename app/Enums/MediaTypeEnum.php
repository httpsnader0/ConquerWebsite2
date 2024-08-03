<?php

namespace App\Enums;

use App\Traits\EnumOptionsTrait;

enum MediaTypeEnum: string {

    use EnumOptionsTrait;
    
    case SCREENSHOT = 'Screenshot';
    case VIDEO = 'Video';

}
