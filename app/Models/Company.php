<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

        // Table Name
        protected $table = 'companies';
        // Primary Key
        public $primaryKey = 'con_id';
        // Timestamps
        public $timestamps = true;
    
}
