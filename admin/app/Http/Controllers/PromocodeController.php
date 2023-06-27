<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocode;
use Carbon\Carbon;
use App\Models\User;

class PromocodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function promocode()
    {
      $promocode = Promocode::where('promocode_type','onetime')->orderBy("created_at",'desc')->get();
    	$org_promocode = Promocode::where('promocode_type','org')->orderBy("created_at",'desc')->get();
        return view('promocode.index',compact('promocode','org_promocode'));
    }

    public function createPromocode(Request $request)
    {

    	$expire_date = Carbon::now()->addDay($request->expire_date)->format('Y-m-d H:i:s');

    	$promocode = new Promocode;
    	$promocode->promocode = $request->promocode;
    	$promocode->expire_date = $expire_date;
      if($request->number_of_use){
        $promocode->number_of_use = $request->number_of_use;
        $promocode->org_name = $request->org_name;
        $promocode->promocode_type = 'org';
      }
    	$promocode->save();
      	return back()->with('status','Promocode has been created successfully !');

    }

    public function deletePromocode($id)
    {
    	$data = Promocode::find($id)->delete();
      $updateRecord = User::where('promocode_id',$id)->update(['active' => 0]);

      	return back()->with('status','Promocode has been deleted successfully !');
//101 113 137 145 151
    }
}
