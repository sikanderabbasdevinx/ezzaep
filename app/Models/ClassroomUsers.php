<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomUsers extends Model
{
    use HasFactory;
    protected $table = 'merithub_class_users';
    protected $fillable = [
      'user_id','parent_email_id','name','title', 'img', 'desc', 'lang','clientUserId','email','role','permission','timeZone'
    ];
}
