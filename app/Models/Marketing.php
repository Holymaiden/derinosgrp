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

    public function transaction($blok_id)
    {
        // where marketing id same and blok id same
        return $this->hasMany('App\Models\MarketingTransaction', 'marketing_id', 'id')->where('blok_id', $blok_id)->get();
    }
}
