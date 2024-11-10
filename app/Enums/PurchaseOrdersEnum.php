<?php

namespace App\Enums;

enum PurchaseOrdersEnum: string 
{

    case PENDING = 'pending';
    case SUBMITTED = 'submitted';
    case APPROVED = 'approved';
    
    public static function toArray(): array
    {
        return array_combine(
            array_map(fn ($case) => $case->value, self::cases()),
            array_map(fn ($case) => $case->value, self::cases())
        );
    }
}