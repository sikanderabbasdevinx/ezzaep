<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;
    protected $table = 'classroom_promocode';
    protected $fillable = [
      'promocode','used_status','expire_date','org_name'
    ];
}
