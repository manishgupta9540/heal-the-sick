<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\CurrencyToEuro;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use DB;
use Auth;

class FrontentdController extends Controller
{
    public function index()
    {
        $banners = DB::table('banners')->where('status','1')->orderBy('id','desc')->get();
        $cards = DB::table('cards')->where('status','1')->orderBy('id','asc')->take(4)->get();
        $aboutCoins = DB::table('about_coins')->where('status','1')->orderBy('id','desc')->take(1)->get();
        $cmsManages = DB::table('cms_manages')->where('status','1')->orderBy('id','asc')->get();
        $healthCares = DB::table('health_cares')->where('status','1')->orderBy('id','asc')->first();
        $empowers = DB::table('empowerings')->where('status','1')->orderBy('id','desc')->take(3)->get();
      
        return view('front.layouts.index',compact('banners','cards','aboutCoins','cmsManages','healthCares','empowers'));
    }

    public function about()
    {
        $aboutCoins = DB::table('about_coins')->where('status','1')->orderBy('id','desc')->take(1)->get();
        $testimonial = DB::table('testimonials')->where('status','1')->orderBy('id','desc')->get();
        return view('front.pages.about',compact('aboutCoins','testimonial'));
    }

    public function aboutPortal()
    {
        $aboutCoins = DB::table('about_coins')->where('status','1')->orderBy('id','desc')->take(1)->get();
        $testimonial = DB::table('testimonials')->where('status','1')->orderBy('id','desc')->get();
        return view('front.pages.about-portal',compact('aboutCoins','testimonial'));
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function signUp()
    {
        $response = Http::withHeaders([ 
            'Authorization'=> 'Bearer 3|ax86wXkkDQRlwbEDd3YP4OqK8n4KPMmOENbQoDYH', 
        ]) 
        ->get('http://chudat-portal.techsaga.live/api/v1/HTS/country-list'); 
    
        $country_value = $response->body();
        $country_array = json_decode($country_value,true);
        $cuntry_list = $country_array['data'];
        // dd($cuntry_list);
        return view('front.pages.sign_up',compact('cuntry_list'));
    }

    public function contactSave(Request $request)
    {
        $rules = [
            'username'  =>  'required',
            'email'     =>  'required|email:rfc,dns|unique:contacts',
            'phone'     =>  'required|regex:/^((?!(0))[0-9\s\-\+\(\)]{10,11})$/',
            'subject'   =>  'required',
            'captcha' => 'required|captcha'
        ];
        //['captcha.captcha'=>'Invalid captcha code.'];

        $customMessages = [
            'phone.regex' => 'Phone Number must be Valid & 10-digit Number !!' ,
            'captcha.captcha' => "Invalid captcha code"
        ];
        $validation = Validator::make($request->all(), $rules,$customMessages);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);
        }

