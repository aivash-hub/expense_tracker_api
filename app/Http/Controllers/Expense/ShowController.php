<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;

class ShowController extends Controller
{
    public function __invoke(Expense $expense)
    {
        abort_if($expense->user_id !== auth()->id(), 403);

        return response()->json($expense);
    }
}
