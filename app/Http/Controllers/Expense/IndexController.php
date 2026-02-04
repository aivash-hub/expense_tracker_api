<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;

class IndexController extends Controller
{
    public function __invoke()
    {
        $query = Expense::query()
            ->where('user_id', auth()->id());

        if (request()->filled('from')) {
            $query->whereDate('spent_at', '>=', request('from'));
        }

        if (request()->filled('to')) {
            $query->whereDate('spent_at', '<=', request('to'));
        }

        $expenses = $query->get();

        return ExpenseResource::collection($expenses);
    }
}
