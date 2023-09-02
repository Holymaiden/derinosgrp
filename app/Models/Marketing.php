<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;

    protected $table = 'marketing';
    protected $fillable = [
        'nama',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
