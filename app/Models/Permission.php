<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'permission_id', 'role_id');
    }
}
