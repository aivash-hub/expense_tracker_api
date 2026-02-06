<?php

namespace App\Domain\Expense\Data;

class ExpenseIndexData
{
    public function __construct(
        public readonly ?string $from,
        public readonly ?string $to,
        public readonly ?string $sort,
        public readonly string $direction,
        public readonly int $perPage,
        public readonly int $userId,
        public readonly ?string $period = null,
    ) {
    }
}
