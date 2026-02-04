<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expense\UpdateRequest;
use App\Models\Expense;

class UpdateController extends Controller
{
    public function __invoke(Expense $expense, UpdateRequest $request)
    {
        $this->authorize('update', $expense);

        $expense->update($request->validated());

        return response()->json($expense);
    }
}
