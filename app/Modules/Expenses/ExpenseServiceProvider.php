<?php

namespace App\Modules\Expenses;

use Illuminate\Support\ServiceProvider;

class ExpenseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
    }
    protected $listen = [
    \App\Modules\Expenses\Events\ExpenseCreated::class => [
        \App\Modules\Expenses\Listeners\SendExpenseNotification::class,
    ],
];
}