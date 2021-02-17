<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Template extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
