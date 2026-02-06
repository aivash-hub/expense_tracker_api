<?php

namespace App\Domain\Expense\Enums;

enum ExpensePeriod: string
{
    case WEEK = 'week';
    case CURRENT_MONTH = 'current_month';
    case THREE_MONTHS = '3months';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
