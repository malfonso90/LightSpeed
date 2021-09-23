<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = []; // does not allow massive assignment to the table

    // Table Name
    protected $table = 'tasks';
    // Primary Key
    public $primaryKey = 'tas_id';
    // Timestamps
    public $timestamps = true;

}
