<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesPrice extends Model
{
    use HasFactory;
    protected $table = 'tutor_packages_price';
    protected $fillable = [
      'package_id', 'number_of_student', 'price', 'gc_url','package_duration'
    ];
}
