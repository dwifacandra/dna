<?php

namespace App\Models;

use App\Core\{Enums\CashFlow, Casts\CurrencyCast};
use App\Core\Traits\UUID as TraitsUUID;
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class Transaction extends Model
{
    use HasFactory, TraitsUUID;
    protected $table = 'transactions';
    protected $keyType = 'string';
    protected $fillable = [
        'date',
        'name',
        'description',
        'amount',
        'cash_flow',
        'category_id',
        'subcategory_id',
        'payee_id',
    ];
    protected $casts = [
        'cash_flow' => CashFlow::class,
        'amount' => CurrencyCast::class,
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }
    public function payee()
    {
        return $this->belongsTo(Customer::class);
    }
}
