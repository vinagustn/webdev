<?php

namespace App\Enum;

use Carbon\Traits\Options;

enum EStatus:string
{
    case PROCESS = 'Proses';
    case PREGNANT   = 'Hamil  ';
    case UNPREGNANT = "Tidak Hamil";

    // public static function values(): array
    // {
    //     return array_column(self::cases(), 'name', 'value');
    // }
}



