<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingTransaction extends Model
{
    use HasFactory;

    protected $table = 'transaction_marketing';
    protected $fillable = [
        'perumahan_id',
        'marketing_id',
        'blok_id',
        'count',
        'transaction',
        'transaction_date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function marketing()
    {
        return $this->hasOne('App\Models\Marketing', 'id', 'marketing_id');
    }

    public function blok()
    {
        return $this->hasOne('App\Models\Blok', 'id', 'blok_id');
    }
}
