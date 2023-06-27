<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledClass extends Model
{
    use HasFactory;
    protected $table = 'merithub_scheduled_classes';
    protected $fillable = [
      'end_time','parent_email_id','start_time','title', 'status','duration', 'description', 'lang','layout','access','type','login','timeZoneId','autoRecord', 'recordingDownload', 'recordingControl', 'participantControl(Write)', 'participantControl(Audio)', 'participantControl(Video)', '	schedule', 'classId','commonHostLink','commonModeratorLink','commonParticipantLink', 'hostLink','new_classroom_created_status'
    ];
}
