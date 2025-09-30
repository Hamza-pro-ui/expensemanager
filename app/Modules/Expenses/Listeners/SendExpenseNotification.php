<?php

namespace App\Modules\Expenses\Listeners;

use App\Modules\Expenses\Events\ExpenseCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendExpenseNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ExpenseCreated $event): void
    {
        // Example: log or send a notification
        Log::info("Expense created: " . $event->expense->title);

        // You can also send notification like:
        // Notification::route('mail', 'admin@example.com')
        //     ->notify(new ExpenseCreatedNotification($event->expense));
    }
}
