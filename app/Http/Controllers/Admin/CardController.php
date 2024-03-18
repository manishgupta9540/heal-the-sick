<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use DB;
use Auth;

class CardController extends Controller
{
    public function index()
    {
        $cards = DB::table('cards')->whereIn('status',[0,1])->get();
        return view('admin.card.index',compact('cards'));
    }

    public function cardCreate(Request $request)
    {
        if($request->isMethod('get'))
        {
            return view('admin.card.create');
        }

        $rules = [
            'title'        => 'required',
            //'banner_image' =>  'required|mimes:jpeg,jpg,bmp,png,gif,svg',
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
           
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
            DB::table('cards')->insert($data);
        
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

    public function cardEdit(Request $request)
    {
        $card_id = base64_decode($request->id);
    
        $card  = DB::table('cards')->where('id',$card_id)->first();
        return view('admin.card.edit',compact('card'));
    }

    public function cardUpdate(Request $request)
    {
        $card_id = base64_decode($request->id);

        $rules = [
            'title'        => 'required',
            'description'  => 'required',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);

        }

        $old_image = DB::table('cards')->where('id',$card_id)->first();

        DB::beginTransaction();
        try{

            $data1 =   DB::table('cards')->where('id',$card_id)->first();
            $status = $data1->status;

            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            DB::table('cards')->where('id',$card_id)->update($data);

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

    public function cardDelete(Request $request)
    {
        $card_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $baneer =  Card::find($card_id);
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


    public function cardStatus(Request $request)
    {
        $id=base64_decode($request->id);
        $type = base64_decode($request->type);
        // dd($id);

        if($type=='active')
        {
            DB::table('cards')->where(['id'=>$id])->update([
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }
        else
        {
            DB::table('cards')->where(['id'=>$id])->update([
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
                
            ]);
        }

       
        return response()->json([
            'status' => 'ok',
            'type' => $type
        ]);
    }

    public function cardTrash()
    {
        $trashData = Card::where('status','2')->get();
        return view('admin.card.trash_data',compact('trashData'));;
    }

    public function cardRestoreData(Request $request)
    {
        $card_id = base64_decode($request->id);
        // dd($card_id);
        DB::beginTransaction();
        try{
            $baneer =  Card::find($card_id);
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
    public function cardHardDelete(Request $request)
    {
        $card_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $card =  Card::find($card_id);
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
