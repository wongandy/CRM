<?php

namespace App\Enums\Project;

enum Statuses: string
{
    case OPEN           = 'open';
    case IN_PROGRESS    = 'in progress';
    case BLOCKED        = 'blocked';
    case COMPLETED      = 'completed';
    case CANCELLED      = 'cancelled';
}