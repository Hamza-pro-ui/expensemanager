<?php

namespace App\Modules\Expenses\Enums;

enum ExpenseCategory: string
{
    case TRAVEL = 'travel';
    case FOOD = 'food';
    case OFFICE = 'office';
    case OTHER = 'other';
}