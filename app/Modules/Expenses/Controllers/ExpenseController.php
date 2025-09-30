<?php

namespace App\Modules\Expenses\Controllers;

use Illuminate\Http\Request;
use App\Modules\Expenses\Services\ExpenseService;
use App\Modules\Expenses\Resources\ExpenseResource;
use App\Modules\Expenses\Requests\StoreExpenseRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;


class ExpenseController extends Controller
{
    public function __construct(private ExpenseService $service) {}

        /**
     * Get all expenses
     *
     * @group Expenses
     * @queryParam category string Filter by category. Example: travel
     * @queryParam from date Filter start date. Example: 2025-09-01
     * @queryParam to date Filter end date. Example: 2025-09-30
     *
     * @response 200 [
     *   {
     *     "id": "uuid",
     *     "title": "Flight to Qatar",
     *     "amount": "450.00",
     *     "category": "travel",
     *     "expense_date": "2025-09-25",
     *     "notes": "Business trip"
     *   }
     * ]
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json(
            ExpenseResource::collection($this->service->list($request->only('category', 'from', 'to')))
        );
    }

        /**
     * Create a new expense
     *
     * @group Expenses
     * @bodyParam title string required The title of the expense. Example: Travel to Abu Dhabi
     * @bodyParam amount decimal required The amount spent. Example: 150.75
     * @bodyParam category string required The expense category. Example: travel
     * @bodyParam expense_date date required Date of expense. Example: 2025-09-26
     * @bodyParam notes string optional Any notes. Example: Taxi fare
     *
     * @response 201 {
     *   "id": "uuid",
     *   "title": "Travel to Abu Dhabi",
     *   "amount": "150.75",
     *   "category": "travel",
     *   "expense_date": "2025-09-26",
     *   "notes": "Taxi fare"
     * }
     */
    public function store(StoreExpenseRequest $request): JsonResponse
    {
        $expense = $this->service->create($request->validated());
        return response()->json(new ExpenseResource($expense), Response::HTTP_CREATED);
    }

        /**
     * Update an expense
     *
     * @group Expenses
     * @urlParam expense string required The UUID of the expense to update.
     * @bodyParam title string required Updated title. Example: Dinner with client
     * @bodyParam amount decimal required Updated amount. Example: 120.00
     * @bodyParam category string required Category. Example: food
     * @bodyParam expense_date date required Expense date. Example: 2025-09-27
     * @bodyParam notes string optional Notes. Example: Business dinner
     *
     * @response 200 {
     *   "id": "uuid",
     *   "title": "Dinner with client",
     *   "amount": "120.00",
     *   "category": "food",
     *   "expense_date": "2025-09-27",
     *   "notes": "Business dinner"
     * }
     */
    public function update(UpdateExpenseRequest $request, Expense $expense): JsonResponse
    {
        $expense = $this->service->update($expense, $request->validated());
        return response()->json(new ExpenseResource($expense));
    }

        /**
     * Delete an expense
     *
     * @group Expenses
     * @urlParam expense string required The UUID of the expense to delete.
     *
     * @response 204 {}
     */
    public function destroy(Expense $expense): JsonResponse
    {
        $this->service->delete($expense);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
