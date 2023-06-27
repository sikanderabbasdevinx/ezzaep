<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showChangePassword(){
        return view('profile.changePassword');

    }

    public function changePassword(Request $request) {
        
        $validator = Validator::make($request->all(),[  
            'old_pwd' => 'required',
            'new_pwd' => 'required',
            'confirm_pwd' => 'required',
        ]);

        if ($validator->fails()) { 
            return redirect()->route('profile.showChangePassword',Auth()->user()->id)->with('status','Field(s) should not be null');
        }

        $user = Auth::user();
        $adminId = $user->id;
        $email = $user->email;
        $old_pwd = $request->old_pwd;
        $new_pwd = $request->new_pwd;
        $confirm_pwd = $request->confirm_pwd;

        if(Auth::attempt(array('email' => $email, 'password' => $old_pwd))) {

            if($new_pwd == $confirm_pwd){
                $password = bcrypt($new_pwd);
                $updated_at = Carbon::now()->format('Y-m-d H:i:s');
                try {
                    User::where('id',$adminId)->update(['password' => $password, 'updated_at' => $updated_at]);
                } catch(\Exception $e) {
                    $response = ['success' => false, 'message' => $e->getMesage()];
                }

            }else{
                return redirect()->route('profile.showChangePassword',Auth()->user()->id)->with('status','New Password & Confirm Password do not match');
            }
        }else{
            return redirect()->route('profile.showChangePassword',Auth()->user()->id)->with('status','Old Password is not correct.');
       }
         
       return redirect()->route('home')->with('status','Password Changed Successfully');
    }

}
