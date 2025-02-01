<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class UserAccount extends Model
{
    use HasFactory, HasRoles;
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
