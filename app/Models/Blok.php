<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    use HasFactory;

    protected $table = 'bloks';
    protected $fillable = [
        'perumahan_id',
        'customer_id',
        'kode',
        'panjang',
        'lebar',
        'luas',
        'harga_permeter',
        'harga_jual',
        'status_blok_id',
        'status_bayar_id',
        'keterangan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }

    public function status_blok()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_blok_id');
    }

    public function status_bayar()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_bayar_id');
    }
}