        DB::beginTransaction();
        try{
           
            $data = [
                'username'    => $request->input('username'),
                'email'       => $request->input('email'),
                'phone'       => $request->input('phone'),
                'subject'     => $request->input('subject'),
                'message'     => $request->input('message'),
                'created_at'  => date('Y-m-d H:i:s')
            ];
            DB::table('contacts')->insert($data);
        
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

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function globalCurrency()
    {
        $response = Http::withHeaders([ 
            'Authorization'=> 'Bearer 3|ax86wXkkDQRlwbEDd3YP4OqK8n4KPMmOENbQoDYH', 
        ]) 
        ->get('http://chudat-portal.techsaga.live/api/v1/curruncy_list'); 
    
        $cuntry_list = $response->body();

        $country_array = json_decode($cuntry_list,true);
        $country_value = $country_array['data'];
       
        $testimonial = DB::table('testimonials')->where('status','1')->orderBy('id','desc')->get();
        return view('front.pages.global',compact('testimonial','country_value'));
    }

    public function getCurrencyCalculate(Request $request)
    {
        $currency =  CurrencyToEuro::find($request->currency_id);
        if ($request->type == 'currency_rate') {
            $currency_rate =  $request->currency_rate;
            $hc = $request->currency_rate * $currency->heal_coin;
        } else if ($request->type == 'hc_rate') {
            $currency_rate =   $request->hc / $currency->heal_coin;
            $hc = $request->hc;
        }
        return response()->json(['currency_rate' => round($currency_rate, 4) ?? '', 'hc' => round($hc,4)?? '' , 'symbol'=>$currency->symbol ]);
    }

    public function purchaseHealCoin()
    {
        $testimonial = DB::table('testimonials')->where('status','1')->orderBy('id','desc')->get();
        return view('front.pages.healcoins',compact('testimonial'));
    }

    public function purchaseCoins(Request $request)
    {
        $rules = [
            'email'  => 'required|email:rfc,dns',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);
        }

        try{

            $email = $request->email;
            
            if($email)
            {
                $data = [
                        "email" => $request->email,
                    ];
                
                $payload = $data;
               
                $apiUrl = "http://chudat-portal.techsaga.live/api/v1/HTS/fetch_user_details";
                    
                $ch1 = curl_init();
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);  
                curl_setopt ($ch1, CURLOPT_POST, 1);
                curl_setopt($ch1, CURLOPT_URL, $apiUrl);
                
                curl_setopt($ch1, CURLOPT_POSTFIELDS,$payload);
                $resp = curl_exec ( $ch1 );
                $response_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                curl_close ($ch1);
                $array_data =  json_decode($resp,true);
            
                if($array_data['status']){
                    $data_response = $array_data['data'];
            
                    return response()->json([
                        'success' =>true,
                        'data' =>$data_response,
                    ]);
                }else{
                    return response()->json([
                        'success' =>false,
                        'errors' =>$array_data['message'],
                    ]);
                }
            
            }
            
        }
        catch (\Exception $e) {
            // something went wrong
            return $e;
        }
    }

    public function purchaseCoinData(Request $request)
    {
        
        $rules = [
            'purchase_value'  => 'required|integer',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);
        }

        try{

            $purchase_value = $request->purchase_value;
           
            $data = [
                "purchase_value" => $request->purchase_value,
            ];
        
            $payload = $data;
            dd($payload);

        }
        catch (\Exception $e) {
            // something went wrong
            return $e;
        }
    }

    public function userRegister(Request $request)
    {
        $rules = [
            'first_name'  =>  'required',
            'last_name'   =>  'required',
            'email'       =>  'required|email:rfc,dns',
            'phone'       =>  'required|regex:/^((?!(0))[0-9\s\-\+\(\)]{10,11})$/',
            'country_id'  =>  'required',
            'password'    =>  'required|min:6|max:8|same:confirm_password',
            'confirm_password' => 'required|min:6|max:8|same:password',
        ];
      

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {

            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);
        }

        try{
            $data = [
                "first_name"    => $request->first_name,
                "last_name"     => $request->last_name,
                "email"         => $request->email,
                "phone"         => $request->phone,
                "country_id"    => $request->country_id,
                "password"      => $request->password,
            ];
        
            $payload = $data;
            
            $apiSignUpUrl = "http://chudat-portal.techsaga.live/api/v1/HTS/sign-up";

            $ch1 = curl_init();
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);  
            curl_setopt ($ch1, CURLOPT_POST, 1);
            curl_setopt($ch1, CURLOPT_URL, $apiSignUpUrl);
            
            curl_setopt($ch1, CURLOPT_POSTFIELDS,$payload);
            $resp = curl_exec ( $ch1 );
            $response_code = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
            curl_close ($ch1);
            $array_data =  json_decode($resp,true);
            
            if($array_data['status']){
                $data_response = $array_data;
        
                return response()->json([
                    'success' =>true,
                    'message' =>$data_response['message'],
                ]);
            }else{
                return response()->json([
                    'success' =>false,
                    'errors' =>$array_data['message'],
                ]);
            }
        }
        catch (\Exception $e) {
            // something went wrong
            return $e;
        }
    }
}
