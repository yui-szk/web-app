<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $connection = "tasks";

    protected $table = "tasks";
    protected $primaryKey = "id";
}


