<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['type_of_documents', 'scanned_documents', 'students_id'];
}
