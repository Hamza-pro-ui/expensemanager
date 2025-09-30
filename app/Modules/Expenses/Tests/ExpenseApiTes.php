<?php

namespace Tests\Feature\Modules\Expenses\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpenseApiTes extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function test_user_can_create_expense()
{
    $response = $this->postJson('/api/expenses', [
        'title' => 'Test',
        'amount' => 100,
        'category' => 'food',
        'expense_date' => '2025-09-26'
    ]);

    $response->assertStatus(201)->assertJsonFragment(['title' => 'Test']);
}
}
