<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified', 'verification_token', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the verified user
     * @return bool
     */
    public function isVerified()
    {
        return $this->verified == USER::VERIFIED_USER;
    }

    /**
     * Get the admin status of user
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin == USER::ADMIN_USER;
    }

    /**
     * Generate verification code
     * @return mixed
     */
    public static function generateVerificationCode()
    {
        return Str::random(40);
    }
}
