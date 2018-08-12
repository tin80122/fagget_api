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


use App\Models\Category as Category;

class CategoryController extends Controller
{

    use Helpers;

    public function createCategory(Request $request){
        // Variable
        $response       = array();
        
        // input
        $request_data = $request->all();
        $validator= Validator::make($request_data,config('validation.createCategory'));
        if(!empty($request_data)){
            
            Category::create([
                    'title'=>$request_data['title'],
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

        
        // input
        $request_data = $request->all();
        print_r($request_data);
        $validator= Validator::make($request_data,config('validation.getCategory'));
        
        if(!empty($request_data) && $validator->fails()==false){
                $Message = Category::where([
                        [$request_data['column'],'like','%'.$request_data['text'].'%']
                ])->take(100)->get();    
                
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
