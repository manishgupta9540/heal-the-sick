<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\CmsManage;
use DB;
use Auth;

class CmsController extends Controller
{
    public function index()
    {
        $cms_manages = DB::table('cms_manages')->whereIn('status',[0,1])->get();
        return view('admin.cms_feature.index',compact('cms_manages'));
    }

    public function CmsCreate(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('admin.cms_feature.create');
        }

        $rules = [
            'title'      => 'required',
            'title_points' => 'sometimes|required',
            //'image'      =>  'required|mimes:jpeg,jpg,bmp,png,gif,svg',
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
           
            $chose_point=[];
            if($request->has('title_points'))
            {
                if(count($request->title_points)>0)
                {
                    foreach ($request->title_points as $key => $value) 
                    {
                        $chose_point[] = [
                             $request->title_points[$key]=>$request->title_description[$key], 
                        ];
                    }
                    
                }
                $json_array = json_encode($chose_point);
            }


            $data = [
                'title' => $request->input('title'),
                'title_points' => count($chose_point) > 0 ? json_encode($chose_point) : NULL,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
            DB::table('cms_manages')->insert($data);
        
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

    public function cmsEdit(Request $request)
    {
        $cms_id = base64_decode($request->id);
    
        $cmscoins  = DB::table('cms_manages')->where('id',$cms_id)->first();
        $cmssingle  = DB::table('cms_manages')->where('id',$cms_id)->first();
        return view('admin.cms_feature.edit',compact('cmscoins','cmssingle'));
    }

    public function cmsDataDeleted(Request $request)
    {
        $id = base64_decode($request->id);

        $choose_id = base64_decode($request->customer_id);

        DB::beginTransaction();
        try{
            if(Auth::check()){

                $why_choose = DB::table('cms_manages')->where(['id'=>$choose_id])->first();

                $spoke_arr = [];

                $spoke_arr = json_decode($why_choose->title_points,2);

                unset($spoke_arr[$id]);

                DB::table('cms_manages')->where(['id'=>$choose_id])->update([
                    'title_points' => count($spoke_arr) > 0 ? json_encode($spoke_arr) : NULL
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

    public function cmsUpdate(Request $request)
    {
        $cms_id = base64_decode($request->id);

        $rules = [
            'title'      => 'required',
            'title_points' => 'sometimes|required',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);

        }

        $old_image = DB::table('cms_manages')->where('id',$cms_id)->first();

        DB::beginTransaction();
        try{

            $chose_point=[];
            if($request->has('title_points'))
            {
                if(count($request->title_points)>0)
                {
                    foreach ($request->title_points as $key => $value) 
                    {
                        $chose_point[] = [
                             $request->title_points[$key]=>$request->title_description[$key], 
                        ];
                    }
                    
                }
                $json_array = json_encode($chose_point);
            }

            $data1 =   DB::table('cms_manages')->where('id',$cms_id)->first();
            $status = $data1->status;

            $data = [
                'title' => $request->input('title'),
                'title_points' => count($chose_point) > 0 ? json_encode($chose_point) : NULL,
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::table('cms_manages')->where('id',$cms_id)->update($data);

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

    public function cmsDelete(Request $request)
    {
        $about_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $baneer =  CmsManage::find($about_id);
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


    public function cmsStatus(Request $request)
    {
        $id=base64_decode($request->id);
        $type = base64_decode($request->type);
        // dd($id);

        if($type=='active')
        {
            DB::table('cms_manages')->where(['id'=>$id])->update([
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }
        else
        {
            DB::table('cms_manages')->where(['id'=>$id])->update([
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }

       
        return response()->json([
            'status' => 'ok',
            'type' => $type
        ]);
    }

    public function cmsTrash()
    {
        $trashData = CmsManage::where('status','2')->get();
        return view('admin.cms_feature.trash_data',compact('trashData'));;
    }

    public function cmsRestoreData(Request $request)
    {
        $cms_id = base64_decode($request->id);
        // dd($card_id);
        DB::beginTransaction();
        try{
            $cms =  CmsManage::find($cms_id);
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
    public function cmsHardDelete(Request $request)
    {
        $cms_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $cms =  CmsManage::find($cms_id);
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
