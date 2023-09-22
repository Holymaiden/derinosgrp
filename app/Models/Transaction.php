<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'perumahan_id',
        'customer_id',
        'blok_id',
        'count',
        'transaction',
        'transaction_date',
        'bukti_transfer'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id')->with('marketing');
    }

    public function blok()
    {
        return $this->hasOne('App\Models\Blok', 'id', 'blok_id');
    }
}
