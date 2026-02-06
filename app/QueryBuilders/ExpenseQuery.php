<?php

namespace App\QueryBuilders;

use App\Domain\Expense\Data\ExpenseIndexData;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ExpenseQuery
{
    public static function forIndex(ExpenseIndexData $data): Builder
    {
        $query = Expense::query()
            ->with('category')
            ->where('user_id', $data->userId);

        // Фильтрация по period (приоритет)
        if ($data->period) {
            match ($data->period) {
                'week' => $query->where('spent_at', '>=', Carbon::now()->subWeek()),
                'current_month' => $query->where('spent_at', '>=', Carbon::now()->startOfMonth()),
                '3months' => $query->where('spent_at', '>=', Carbon::now()->subMonths(3)),
                default => null,
            };
        } else {
            // Фильтрация по датам
            if ($data->from) {
                $query->whereDate('spent_at', '>=', $data->from);
            }
            if ($data->to) {
                $query->whereDate('spent_at', '<=', $data->to);
            }
        }

        // Сортировка
        if ($data->sort) {
            $query->orderBy($data->sort, $data->direction);
        }

        return $query;
    }
}
