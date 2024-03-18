<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\HealthCare;
use DB;
use Auth;

class HealthCareController extends Controller
{
    public function index()
    {
        $healthCares = DB::table('health_cares')->whereIn('status',[0,1])->get();
        return view('admin.health.index',compact('healthCares'));
    }

    public function healthCreate(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('admin.health.create');
        }

        $rules = [
            'title'       => 'required',
            'image'       =>  'required',
            'description' => 'required',
            'appointments' => 'sometimes|required',
        ];

            $validation = Validator::make($request->all(), $rules);

            if ($validation->fails()) {

                return response()->json([
                    'success' => false,
                    'errors' => $validation->errors()
                ]);
            }

        DB::beginTransaction();
        try{

            $val = count($request->file('image'));
            if($val > 2){
                return response()->json([
                    'success' => false,
                    'errors' => ['image' => 'you need to select only two image only!'],
                    'error_type'=>'validation'
                ]);   
            }
            
            $attach_on_select=[];
            $allowedextension=['jpg','jpeg','png','svg','pdf','JPG','PDF','JPEG','PNG'];
            
            if($request->hasFile('image') && $request->file('image') !="")
            {
                $filePath = public_path('/uploads/health/'); 
                $files= $request->file('image');
                if(!File::exists($filePath))
                {
                    File::makeDirectory($filePath, $mode = 0777, true, true);
                }
                foreach($files as $file)
                {
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension,$allowedextension);

                    if(!$check)
                    {
                        return response()->json([
                            'success' => false,
                            'errors' => ['image' => 'Only jpg,jpeg,png,pdf,PNG,JPG,JPEG are allowed !'],
                            'error_type'=>'validation'
                        ]);                        
                    }
                }

                
                foreach($files as $file)
                {
                    $file_data = $file->getClientOriginalName();
                    $tmp_data  = date('mdYHis').'-'.$file_data; 
                    $data = $file->move($filePath, $tmp_data);       
                    $attach_on_select[]=$tmp_data;
                    $path=public_path()."/uploads/health/".$tmp_data;
                    
                }
                // dd($attach_on_select);
            }
           
            $chose_point=[];
            if($request->has('appointments'))
            {
                if(count($request->appointments)>0)
                {
                    foreach ($request->appointments as $value) 
                    {
                        $chose_point[] = $value;
                    }
                }
                $json_array = json_encode($chose_point);
            }
            
           

            $data = [
                'title'    => $request->input('title'),
                'image'    =>  count($attach_on_select)>0 ? implode(',',$attach_on_select) : NULL,
                'description' => $request->input('description'),
                'appointments' => count($chose_point) > 0 ? json_encode($chose_point) : NULL,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
            DB::table('health_cares')->insert($data);
        
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

    public function healthmanageEdit(Request $request)
    {
        $he_id = base64_decode($request->id);
    
        $healthCare  = DB::table('health_cares')->where('id',$he_id)->first();
        $healthsingle  = DB::table('health_cares')->where('id',$he_id)->first();
        return view('admin.health.edit',compact('healthCare','healthsingle'));
    }

    public function healthmanageDataDeleted(Request $request)
    {
        $id = base64_decode($request->id);

        $choose_id = base64_decode($request->customer_id);

        DB::beginTransaction();
        try{
            if(Auth::check()){

                $why_choose = DB::table('health_cares')->where(['id'=>$choose_id])->first();

                $spoke_arr = [];

                $spoke_arr = json_decode($why_choose->appointments,2);

                unset($spoke_arr[$id]);

                DB::table('health_cares')->where(['id'=>$choose_id])->update([
                    'appointments' => count($spoke_arr) > 0 ? json_encode($spoke_arr) : NULL
                ]);
                
                //return result 
                 
                    
                DB::commit();
                return response()->json([
                'status'=>'ok',
                'message' => 'deleted',                
                ], 200);
    
            }
            else{   
                return response()->json([
                    'status' =>'no',
                    ], 200);
            }
        }
        catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }       
    }

    public function healthmanageUpdate(Request $request)
    {
        $cms_id = base64_decode($request->id);

        $rules = [
            'title'      => 'required',
            'image'      =>  'nullable',
            'description'      => 'required',
            'appointments' => 'sometimes|required',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);

        }

