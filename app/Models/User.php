<?php

namespace App\Models;

use App\Core\Enums\Gender;
use Filament\Panel;
use Filament\Models\Contracts\{HasAvatar, FilamentUser};
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Spatie\Permission\{Traits\HasRoles, Models\Role};
use Illuminate\{
    Contracts\Auth\MustVerifyEmail,
    Database\Eloquent\Factories\HasFactory,
    Foundation\Auth\User as Authenticatable,
    Notifications\Notifiable,
    Support\Str,
};

class User extends Authenticatable implements HasAvatar, FilamentUser, HasMedia, MustVerifyEmail
{
    use HasFactory, Notifiable, InteractsWithMedia, HasRoles;
    protected $fillable = [
        'name',
        'birthday',
        'gender',
        'phone',
        'email',
        'password',
        'email_verified_at',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'name' => 'string',
            'birthday' => 'date',
            'gender' => Gender::class,
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected static function booted(): void
    {
        static::created(function (User $user) {
            $role = Role::firstOrCreate(['name' => 'Creator']);
            $user->assignRole($role);
        });
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('users_avatar')
            ->useFallbackUrl($this->getFilamentAvatarUrl())
            ->useFallbackPath(public_path('/img/image.svg'))
            ->useDisk('private');
    }
    public function getFilamentAvatarUrl(): ?string
    {
        $prefix = urlencode(Str::substr($this->name, 0, 2));
        $avatar = 'https://ui-avatars.com/api/?name=' . $prefix . '&color=f8fafc&background=475569';
        $media = $this->getFirstMedia('users_avatar');
        if ($media) {
            return $media->getTemporaryUrl(now()->addHours(24));
        } else {
            return $avatar;
        }
    }
    public function getShortNameAttribute(): string
    {
        $fullName = $this->name;
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0];
        $middleInitial = isset($nameParts[2]) ? strtoupper(substr($nameParts[1], 0, 1)) : '';
        $lastInitial = strtoupper(substr($nameParts[count($nameParts) - 1], 0, 1));
        return trim($firstName . ' ' . $middleInitial . '.' . $lastInitial);
    }
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole(['Adminstrator', 'Creator']);
    }
    public function accounts()
    {
        return $this->hasMany(UserAccount::class);
    }
    public function skills()
    {
        return $this->hasMany(ResumeSkill::class);
    }
}
