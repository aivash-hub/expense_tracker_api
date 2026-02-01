<?php

namespace App\Enums;

enum ExpenseCategory: string
{
    case GROCERIES   = 'groceries';
    case LEISURE     = 'leisure';
    case ELECTRONICS = 'electronics';
    case UTILITIES   = 'utilities';
    case CLOTHING    = 'clothing';
    case HEALTH      = 'health';
    case OTHERS      = 'others';

    public function label(): string
    {
        return match ($this) {
            self::GROCERIES   => 'Groceries',
            self::LEISURE     => 'Leisure',
            self::ELECTRONICS => 'Electronics',
            self::UTILITIES   => 'Utilities',
            self::CLOTHING    => 'Clothing',
            self::HEALTH      => 'Health',
            self::OTHERS      => 'Others',
        };
    }
}
