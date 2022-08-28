<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function __invoke(Request $request){
        $secret_key=85978;
        $user_key=$request->user_key;
        $data=[
            'user_name'=>'yousuf',
            'designation'=>'full stack designer',
            'mobile'=>'654654',
            'bank_acc'=>'65465465465465456',
        ];
        if($secret_key==$user_key){
            return response()->json([
                'user_info'=>$data
            ]);
        }else
        return response([
            'message'=>'Provide valid secret key'
        ], 404);
       }
}
