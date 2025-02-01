<?php

namespace App\Models;

use App\Core\Enums\Gender;
use Filament\Panel;
use Filament\Models\Contracts\{HasAvatar, FilamentUser};
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Spatie\Permission\Traits\HasRoles;
use Illuminate\{
    Contracts\Auth\MustVerifyEmail,
    Database\Eloquent\Factories\HasFactory,
    Foundation\Auth\User as Authenticatable,
    Notifications\Notifiable,
    Support\Str,
};

class User extends Authenticatable implements HasAvatar, FilamentUser, HasMedia, MustVerifyEmail
{
    use HasFactory, Notifiable, InteractsWithMedia, HasRoles, HasSuperAdmin;
    protected $fillable = [
        'name',
        'birthday',
        'gender',
        'phone',
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
            'birthday' => 'date',
            'gender' => Gender::class,
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
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
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('Adminstrator');
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
