<?php

namespace App\Models;

use App\Core\Enums\CashFlow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'date',
        'amount',
        'cash_flow',
        'category_id',
    ];

    protected $casts = [
        'cash_flow' => CashFlow::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
