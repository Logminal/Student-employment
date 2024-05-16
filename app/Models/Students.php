<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['fio', 'enterprises_id', 'specializations_id', 'teachers_id', 'user_id', 'phone'];

    public function enterprises()
    {
        return $this->belongsTo(Enterprises::class);
    }

    public function specializations()
    {
        return $this->belongsTo(Specializations::class);
    }

    public function teachers()
    {
        return $this->belongsTo(Teachers::class);
    }

    public function documents()
    {
        return $this->hasMany(Documents::class);
    }
}
