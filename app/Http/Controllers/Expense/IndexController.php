<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpenseResource;
use App\QueryBuilders\ExpenseQuery;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $perPage = $request->integer('per_page', 10);

        $expenses = ExpenseQuery::forIndex($request)
            ->paginate($perPage);

        return ExpenseResource::collection($expenses);
    }
}
