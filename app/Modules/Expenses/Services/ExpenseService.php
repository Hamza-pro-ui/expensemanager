<?php

namespace App\Modules\Expenses\Services;

use App\Modules\Expenses\Models\Expense;
use Illuminate\Database\Eloquent\Collection;

class ExpenseService
{
    public function create(array $data): Expense
    {
        $expense = Expense::create($data);
        event(new ExpenseCreated($expense));
        return $expense;
    }

    public function update(Expense $expense, array $data): Expense
    {
        $expense->update($data);
        return $expense;
    }

    public function delete(Expense $expense): void
    {
        $expense->delete();
    }

    public function list(array $filters = []): Collection
    {
       $query = Expense::query();

        if (isset($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (isset($filters['from']) && isset($filters['to'])) {
            $query->whereBetween('expense_date', [$filters['from'], $filters['to']]);
        }

        return $query->orderByDesc('expense_date')->get();
    }
}
