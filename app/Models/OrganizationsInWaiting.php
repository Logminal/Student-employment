<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationsInWaiting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'enterprises_id'];

    public function enterprises()
    {
        return $this->belongsTo(Enterprises::class);
    }
}
