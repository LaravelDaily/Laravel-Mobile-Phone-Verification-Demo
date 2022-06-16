<?php

namespace App\Models;

use App\Traits\MustVerifyMobile;
use App\Interfaces\MustVerifyMobile as IMustVerifyMobile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements IMustVerifyMobile
{
    use HasApiTokens, HasFactory, Notifiable;
    use MustVerifyMobile;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'mobile_verify_code',
        'mobile_attempts_left',
        'mobile_last_send',
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
        'number_verified_at' => 'datetime',
        'mobile_last_send' => 'datetime',
    ];

    public function routeNotificationForVonage($notification)
    {
        return $this->mobile_number;
    }
}
