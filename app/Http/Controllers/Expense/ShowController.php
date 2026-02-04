<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;

class ShowController extends Controller
{
    public function __invoke(Expense $expense)
    {
        $this->authorize('view', $expense);

        return new ExpenseResource($expense);
    }
}
