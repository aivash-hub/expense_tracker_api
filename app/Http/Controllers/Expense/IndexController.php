<?php

namespace App\Http\Controllers\Expense;

use App\Domain\Expense\Data\ExpenseIndexData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Expense\IndexRequest;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use App\QueryBuilders\ExpenseQuery;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $this->authorize('viewAny', Expense::class);

        $data = new ExpenseIndexData(
            from: $request->validated('from'),
            to: $request->validated('to'),
            sort: $request->validated('sort'),
            direction: $request->validated('direction', 'desc'),
            perPage: $request->validated('per_page', 10),
            userId: $request->user()->id,
            period: $request->validated('period'),
        );

        $expenses = ExpenseQuery::forIndex($data)
            ->paginate($data->perPage);

        return ExpenseResource::collection($expenses);
    }
}
