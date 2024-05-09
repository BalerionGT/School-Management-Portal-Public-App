<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, boolean>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'admin',
        'chef',
        'phone',
        'fillière_id'
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

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
    }

        public function student()
    {
        return $this->hasOne(students::class);
    }

    public function professor()
    {
        return $this->hasOne(Professor::class);
    }
    public function hasAnyRoles($roles)
    {
        if($this->hasRole($roles))
        {
            return true;
        }
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name',$role)->first())
        {
            return true;
        }
            return false;
    }
    
    public function notifications()
    {
        return $this->morphMany(\Illuminate\Notifications\DatabaseNotification::class, 'notifiable')
            ->orderBy('created_at', 'desc');
    }
}
