<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
