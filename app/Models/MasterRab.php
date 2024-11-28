<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRab extends Model
{
        use HasFactory;

        protected $table = 'master_rab';
        protected $fillable = [
                'name',
        ];

        protected $hidden = [
                'created_at',
                'updated_at',
        ];
}
