<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TaskChange extends Model
{
    use HasFactory;

    /*  This function defines that a TaskChange is associated with one specific Task  */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
