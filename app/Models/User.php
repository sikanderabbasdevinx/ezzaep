<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','last_name','is_admin','role_id','role','dob','gender','phone_number','address','age','expertise','relevent_experience','qualifications','how_many_students','tutoring_days_time','tutoring_subject','tutor_packages','package_duration','active','merithub_class_users_id','timezone','promocode_id','tutor_id','tutoring_days','tutoring_time','uploaded_doc','submitted_doc','uploaded_doc_path','submitted_doc_path','profile_image' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
