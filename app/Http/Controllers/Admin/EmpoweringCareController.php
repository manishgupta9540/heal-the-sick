<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Empowering;
use DB;
use Auth;

class EmpoweringCareController extends Controller
{
    public function index()
    {
        $empowers = DB::table('empowerings')->whereIn('status',[0,1])->get();
        return view('admin.empower.index',compact('empowers'));
    }

    public function empowerCreate(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('admin.empower.create');
        }

        $rules = [
            'description' => 'required',
            // 'coin_types'  => 'sometimes|required',
            // 'image'       =>  'required|mimes:jpeg,jpg,bmp,png,gif,svg',
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
           
            // if($request->file('image'))
            // {
            //     $image = $request->file('image');
            //     $date = date('YmdHis');
            //     $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
            //     $random_no = substr($no, 0, 2);
            //     $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
    
            //     $destination_path = public_path('/uploads/coins/');
            //     if(!File::exists($destination_path))
            //     {
            //         File::makeDirectory($destination_path, $mode = 0777, true, true);
            //     }
            //     $image->move($destination_path , $final_image_name);

            // }

            // $chose_point=[];
            // if($request->has('coin_types'))
            // {
            //     if(count($request->coin_types)>0)
            //     {
            //         foreach ($request->coin_types as $key => $value) 
            //         {
            //             $chose_point[] = [
            //                  $request->coin_types[$key]=>$request->coin_description[$key], 
            //             ];
            //         }
                    
            //     }
            //     $json_array = json_encode($chose_point);
            // }


            $data = [
                'description' => $request->input('description'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
            DB::table('empowerings')->insert($data);
        
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

    public function empowerEdit(Request $request)
    {
        $empower_id = base64_decode($request->id);
    
        $empowers  = DB::table('empowerings')->where('id',$empower_id)->first();
        
        return view('admin.empower.edit',compact('empowers'));
    }

    

    public function empowerUpdate(Request $request)
    {
        $emp_id = base64_decode($request->id);

        $rules = [
            'description'      => 'required',
           
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
            $data1 =   DB::table('empowerings')->where('id',$emp_id)->first();
            $status = $data1->status;

            $data = [
                'description' => $request->input('description'),
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::table('empowerings')->where('id',$emp_id)->update($data);

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

    public function empowerDelete(Request $request)
    {
        $emp_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $baneer =  Empowering::find($emp_id);
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


    public function empowerStatus(Request $request)
    {
        $id=base64_decode($request->id);
        $type = base64_decode($request->type);
        // dd($id);

        if($type=='active')
        {
            DB::table('empowerings')->where(['id'=>$id])->update([
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }
        else
        {
            DB::table('empowerings')->where(['id'=>$id])->update([
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }

       
        return response()->json([
            'status' => 'ok',
            'type' => $type
        ]);
    }

    public function empowerTrash()
    {
        $trashData = Empowering::where('status','2')->get();
        return view('admin.empower.trash_data',compact('trashData'));;
    }

    public function empowerRestoreData(Request $request)
    {
        $h_id = base64_decode($request->id);
        // dd($card_id);
        DB::beginTransaction();
        try{
            $cms =  Empowering::find($h_id);
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
    public function empowerHardDelete(Request $request)
    {
        $hs_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $cms =  Empowering::find($hs_id);
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
