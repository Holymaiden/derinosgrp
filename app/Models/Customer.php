<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'customers';

    protected $fillable = [
        'perumahan_id',
        'nama',
        'nik',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'telepon',
        'email',
        'pekerjaan',
        'ktp',
        'kk',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
