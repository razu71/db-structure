<?php

namespace App\Enums;

enum UserStatus: string
{
    // Case definitions
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';

    // Optional: Custom methods
    public static function getColor($color): string
    {
        return match($color) {
            self::ACTIVE->value => 'green',
            self::INACTIVE->value => 'red',
            self::PENDING->value => 'yellow',
            default => 'gray'
        };
    }

    // Optional: Static methods
    public static function getLabels(): array
    {
        return [
            self::ACTIVE->value => 'Active User',
            self::INACTIVE->value => 'Inactive User',
            self::PENDING->value => 'Pending User',
        ];
    }

    // Optional: Properties (PHP 8.1+)
    public static function label($value): string
    {
        return self::getLabels()[$value];
    }
}
