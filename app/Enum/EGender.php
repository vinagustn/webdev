<?php

namespace App\Enum;

enum EGender:string
{
    case Jantan = 'Jantan';
    case Betina = 'Betina';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}



