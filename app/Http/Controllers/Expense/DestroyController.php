<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;

class DestroyController extends Controller
{
    public function __invoke(Expense $expense)
    {
        $this->authorize('delete', $expense);

        $expense->delete();

        return response()->json(null, 204);
    }
}
