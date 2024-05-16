<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'desk', 'date', 'user_id'];

    public function Enterprises()
    {
        return $this->belongsToMany(User::class, Enterprises::class);
    }
}
