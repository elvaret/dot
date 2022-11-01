<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //dot pertemuan 6
    protected $fillable = ["name", "file_path", "created_at", "updated_at"];
}
