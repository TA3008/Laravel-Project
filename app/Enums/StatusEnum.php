<?php

namespace App\Enums;

enum StatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    
    public static function options(): array
    {
        return [
            self::ACTIVE->value => 'Hoạt động',
            self::INACTIVE->value => 'Không hoạt động',
        ];
    }

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
