<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;

class IndexController extends Controller
{
    public function __invoke()
    {
        $expenses = Expense::where('user_id', auth()->id())->get();

        return response()->json($expenses);
    }
}
