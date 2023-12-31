<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBlok extends Model
{
    use HasFactory;

    protected $table = 'status_bloks';
    protected $fillable = [
        'status',
        'warna',
        'icon',
    ];
}
