<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'is_superadmin',
        'is_support'
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

    // Mutator
    protected function password():Attribute //
    {
        return new Attribute(
            set: fn($value) => Hash::make($value)   //Mutator
        );
    }

    protected function name():Attribute //
    {
        return new Attribute(
            get: fn($value) => ucwords($value),     //Casting
            set: fn($value) => strtolower($value)   //Mutator
        );
    }

    public function tickets() {
        return $this->hasMany('App\Models\Ticket', 'user_id')->orderBy('created_at', 'DESC');
    }
}
