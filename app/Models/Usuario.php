<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $guarded = []; // does not allow massive assignment to the table

    // Table Name
    protected $table = 'usuarios';
    // Primary Key
    public $primaryKey = 'usu_id';
    // Timestamps
    public $timestamps = true;
}
