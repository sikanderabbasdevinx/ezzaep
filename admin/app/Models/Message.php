<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
     protected $table = 'admin_message';
    protected $fillable = [
			      'title', 'message'
    ];

    public function setTitleAttribute($value) 
    {
      $value = strtolower($value);
      $this->attributes['title'] = ucwords($value);
    }

    /**
     * Format the message to keep consistency by
     * capitalizing the first character in the string
     * 
     * @param String $value
     */
    public function setMessageAttribute($value)
    {
      $this->attributes['message'] = ucfirst($value);
    }
}
