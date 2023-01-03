<?php

namespace App\Enums\Project;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

enum Statuses: string
{
    case OPEN           = 'open';
    case IN_PROGRESS    = 'in progress';
    case BLOCKED        = 'blocked';
    case COMPLETED      = 'completed';
    case CANCELLED      = 'cancelled';

    public static function options(): Collection
    {
        return Collection::make(self::cases())->mapWithKeys(
            fn ($case) => [Str::upper($case->value) => Str::of($case->value)->replace('_', ' ')->value()]
        );
    }
}