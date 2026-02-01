<?php

namespace Database\Seeders;

use App\Enums\ExpenseCategory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ExpenseCategory::cases() as $category) {
            Category::firstOrCreate(
                ['slug' => $category->value],
                ['name' => $category->label(),]
            );
        }
    }
}
