<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['fio', 'login', 'password', 'status'];

    public function Enterprises()
    {
        return $this->hasOne(Enterprises::class);
    }
}
