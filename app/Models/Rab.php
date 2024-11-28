<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
        use HasFactory;

        protected $table = 'rab';
        protected $fillable = [
                'perumahan_id',
                'blok_id',
                'master_rab_id',
                'amount',
                'unit',
                'price',
                'total',
                'noted'
        ];

        protected $hidden = [
                'created_at',
                'updated_at',
        ];

        public function block()
        {
                return $this->hasOne('App\Models\Blok', 'id', 'blok_id');
        }

        public function perumahan()
        {
                return $this->hasOne('App\Models\Perumahan', 'id', 'perumahan_id');
        }

        public function masterRab()
        {
                return $this->hasOne('App\Models\MasterRab', 'id', 'master_rab_id');
        }
}
