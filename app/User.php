<?php

namespace App;

use App\Notifications\UserRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Traits\HasRoles;
// use Spatie\Permission\Traits\HasPermissions;
use Spatie\Activitylog\Traits\LogsActivity;


class User extends Authenticatable
{
    use Notifiable;
    // use HasPermissions;
    use HasRoles;
    use LogsActivity;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'dob'
    ];
    protected static $logAttributes = ['name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static  function boot()
    {
        parent::boot();
        static::created(function ($model) {
            // $user = User::first();
            // $user->notify(new UserRegistered());
            $admins = User::all()->filter(function ($user) {
                return $user->hasRole('Admin');
            });
            Notification::send($admins, new UserRegistered($model));
        });
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class)->wherePivot('selected', 'session');
    }
}
