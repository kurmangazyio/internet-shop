<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string password
 */
final class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
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
    ];

    public static function hasUser(string $email): bool
    {
        return User::where('email', $email)->exists();
    }

    public static function getUser(string $email): User | null
    {
        return User::where('email', $email)->first();
    }

    public static function createUser(string $name, string $surname, string $email, string $password): User
    {
        return User::create([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $password,
        ]);
    }

    public static function passwordMatch(string $email, string $password): bool
    {
        return User::where('email', $email)->where('password', $password)->exists();
    }
}
