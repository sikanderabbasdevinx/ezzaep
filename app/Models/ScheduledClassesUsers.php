<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledClassesUsers extends Model
{
    use HasFactory;

    
    protected $table = 'merithub_scheduled_classes_users';
    protected $fillable = [
      'class_id','user_id','user_link'
    ];
}
