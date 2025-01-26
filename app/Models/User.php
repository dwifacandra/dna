<?php

namespace App\Models;

use Filament\Panel;
use Filament\Models\Contracts\{HasAvatar, FilamentUser};
use Illuminate\{
    Contracts\Auth\MustVerifyEmail,
    Database\Eloquent\Factories\HasFactory,
    Foundation\Auth\User as Authenticatable,
    Notifications\Notifiable,
    Support\Str,
};

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
            'name' => 'string',
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