       // $old_image = DB::table('health_cares')->where('id',$cms_id)->first();

        DB::beginTransaction();
        try{

            $val = count($request->file('image'));
            if($val > 2){
                return response()->json([
                    'success' => false,
                    'errors' => ['image' => 'you need to select only two image only!'],
                    'error_type'=>'validation'
                ]);   
            }
            
            $attach_on_select=[];
            $allowedextension=['jpg','jpeg','png','svg','pdf','JPG','PDF','JPEG','PNG'];
            
            if($request->hasFile('image') && $request->file('image') !="")
            {
                $filePath = public_path('/uploads/health/'); 
                $files= $request->file('image');
                if(!File::exists($filePath))
                {
                    File::makeDirectory($filePath, $mode = 0777, true, true);
                }
                foreach($files as $file)
                {
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension,$allowedextension);

                    if(!$check)
                    {
                        return response()->json([
                            'success' => false,
                            'errors' => ['image' => 'Only jpg,jpeg,png,pdf,PNG,JPG,JPEG are allowed !'],
                            'error_type'=>'validation'
                        ]);                        
                    }
                }

                
                foreach($files as $file)
                {
                    $file_data = $file->getClientOriginalName();
                    $tmp_data  = date('mdYHis').'-'.$file_data; 
                    $data = $file->move($filePath, $tmp_data);       
                    $attach_on_select[]=$tmp_data;
                    $path=public_path()."/uploads/health/".$tmp_data;
                    
                }
                // dd($attach_on_select);
            }
           

            $chose_point=[];
            if($request->has('appointments'))
            {
                if(count($request->appointments)>0)
                {
                    foreach ($request->appointments as $value) 
                    {
                        $chose_point[] = $value;
                    }
                }
                $json_array = json_encode($chose_point);
            }

            $data1 =   DB::table('health_cares')->where('id',$cms_id)->first();
            $status = $data1->status;

            $data = [
                'title'    => $request->input('title'),
                'image'    =>  count($attach_on_select)>0 ? implode(',',$attach_on_select) : NULL,
                'description' => $request->input('description'),
                'appointments' => count($chose_point) > 0 ? json_encode($chose_point) : NULL,
                'status' =>   $status,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::table('health_cares')->where('id',$cms_id)->update($data);

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

    public function healthmanageDelete(Request $request)
    {
        $he_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $baneer =  HealthCare::find($he_id);
            $baneer->status = '2';
            $baneer->save();

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


    public function healthmanageStatus(Request $request)
    {
        $id=base64_decode($request->id);
        $type = base64_decode($request->type);
        // dd($id);

        if($type=='active')
        {
            DB::table('health_cares')->where(['id'=>$id])->update([
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }
        else
        {
            DB::table('health_cares')->where(['id'=>$id])->update([
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }

       
        return response()->json([
            'status' => 'ok',
            'type' => $type
        ]);
    }

    public function healthImageRemove(Request $request)
    {
        $id =  $request->input('id');
      
        $file_id =  $request->input('file_id');

        DB::beginTransaction();
        try{

            $fileData = DB::table('health_cares')->where(['id'=>$id])->first();
            $spoke_arr = explode(',',$fileData->image);

            $index = array_search($file_id, $spoke_arr);
            
            if ($index !== false) {
                unset($spoke_arr[$index]);
            }
            DB::table('health_cares')->where(['id'=>$id])->update([
                'image' => count($spoke_arr) > 0 ? implode(',',$spoke_arr) : NULL
            ]);
           // Do something when it fails
           return response()->json([
               'fail' => false,
               'message' => 'File removed!'
           ]);
         }
         catch (\Exception $e) {
             DB::rollback();
             // something went wrong
             return $e;
         }       
    }

    public function healthmanageTrash()
    {
        $trashData = HealthCare::where('status','2')->get();
        return view('admin.health.trash_data',compact('trashData'));;
    }

    public function healthmanageRestoreData(Request $request)
    {
        $h_id = base64_decode($request->id);
        // dd($card_id);
        DB::beginTransaction();
        try{
            $cms =  HealthCare::find($h_id);
            $cms->status = '1';
            $cms->save();

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

    // hard deleted data
    public function healthmanageHardDelete(Request $request)
    {
        $hs_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $cms =  HealthCare::find($hs_id);
            $cms->delete();
           
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
