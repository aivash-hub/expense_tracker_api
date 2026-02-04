<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expense\IndexRequest;
use App\Http\Resources\ExpenseResource;
use App\QueryBuilders\ExpenseQuery;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $perPage = $request->integer('per_page', 10);

        $expenses = ExpenseQuery::forIndex($request)
            ->paginate($perPage);

        return ExpenseResource::collection($expenses);
    }
}
