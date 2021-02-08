<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'propertys';

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
     * Offer
     * @return \App\Models\Offer
     */
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

}
