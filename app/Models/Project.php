<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = []; // does not allow massive assignment to the table

    // Table Name
    protected $table = 'projects';
    // Primary Key
    public $primaryKey = 'pro_id';
    // Timestamps
    public $timestamps = true;

     //relation with Tasks table by pro_id key
     public function proTasks()
     {
       return $this->hasMany(Task::class, 'tas_pro_id');
     }    
    

}
