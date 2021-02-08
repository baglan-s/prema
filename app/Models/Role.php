<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'removable' => 'boolean'
    ];

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'display_name',
        'description', 'removable'
    ];

    /**
     * Users
     * @return \App\Models\User
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }

}
