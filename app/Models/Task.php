<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
