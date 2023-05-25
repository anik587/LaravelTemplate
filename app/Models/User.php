<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_locked',
        'locked_at',
        'wrong_attempt',
        'password_expired_at',
        'password_reset_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        parent::boot();

        static::creating(function (self $item) {
            if ($item->isDirty('password')) {
                if ($item->password) {
                    $item->password = Hash::make($item->password);
 
                } else {
                    unset($item->password);
                }
            }
        });
        static::updating(function (self $item) {
            if ($item->isDirty('password')) {
                if ($item->password) {
                   // $item->password = Hash::make($item->password);
                    $item->password_expired_at = Carbon::now()->addDays(config('auth.password_expiry_days'))->toDateTimeString();
                    $item->password_reset_at = Carbon::now();

                } else {
                    unset($item->password);
                }
            }
        });
    }
}
