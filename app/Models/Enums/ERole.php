<?php

namespace App\Models\Enums;

enum ERole:string{
    case SUPERADMIN = 'superadmin';
    case ADMIN = 'admin';
}