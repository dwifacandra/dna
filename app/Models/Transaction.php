<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Core\Traits\UUID as TraitsUUID;
use App\Core\{Enums\CashFlow, Casts\CurrencyCast};
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class Transaction extends Model implements HasMedia
{
    use HasFactory, TraitsUUID, InteractsWithMedia;
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
        'date' => 'date',
        'cash_flow' => CashFlow::class,
        'amount' => CurrencyCast::class,
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('transactions')
            ->useFallbackUrl('/svg/core.outline.currency_exchange')
            ->useDisk('private');
    }
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
        return $this->belongsTo(Customer::class, 'payee_id');
    }
    public function getTransactionIdAttribute()
    {
        $uuid = Str::before(Str::upper($this->id), '-');
        $date = $this->date->format('ymd');
        return "{$date}-{$uuid}";
    }
}
