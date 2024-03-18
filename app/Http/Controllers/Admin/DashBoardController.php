<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use URL;
use Hash;

class DashBoardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }


    public function logout()
    {
        Auth::logout();
        $url = URL::current();

        if($url == 'admin/logout'){
            return redirect()->route('admin/login');
        }
        return redirect()->route('admin/login')->with('status', 'Your session has expired. Please log in again.');;
    }

    public function changePassword()
    {
        return view('admin.changepassword.change-password');
    }

    public function changePpasswordSave(Request $request)
    {
        $user_id = Auth::user()->id;
      
        $rules = [
            'old_password' => 'required|min:6|max:8',
            'new_password' => 'required|min:6|max:8|same:confirm_password',
            'confirm_password' => 'required|min:6|max:8|same:new_password'
            ];
    
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'error_type' => 'validation',
                'errors' => $validator->errors()
            ]);
        }   
        
      // $raw_pass =$request->input('new_password');
       
       $password = Hash::make($request->input('new_password'));

       DB::beginTransaction();
       try{
            $user = Auth::user();

            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'error_type' => 'wrong_password',
                    'errors' => $validator->errors()
                ]);
            }
            DB::table('users')->where('id', $user_id)->update([
                'password'=>$password,
                //'email_verification_token' => NULL
            ]);

            DB::commit();
            return response()->json([
                'success' => true
            ]);
        }
        catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }
    }
}
