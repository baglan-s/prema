<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Team
     * @return \App\Models\Team
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Propertys
     * @return \App\Models\Property
     */
    public function propertys()
    {
        return $this->hasMany(Property::class);
    }

}
