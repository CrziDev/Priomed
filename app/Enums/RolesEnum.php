<?php

namespace App\Enums;

enum RolesEnum: string 
{
    case ADMIN = 'admin';


    public static function toArray(): array
    {
        return array_combine(
            array_map(fn ($case) => $case->value, self::cases()),
            array_map(fn ($case) => $case->value, self::cases())
        );
    }
}