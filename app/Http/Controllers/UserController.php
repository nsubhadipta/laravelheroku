<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_detail;
use DB;

class UserController extends Controller
{
  public function getAllUser() {
      $user = User::get()->toJson(JSON_PRETTY_PRINT);
      return response($user, 200);
  }

  public function createUser(Request $request) {
    $chk = User::where('email', '=', $request->email)->first();
    if($chk) {
      return response()->json([
          "message" => "email already exists!"
        ], 404);
    } else {
        $userr = new User;
        $userr->name = $request->name;
        $userr->email = $request->email;
        // $userr->password = bcrypt($request->password);
        $userr->password = $request->password;
        $userr->gender = $request->gender;
        // $employee->email = $request->email;
        $userr->save();
    
        return response()->json(['records'=>$userr,
            "message" => "User record created"
        ], 201);
        
    }
  }

  public function getUser($id) {
    if (User::where('id', $id)->exists()) {
        $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 200);
      } else {
        return response()->json([
          "message" => "User not found"
        ], 404);

      }
  }

  public function login(Request $request) {
    $chk = User::where('email', '=', $request->email)->first();
    $chk2 = User::where('password', '=', $request->password)->first();
    if($chk && $chk2) {
      $user = User::where('email', '=', $request->email)->first();
        $output ['status']=TRUE;
        $output ['message']='Login Successfull';
        $output ['result']=$user;
        return response($output, 200);
    }else{
      return response()->json([
        "message" => "Invalid Email and Password"
      ], 404);
    }

    
  }

  //user Details
  public function getUserDetails($id) {
    if (user_detail::where('user_id', $id)->exists()) {
        $user = user_detail::where('user_id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 200);
      } else {
        return response()->json([
          "message" => "User not found"
        ], 404);

      }
  }

  public function AddUserDetails(Request $request, $user_id) {
    $employe = new user_detail;
    $employe->user_id = $user_id;
    $employe->phone = $request->phone;
    $employe->address = $request->address;
    $employe->city = $request->city;
    $employe->zip = $request->zip;
    $employe->save();

    return response()->json([
        "message" => "User Details record created"
    ], 201);
  }
  

  public function deleteUserDetails ($id) {
    if(user_detail::where('id', $id)->exists()) {
      $employe = user_detail::find($id);
      $employe->delete();

      return response()->json([
        "message" => "records deleted"
      ], 202);
    } else {
      return response()->json([
        "message" => "User Details not found"
      ], 404);
    }
  }
  public function alluff($name=NULL){
    echo $name; exit();
  }

  public function search($query=NULL){
    // echo $name; exit();
    $exq='';
    if ($query!=NULL) {
      $exq=' AND name LIKE "%'.$query.'%" ';

      $qr=' select * from user where status=1 '.$exq.' ';


      $events = DB::select($qr);
        $output ['status']=TRUE;
        $output ['message']='Data Fetched Successfull';
        $output ['result']=$events;
        if (count($events)==0) {
          return response()->json([
            "message" => "No Result Found....."
          ], 404);
        }
        return response($output, 200);
    }else {
      return response()->json([
        "message" => "No Result Found"
      ], 404);
    }
  }


}