<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'tests';
    // Primary Key
    public $primaryKey = 'tas_id';
    // Timestamps
    public $timestamps = true;


}
