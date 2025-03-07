<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\TheDivision;
use App\Models\TheOffice;
use App\Models\PpersonnelTable;

use NotificationChannels\WebPush\HasPushSubscriptions;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasPushSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    function getdivs() {
        return $this->hasOne(TheDivision::class,"divisionid","divisionid");
    }

    // function getUsers() {
    //     return $this->hasOne(User::class,"id","userid");
    // }

    function offtype() {
        return $this->hasOne(TheOffice::class,"officeid","officeid");
    }

    function getprofile() {
        return $this->hasone(PpersonnelTable::class,"userid","id");
    }
}
