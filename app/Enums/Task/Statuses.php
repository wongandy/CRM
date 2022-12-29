<?php

namespace App\Enums\Task;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

enum Statuses: string
{
    case OPEN               = 'open';
    case IN_PROGRESS        = 'in progress';
    case PENDING            = 'pending';
    case WAITING_FOR_CLIENT = 'waiting for client';
    case BLOCKED            = 'blocked';
    case CLOSED             = 'closed';

    public static function options(): Collection
    {
        return Collection::make(self::cases())->mapWithKeys(
            fn ($case) => [Str::upper($case->value) => Str::of($case->value)->replace('_', ' ')->value()]
        );
    }
}