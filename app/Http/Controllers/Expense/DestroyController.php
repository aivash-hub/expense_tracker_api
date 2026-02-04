<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;

class DestroyController extends Controller
{
    public function __invoke(Expense $expense)
    {
        abort_if($expense->user_id !== auth()->id(), 403);

        $expense->delete();

        return response()->json(null, 204);
    }
}
