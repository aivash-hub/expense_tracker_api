<?php

namespace App\Http\Controllers\Expense;

use App\Http\Controllers\Controller;
use App\Models\Expense;

class SummaryController extends Controller
{
    public function __invoke()
    {
        $this->authorize('viewAny', Expense::class);

        return ['total' => 0];
    }
}
