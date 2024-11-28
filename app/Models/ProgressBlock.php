<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressBlock extends Model
{
        use HasFactory;

        protected $table = 'progress_block';
        protected $fillable = [
                'perumahan_id',
                'blok_id',
                'date',
                'progress',
                'noted',
                'images',
                'status'
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
}
