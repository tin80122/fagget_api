<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Aorus_Care_Shopping;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Validator;
use Log;
use App\Library\Encryption as Encryption;


use App\Models\Category as Category;

class CategoryController extends Controller
{

    use Helpers;
    function __construct(){
        Log::useDailyFiles(storage_path().'/logs/Category/Category.log'); 
    }



    public function createCategory(Request $request){
        // Variable
        $response       = array();
        $Decrypt_post = new Encryption(env('MEMBER_HASH_KEY'));

        // input
        $request_data = $request->all();

        Log::info("request_data".json_encode($request_data));

        $validator= Validator::make($request_data,config('validation.createCategory'));
        if(!empty($request_data)){
            
            Category::create([
                    'title'=>$Decrypt_post->decrypt($request_data['title']),
            ]);
            
            //ok
            $responseTrue= [
                    "Status"=>"Ok",
                    "Status_code" => "1000",
                    "Message"=>"Success"
            ];
            return $this->response->array($responseTrue)->setStatusCode(200);
        }
        // error
        //  傳入資料為空
        if(empty($request_data))
        {
            return $this->response->array(config('validation.EmptyError'))->setStatusCode(400);
        }
        // 資料驗證失敗
        if ($validator->fails())
        {
            return $this->response->array($validator->messages())->setStatusCode(400);
        }
    }

    public function getCategory(Request $request)
    {
        // Variable
        $response       = array();
        $Decrypt_post = new Encryption(env('MEMBER_HASH_KEY'));
        
        // input
        $request_data = $request->all();
        Log::info("request_data".json_encode($request_data));

        $validator= Validator::make($request_data,config('validation.getCategory'));
        
        if(!empty($request_data) && $validator->fails()==false){
                $Message = Category::where([
                        [$request_data['column'],'like','%'.$request_data['text'].'%']
                ])->take(100)->get();    
            Log::info(json_encode($Message));        
            $Message = $Decrypt_post->encrypt(json_encode($Message));        
            //ok
            $responseTrue= [
                    "Status"=>"Ok",
                    "Status_code" => "1000",
                    "Message"=>$Message

            ];
            return $this->response->array($responseTrue)->setStatusCode(200);
            
        }

        // error
        //  傳入資料為空
        if(empty($request_data))
        {
            return $this->response->array(config('validation.EmptyError'))->setStatusCode(400);
        }
        
        // 資料驗證失敗
        if ($validator->fails())
        {
            return $this->response->array($validator->messages())->setStatusCode(400);
        }
    }
}
