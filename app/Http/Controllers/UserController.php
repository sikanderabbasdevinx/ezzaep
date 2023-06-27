<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ScheduledClass;
use App\Models\ScheduledClassesUsers;
use App\Models\TutorReview;
use Illuminate\Support\Facades\DB;
use App\Models\Faq;
use \Carbon\Carbon;
use App\Models\ClassroomUsers;
use App\Models\Student;
use App\Models\MeritHubCredentials;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUsers()
    {
        $users = User::where('active','1')->where('role_id','2')->get();
    	$inActiveUsers = User::where('active','0')->where('role_id','2')->get();
        
        return view('user.users_list',compact('users','inActiveUsers'));

    }
    function getPackageName($package){ 
        $packageName = $package == '1'?'Tutor Platform & Digital Classoom (a)':
                        ($package=='1+2'?'Tutor Platform & Advanced Digital Classroom (A+B)':
                        ($package=='1+2+3'?'Tutor Platform & Advanced Digital Classroom & Tutor/Student Workflow Management (A+B+C)':
                        ($package=='1+2+3+4'?'Tutor Platform & Advanced Digital Classroom & Tutor/Student Workflow & Student Performance Management (A+B+C+D)':
                        ($package == '1+3'?'Tutor Platform & Digital Classroom + Tutor/Student Workflow Management (A+C)':
                        ($package == '1+3+4'?'Tutor Platform & Digital Classroom + Tutor/Student Workflow Management + Student Performance Management (A+C+D)':'Tutor Login Using Promocode.')))));

        return $packageName;
    }

    public function getUsersDetails($id)
    {

    	$user = User::find($id);
    	if($user->role_id == '2')
    	{
    		$scheduleClasses = ScheduledClass::where('parent_email_id',$user->email)->where('end_time','>=',Carbon::today())->orderBy('start_time','desc')->get();
    		$students = User::where('tutor_id',$user->id)->where('active','1')->get();
            $currentPackage = $this->getPackageName($user->tutor_packages);
          
    		return view('user.user_details',compact('scheduleClasses','students','user','currentPackage'));
    	}
    	elseif($user->role_id == '3')
    	{
    		$scheduleClasses = ScheduledClassesUsers::join('merithub_scheduled_classes', 'merithub_scheduled_classes_users.class_id', '=', 'merithub_scheduled_classes.classId')->where('user_id',$user->merithub_class_users_id)->get();

    		return view('user.student_scheduled_classes',compact('scheduleClasses'));
    	}
    	else
    	{
    		return false;
    	}


    }

    public function getTutorReviews()
    {
    	$tutor_reviews = TutorReview::orderBy('created_at','desc')->get();
    	return view('user.tutor_review',compact('tutor_reviews'));
    }

    public function editTutorReviews($id)
    {
    	$tutor_reviews = TutorReview::find($id);
    	return view('user.edit_tutor_review', compact('tutor_reviews'));
    }

    public function updateTutorReviews(Request $request)
    {

    	$tutor_review = TutorReview::find($request->id);
    	$tutor_review->name = $request->name;
    	$tutor_review->email = $request->email;
    	$tutor_review->company_name = $request->company_name;
    	$tutor_review->title = $request->title;
    	$tutor_review->rating = $request->rating;
    	$tutor_review->feedback = $request->feedback;
    	$tutor_review->save();

      	return back()->with('status','Tutor Review Updated successfully !');

    }

    public function deleteTutorReviews($id)
    {
    	$data = TutorReview::find($id)->delete();
      	return back()->with('status','Tutor Review has been deleted successfully !');
    }

    public function approveTutorReviews($id)
    {
    	$data = TutorReview::find($id);
    	$data->approved = '1';
    	$data->save();
      	return back()->with('status','Tutor Review has been approved successfully !');
    }

    public function getVideoLink()
    {
        $video = DB::table('dashboard_video')->first();
        return view('user.video',compact('video'));
    }

    public function updateVideoLink(Request $request)
    {

        $video = DB::table('dashboard_video')->where('id',$request->id)->update(['link'=>$request->link]);
        if($video){
            return back()->with('status','Video Link Updated successfully !');
        }else{
            return back()->with('error','Video Link Not Updated !');
        }

    }

    public function getSocialLink()
    {
        $social_medias = DB::table('social_media_links')->get();
        return view('user.social_media',compact('social_medias'));
    }

    public function updateSocialLink(Request $request)
    {

        $data = DB::table('social_media_links')->where('id',$request->id)->update(['link'=>$request->link]);
        if($data){
            return back()->with('status','social Media Link Updated successfully !');
        }else{
            return back()->with('error','social Media Link Not Updated !');
        }

    }

    public function faqList(Request $request)
    {
        $faqList = Faq::all()->sortByDesc("created_at");
        return view('user.faq',compact('faqList'));
    }

    public function updateFaq(Request $request)
    {
        $data = Faq::find($request->id);
        $data->answer = $request->answer;
        $data->save();
        return back()->with('status','Faq Answer Updated successfully !');
    }

    public function deleteFaq(Request $request)
    {
         $data = Faq::find($request->id);
         $data->deleted_at = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
         $data->save();
         return back()->with('status','Faq removed successfully. !');
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);
        $user_email = $user->email;
        $registeredUser = ClassroomUsers::where('parent_email_id',$user_email)->get();
        foreach ($registeredUser as $Student) {
            $this->deleteUsersFromMerithub($Student->user_id);
        }

        // if(!empty($user->merithub_class_users_id)){
        //     $this->deleteUsersFromMerithub($user->merithub_class_users_id);
        // }
        ClassroomUsers::where('parent_email_id',$user_email)->delete();

        Student::where('tutor_id',$id)->delete();

        
        $user = $user->delete();
        return back()->with('status','User has been deleted successfully !');
    }

    public function getAccessToken(){
        $data = MeritHubCredentials::first();
        return $data->access_token;
    }

    public function getClientId(){
        $data = MeritHubCredentials::first();
        return $data->client_id;
    }

    public function deleteUsersFromMerithub($id){
        $client_id = $this->getClientId();
        $access_token = $this->getAccessToken();
        $user_id = $id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://serviceaccount1.meritgraph.com/v1/'.$client_id.'/users/'.$user_id.'',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'DELETE',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '.$access_token
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }



}
