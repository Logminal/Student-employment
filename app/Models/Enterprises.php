<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprises extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['employer', 'name', 'user_id'];
}
