<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone'
    ];
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
