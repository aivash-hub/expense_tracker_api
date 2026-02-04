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

        if ($request->filled('from')) {
            $query->whereDate('spent_at', '>=', $request->input('from'));
        }

        if ($request->filled('to')) {
            $query->whereDate('spent_at', '<=', $request->input('to'));
        }

        return $query;
    }
}
