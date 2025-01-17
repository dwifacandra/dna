<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Illuminate\Support\Str;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasAvatar, FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function accounts()
    {
        return $this->hasMany(UserAccount::class);
    }

    public function skills()
    {
        return $this->hasMany(ResumeSkill::class);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        $prefix = urlencode(Str::substr($this->name, 0, 2));
        $url = 'https://ui-avatars.com/api/?name=' . $prefix . '&color=f8fafc&background=475569';
        return $url;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
