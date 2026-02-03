<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Request $request, Expense $expense)
    {
        abort_if($expense->user_id !== $request->user()->id, 403);
        $expense->delete();

        return response()->json(null, 204);
    }
}
