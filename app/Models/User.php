<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * User status definitions
     */
    const UNCONFIRMED = 'Unconfirmed';
    const ACTIVE = 'Active';
    const BANNED = 'Banned';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relations to eager load on every query.
     * @var array
     */
    protected $with = [
        'teams',
    ];

    /**
     * Teams
     * @return \App\Models\Team
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class)
            ->where('status', 1);
    }

    /**
     * Get the user teams ids
     * @return array
     */
    public function teamIds()
    {
        $ids = [];
        if (count($this->teams)) {
            foreach ($this->teams as $item) {
                $ids[] = $item->id;
            }
        }
        return $ids;
    }

    public function isAdmin() {
        return $this->role->name === 'admin';
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
