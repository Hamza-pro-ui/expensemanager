<?php

namespace App\Modules\Expenses\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'id', 'title', 'amount', 'category', 'expense_date', 'notes'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn ($model) => $model->id = (string) Str::uuid());
    }
}
