<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * User
     * @return \App\Models\User
     */
//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    /**
     * Offers
     * @return \App\Models\Offer
     */
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

}
