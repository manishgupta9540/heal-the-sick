<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Testimonial;
use DB;
use Auth;


class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = DB::table('testimonials')->whereIn('status',[0,1])->get();
        return view('admin.testimonial.index',compact('testimonial'));
    }

    public function testimonialCreate(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('admin.testimonial.create');
        }

        $rules = [
            'name'      => 'required',
            'designation' => 'required',
            'image'      =>  'required|mimes:jpeg,jpg,bmp,png,gif,svg',
            'description' => 'required',
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
           
            if($request->file('image'))
            {
                $image = $request->file('image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
    
                $destination_path = public_path('/uploads/testimonial/');
                if(!File::exists($destination_path))
                {
                    File::makeDirectory($destination_path, $mode = 0777, true, true);
                }
                $image->move($destination_path , $final_image_name);

            }

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
                'name'       => $request->input('name'),
                'designation'       => $request->input('designation'),
                'image'       => !empty($final_image_name) ? $final_image_name:NULL,
                'description' => $request->input('description'),
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s')
            ];
            DB::table('testimonials')->insert($data);
        
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

    public function testimonialEdit(Request $request)
    {
        $test_id = base64_decode($request->id);
    
        $testimonial  = DB::table('testimonials')->where('id',$test_id)->first();
       
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    public function testimonialUpdate(Request $request)
    {
        $test_id = base64_decode($request->id);

        $rules = [
            'name'      => 'required',
            'designation' => 'required',
            'image'      =>  'nullable|mimes:jpeg,jpg,bmp,png,gif,svg',
            'description' => 'required',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);

        }

        $old_image = DB::table('testimonials')->where('id',$test_id)->first();

        DB::beginTransaction();
        try{

            if($request->file('image'))
            {
                $image = $request->file('image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
    
                $destination_path = public_path('/uploads/testimonial/');
                if(!File::exists($destination_path))
                {
                    File::makeDirectory($destination_path, $mode = 0777, true, true);
                }
                $image->move($destination_path , $final_image_name);
            }
            else
            {
                $final_image_name = $old_image->image;
            }

            $data1 =   DB::table('testimonials')->where('id',$test_id)->first();
            $status = $data1->status;

            $data = [
                'name'          => $request->input('name'),
                'designation'   => $request->input('designation'),
                'image'         => !empty($final_image_name) ? $final_image_name:NULL,
                'description'   => $request->input('description'),
                'status'        => $status,
                'updated_at'    => date('Y-m-d H:i:s')
            ];
            DB::table('testimonials')->where('id',$test_id)->update($data);

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

    public function testimonialDelete(Request $request)
    {
        $test_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $test =  Testimonial::find($test_id);
            $test->status = '2';
            $test->save();

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


    public function testimonialStatus(Request $request)
    {
        $id=base64_decode($request->id);
        $type = base64_decode($request->type);
        // dd($id);

        if($type=='active')
        {
            DB::table('testimonials')->where(['id'=>$id])->update([
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        else
        {
            DB::table('testimonials')->where(['id'=>$id])->update([
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

       
        return response()->json([
            'status' => 'ok',
            'type' => $type
        ]);
    }

    public function testimonialTrash()
    {
        $trashData = Testimonial::where('status','2')->get();
        return view('admin.testimonial.trash_data',compact('trashData'));;
    }

    public function testimonialRestoreData(Request $request)
    {
        $h_id = base64_decode($request->id);
        // dd($card_id);
        DB::beginTransaction();
        try{
            $cms =  Testimonial::find($h_id);
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
    public function testimonialHardDelete(Request $request)
    {
        $hs_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $cms =  Testimonial::find($hs_id);
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
