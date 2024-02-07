<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class RiderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required|string',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'reenterpassword'=>'required|same:password|min:8',
            'start_date'=>'required|date|after:tomorrow',
            'end_date'=>'required|date|after:start_date',       //gt:start_date means end date must be grater then the 10 character.
            'phone_no'=>'required|digits:10|ends_with:0|starts_with:1',
            //'phone_no'=>'required|timezone:all',                  //valid mac address 
           // 'name' => 'required|uuid|url',                    //valid uuid or valid url
           // 'phone_no'=>'required|same:start_date'            //match with start date
            //'phone_no'=>'required_if:start_date,2024-03-02'   //this feild is required if start_date=2024-03-02
            //'phone_no'=>'required|in:123,234'                // it should be either 123 or 234
            //'phone_no'=>'required|ipv4|ipv6|ip|gt:start_date|lt:end_date'
        ]); 
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }      
        if ($validator->passes()) {
            $rider = Rider::create([
                'name' => $request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'reenterpassword'=>$request->reenterpassword,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'phone_no'=>$request->phone_no,
            ]);
            return response()->json([
                'message'=>'success',
                $rider
            ]);
        }
    }

    public function details(Request $request,)
    {
       $query=DB::table('riders')->where('name','jay')->get();
       $total_record = $query->count();
       return response()->json([
        $total_record,
        $query
    ]);
    }
    public function me(Request $request)
    {
        return $request->rider();
    }
}

