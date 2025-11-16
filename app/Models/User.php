<?php

namespace App\Models;

use App\Enums\UserStatus;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'status',
        'email_verified_at',
        'last_login',
        'profile_image',
        'phone',
        'date_of_birth',
        'gender',
        'verification_code',
        'verification_code_expires_at'
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'verification_code'
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
        'date_of_birth' => 'date',
        'verification_code_expires_at' => 'datetime',
        'status' => UserStatus::class
    ];
    public function generateVerificationCode()
    {
        $this->verification_code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->verification_code_expires_at = now()->addMinutes(30);
        $this->save();

        return $this->verification_code;
    }

    public function verifyCode($code)
    {
        if (
            $this->verification_code === $code &&
            $this->verification_code_expires_at->isFuture()
        ) {
            $this->email_verified_at = now();
            $this->verification_code = null;
            $this->verification_code_expires_at = null;
            $this->save();

            return true;
        }

        return false;
    }

    public function hasValidVerificationCode()
    {
        return $this->verification_code && $this->verification_code_expires_at->isFuture();
    }
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole(['administrator', 'editor']);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_images')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // $this->addMediaConversion('preview1')
        //       ->width(100);

        // $this->addMediaConversion('preview2')
        //       ->width(200);

        // $this->addMediaConversion('preview3')
        //       ->width(300);
        $this->addMediaConversion('preview1')
            ->fit(Fit::Crop, 150, 150)
            ->width(150)
            ->height(150)
            ->sharpen(10)
            ->useLoadingAttributeValue('lazy')
            ->nonQueued()
            ->performOnCollections('profile_images');

        $this->addMediaConversion('preview2')
            ->fit(Fit::Contain, 300, 300)
            ->width(300)
            ->height(300)
            ->format('webp')
            ->quality(80)
            ->queued()
            ->performOnCollections('profile_images');

        $this->addMediaConversion('preview3')
            ->fit(Fit::Crop, 600, 600)
            ->width(600)
            ->height(600)
            ->format('webp')
            ->quality(85)
            ->performOnCollections('profile_images');

        $this->addMediaConversion('raw_no_optimize')
            ->width(800)
            ->height(600)
            ->nonOptimized()
            ->performOnCollections('profile_images');
    }
}
