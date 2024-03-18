<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Banner;
use DB;
use Auth;

class BannerController extends Controller
{
    public function index()
    {
        $banners = DB::table('banners')->whereIn('status',[0,1])->get();
        return view('admin.banner.index',compact('banners'));
    }

    public function bannerCreate(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('admin.banner.create');
        }

        $rules = [
            'title'        => 'required',
            'banner_image' =>  'required|mimes:jpeg,jpg,bmp,png,gif,svg',
            'description'  => 'required',
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
           
            if($request->file('banner_image'))
            {
                $image = $request->file('banner_image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
    
                $destination_path = public_path('/uploads/banner/');
                if(!File::exists($destination_path))
                {
                    File::makeDirectory($destination_path, $mode = 0777, true, true);
                }
                $image->move($destination_path , $final_image_name);

            }

            $data = [
                'title' => $request->input('title'),
                //'user_id' => Auth::user()->id,
                'banner_image' => !empty($final_image_name) ? $final_image_name:NULL,
                'description' => $request->input('description'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
            DB::table('banners')->insert($data);
        
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

    public function bannerEdit(Request $request)
    {
        $banner_id = base64_decode($request->id);
    
        $banner  = DB::table('banners')->where('id',$banner_id)->first();
        return view('admin.banner.edit',compact('banner'));
    }

    public function bannerUpdate(Request $request)
    {
        $banner_id = base64_decode($request->id);

        $rules = [
            'title'        => 'required',
            'banner_image' =>  'nullable|mimes:jpeg,jpg,bmp,png,gif,svg',
            'description'  => 'required',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);

        }

        $old_image = DB::table('banners')->where('id',$banner_id)->first();

        DB::beginTransaction();
        try{

            if($request->file('banner_image'))
            {
                $image = $request->file('banner_image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
    
                $destination_path = public_path('/uploads/banner/');
                if(!File::exists($destination_path))
                {
                    File::makeDirectory($destination_path, $mode = 0777, true, true);
                }
                $image->move($destination_path , $final_image_name);
            }
            else
            {
                $final_image_name = $old_image->banner_image;
            }

            $data1 =   DB::table('banners')->where('id',$banner_id)->first();
            $status = $data1->status;

            $data = [
                'title' => $request->input('title'),
                'banner_image' => !empty($final_image_name) ? $final_image_name:NULL,
                'description' => $request->input('description'),
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::table('banners')->where('id',$banner_id)->update($data);

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

    public function bannerDelete(Request $request)
    {
        $banner_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $baneer =  Banner::find($banner_id);
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


    public function bannersStatus(Request $request)
    {
        $id=base64_decode($request->id);
        $type = base64_decode($request->type);
        // dd($id);

        if($type=='active')
        {
            DB::table('banners')->where(['id'=>$id])->update([
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }
        else
        {
            DB::table('banners')->where(['id'=>$id])->update([
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }

       
        return response()->json([
            'status' => 'ok',
            'type' => $type
        ]);
    }

    public function bannerTrash()
    {
        $trashData = Banner::where('status','2')->get();
        return view('admin.banner.trash_data',compact('trashData'));;
    }

    // deleted data restore
    public function bannerRestoreData(Request $request)
    {
        $banner_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $baneer =  Banner::find($banner_id);
            $baneer->status = '1';
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

    // hard deleted data
    public function bannerHardDelete(Request $request)
    {
        $banner_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $baneer =  Banner::find($banner_id);
            $baneer->delete();
           
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
