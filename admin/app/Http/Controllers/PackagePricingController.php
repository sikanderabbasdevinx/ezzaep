<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackagesPrice;
use DB;

class PackagePricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pricing()
    {
        $packageList = DB::table('tutor_package')->select('*')->get();

        $packagePrice = array();
        $upto4stuPrice = PackagesPrice::select('package_id','price')->where('number_of_student','upto4')->get()->toArray();
        $upto8stuPrice = PackagesPrice::select('package_id','price')->where('number_of_student','upto8')->get()->toArray();
        $upto12stuPrice = PackagesPrice::select('package_id','price')->where('number_of_student','upto12')->get()->toArray();
        $upto16stuPrice = PackagesPrice::select('package_id','price')->where('number_of_student','upto16')->get()->toArray();
        $upto20stuPrice = PackagesPrice::select('package_id','price')->where('number_of_student','upto20')->get()->toArray();
        $packagePrice[]['Upto 4'] = $upto4stuPrice;
        $packagePrice[]['Upto 8'] = $upto8stuPrice;
        $packagePrice[]['Upto 12'] = $upto12stuPrice;
        $packagePrice[]['Upto 16'] = $upto16stuPrice;
        $packagePrice[]['Upto 20'] = $upto20stuPrice;


        return view('package_pricing.index',compact('packageList','packagePrice'));            
    }

    public function EditPricing(Request $request)
    {
        $packageList = DB::table('tutor_package')->select('*')->get();

    	return view('package_pricing.update',compact('packageList'));
    }

    public function UpdatePrice(Request $request)
    {
    	$packagePrice = PackagesPrice::where('package_id',$request->package_id)
								->where('number_of_student',$request->number_of_student)
								->first();

		$packagePrice->price = $request->price;
		if(isset($request->gc_url))
		{
			$packagePrice->gc_url = $request->gc_url;
		}
		$packagePrice->save();
      	return back()->with('status','Package price updated successfully !');
		
    }
}
