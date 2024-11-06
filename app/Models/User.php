<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'configurationId',
        'packageId',
        'subscriptionExpireDate',
        'isAdmin',
        'isSuperUser'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function configuration()
    {
        return $this->hasOne(Configuration::class, 'id', 'configurationId');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'packageId');
    }

    // protected static function booted()
    // {
    //     static::created(function ($user) {
    //         $configuration = Configuration::create([
    //             'currency' => 'PLN',
    //             'taxRate' => 23
    //         ]);

    //         $user->configurationId = $configuration->id;
    //         $user->packageId = 1;
    //         $user->subscriptionExpireDate = Carbon::now()->addDays(14);
    //         $user->isAdmin = false;
    //         $user->isSuperUser = false;
    //         $user->save();
    //     });
    // }
}
