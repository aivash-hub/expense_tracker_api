<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expense\StoreRequest;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $expense = Expense::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        return response()->json(
            new ExpenseResource($expense),
            201
        );
    }
}
