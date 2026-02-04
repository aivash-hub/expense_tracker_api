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
        $expenses = ExpenseQuery::forIndex($request)->get();

        return ExpenseResource::collection($expenses);
    }
}
