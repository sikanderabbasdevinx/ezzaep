<?php
use App\Models\User;

function getPackageName($package){
        $packageName = $package == '1'?'Tutor Platform & Digital Classoom (a)':
                        ($package=='1+2'?'Tutor Platform & Advanced Digital Classroom (A+B)':
                        ($package=='1+2+3'?'Tutor Platform & Advanced Digital Classroom & Tutor/Student Workflow Management (A+B+C)':
                        ($package=='1+2+3+4'?'Tutor Platform & Advanced Digital Classroom & Tutor/Student Workflow & Student Performance Management (A+B+C+D)':
                        ($package == '1+3'?'Tutor Platform & Digital Classroom + Tutor/Student Workflow Management (A+C)':
                        ($package == '1+3+4'?'Tutor Platform & Digital Classroom + Tutor/Student Workflow Management + Student Performance Management (A+C+D)':'Tutor Login Using Promocode.')))));

        return $packageName;
    }
    
    
function checkPromoUse($id){
    $userCount = User::where('promocode_id',$id)->count();
    return $userCount;
}
    
?>