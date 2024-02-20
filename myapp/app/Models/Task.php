<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $connection = "my_database";
    protected $table = "tasks";
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
