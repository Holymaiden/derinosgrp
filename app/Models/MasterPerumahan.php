<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPerumahan extends Model
{
    use HasFactory;

    protected $table = 'master_perumahan';
    protected $fillable = [
        'nama_perumahan',
        'alamat',
        'url_maps',
    ];
}
