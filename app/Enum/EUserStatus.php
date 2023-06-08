<?php

namespace App\Enum;

use Carbon\Traits\Options;

enum EUserStatus:string
{
    case Active = 'Active';
    case Inactive   = 'Inactive';
}



