<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\AboutCoin;
use DB;
use Auth;

class AboutCoinController extends Controller
{
    public function index()
    {
        $aboutsCoins = DB::table('about_coins')->whereIn('status',[0,1])->get();
        return view('admin.aboutcoins.index',compact('aboutsCoins'));
    }

    public function aboutCoinCreate(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('admin.aboutcoins.create');
        }

        $rules = [
            'title'      => 'required',
            'coin_types' => 'sometimes|required',
            'image'      =>  'required|mimes:jpeg,jpg,bmp,png,gif,svg',
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
    
                $destination_path = public_path('/uploads/coins/');
                if(!File::exists($destination_path))
                {
                    File::makeDirectory($destination_path, $mode = 0777, true, true);
                }
                $image->move($destination_path , $final_image_name);

            }

            $chose_point=[];
            if($request->has('coin_types'))
            {
                if(count($request->coin_types)>0)
                {
                    foreach ($request->coin_types as $key => $value) 
                    {
                        $chose_point[] = [
                             $request->coin_types[$key]=>$request->coin_description[$key], 
                        ];
                    }
                    
                }
                $json_array = json_encode($chose_point);
            }


            $data = [
                'title'       => $request->input('title'),
                'image'       => !empty($final_image_name) ? $final_image_name:NULL,
                'description' => $request->input('description'),
                'coin_types'  => count($chose_point) > 0 ? json_encode($chose_point) : NULL,
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s')
            ];
            DB::table('about_coins')->insert($data);
        
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

    public function aboutCoinEdit(Request $request)
    {
        $aboutcoins_id = base64_decode($request->id);
    
        $aboutcoins  = DB::table('about_coins')->where('id',$aboutcoins_id)->first();
        $aboutcoinsingle  = DB::table('about_coins')->where('id',$aboutcoins_id)->first();
        return view('admin.aboutcoins.edit',compact('aboutcoins','aboutcoinsingle'));
    }

    public function deletedCoinData(Request $request)
    {
        $id = base64_decode($request->id);

        $choose_id = base64_decode($request->customer_id);

        DB::beginTransaction();
        try{
            if(Auth::check()){

                $why_choose = DB::table('about_coins')->where(['id'=>$choose_id])->first();

                $spoke_arr = [];

                $spoke_arr = json_decode($why_choose->coin_types,2);

                unset($spoke_arr[$id]);

                DB::table('about_coins')->where(['id'=>$choose_id])->update([
                    'coin_types' => count($spoke_arr) > 0 ? json_encode($spoke_arr) : NULL
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

    public function aboutCoinUpdate(Request $request)
    {
        $banner_id = base64_decode($request->id);

        $rules = [
            'title'      => 'required',
            'coin_types' => 'sometimes|required',
            'image'      =>  'nullable|mimes:jpeg,jpg,bmp,png,gif,svg',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);

        }

        $old_image = DB::table('about_coins')->where('id',$banner_id)->first();

        DB::beginTransaction();
        try{

            if($request->file('image'))
            {
                $image = $request->file('image');
                $date = date('YmdHis');
                $no = str_shuffle('123456789023456789034567890456789905678906789078908909000987654321987654321876543217654321654321543214321321211');
                $random_no = substr($no, 0, 2);
                $final_image_name = $date.$random_no.'.'.$image->getClientOriginalExtension();
    
                $destination_path = public_path('/uploads/coins/');
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

            $chose_point=[];
            if($request->has('coin_types'))
            {
                if(count($request->coin_types)>0)
                {
                    foreach ($request->coin_types as $key => $value) 
                    {
                        $chose_point[] = [
                             $request->coin_types[$key]=>$request->coin_description[$key], 
                        ];
                    }
                    
                }
                $json_array = json_encode($chose_point);
            }

            $data1 =   DB::table('about_coins')->where('id',$banner_id)->first();
            $status = $data1->status;

            $data = [
                'title' => $request->input('title'),
                'image' => !empty($final_image_name) ? $final_image_name:NULL,
                'description' => $request->input('description'),
                'coin_types' => count($chose_point) > 0 ? json_encode($chose_point) : NULL,
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::table('about_coins')->where('id',$banner_id)->update($data);

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

    public function aboutCoinDelete(Request $request)
    {
        $about_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $baneer =  AboutCoin::find($about_id);
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


    public function aboutCoinStatus(Request $request)
    {
        $id=base64_decode($request->id);
        $type = base64_decode($request->type);
        // dd($id);

        if($type=='active')
        {
            DB::table('about_coins')->where(['id'=>$id])->update([
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }
        else
        {
            DB::table('about_coins')->where(['id'=>$id])->update([
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }

       
        return response()->json([
            'status' => 'ok',
            'type' => $type
        ]);
    }


    public function aboutCoinTrash()
    {
        $trashData = AboutCoin::where('status','2')->get();
        return view('admin.aboutcoins.trash_data',compact('trashData'));;
    }

    public function aboutCoinRestoreData(Request $request)
    {
        $about_id = base64_decode($request->id);
        // dd($card_id);
        DB::beginTransaction();
        try{
            $baneer =  AboutCoin::find($about_id);
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
    public function aboutCoinHardDelete(Request $request)
    {
        $about_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $card =  AboutCoin::find($about_id);
            $card->delete();
           
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
