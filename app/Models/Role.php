<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{

    /*  This function defines a many-to-many relationship - Many Roles can have many Permissions*/
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }
    
    /*  This function defines a one-to-many relationship - One Role can have many Users*/
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
