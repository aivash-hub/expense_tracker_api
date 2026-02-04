<?php

namespace App\QueryBuilders;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ExpenseQuery
{
    public static function forIndex(Request $request): Builder
    {
        $query = Expense::query()
            ->where('user_id', auth()->id());

        // Фильтрация по датам
        if ($request->filled('from')) {
            $query->whereDate('spent_at', '>=', $request->input('from'));
        }

        if ($request->filled('to')) {
            $query->whereDate('spent_at', '<=', $request->input('to'));
        }

        // Сортировка
        $sort = $request->input('sort', 'spent_at');
        $direction = $request->input('direction', 'desc');

        if (in_array($sort, ['spent_at', 'amount', 'created_at'], true)) {
            $query->orderBy($sort, $direction === 'asc' ? 'asc' : 'desc');
        }

        return $query;
    }
}
