<?php

namespace App\Enum;

use Carbon\Traits\Options;

enum EStatus:string
{
    case ACTIVE = 'active';
    case INCATIVE   = 'inactive  ';

    // public static function values(): array
    // {
    //     return array_column(self::cases(), 'name', 'value');
    // }
}



