<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'school_id',
        'email',
        'phone',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
