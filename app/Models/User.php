<?php

namespace App\Models;


use Filament\Panel;
use App\Models\LicenseApplication;
use Filament\Models\Contracts\HasName;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasName
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'nic',
        'last_name',
        'email',
        'password',
        'address',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function license()
    {
        return $this->hasOne(License::class, 'user_id', 'id');
    }

    public function penalties()
    {
        return $this->hasMany(Penalty::class, 'user_id', 'id');
    }

    // explicit policy for filament admin access
    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->is_admin;
        }
        return false;
    }

    public function getFilamentName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function licenceApplications()
    {
        return $this->hasOne(LicenseApplication::class, 'user_id', 'id');
    }
}
