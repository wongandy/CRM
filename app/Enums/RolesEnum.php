<?php

namespace App\Enums;

enum RolesEnum: int
{
    case ADMIN = 1;
    case MANAGER = 2;
    case USER = 3;
}