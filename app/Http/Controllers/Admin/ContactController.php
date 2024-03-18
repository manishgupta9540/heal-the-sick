<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use DB;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = DB::table('contacts')->paginate(10);
        return view('admin.contacts.index',compact('contacts'));

    }

    public function contactDelete(Request $request)
    {
        $contact_id = base64_decode($request->id);
        // dd($banner_id);
        DB::beginTransaction();
        try{
            $contact =  Contact::find($contact_id);
            $contact->delete();
            
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
