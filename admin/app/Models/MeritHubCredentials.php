<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeritHubCredentials extends Model
{
   // use HasFactory;
	protected $table = 'merithub_credentials';
    protected $fillable = [
      'client_id', 'client_secret', 'jwt_token', 'access_token'
    ];
}
