<?php

namespace App\Enums;

enum RolesEnum: string 
{
    case ADMIN = 'admin';
    case PURCHASEOCCER = "purchaser-officer";
    case COO = "COO";

    public static function toArray(): array
    {
        return array_combine(
            array_map(fn ($case) => $case->value, self::cases()),
            array_map(fn ($case) => $case->value, self::cases())
        );
    }
}