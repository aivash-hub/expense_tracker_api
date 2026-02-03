<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $expenses = Expense::where('user_id', $request->user()->id)->get();

        return response()->json($expenses);
    }
}
