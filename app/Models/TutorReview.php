<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorReview extends Model
{
    use HasFactory;
    protected $table = 'tutor_review';
    protected $fillable = [
      'name','email','title','company_name','rating','feedback'
    ];
}
