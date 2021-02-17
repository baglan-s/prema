<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Template;

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

    public function templates()
    {
        return $this->belongsToMany(Template::class);
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
